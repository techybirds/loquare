<?php
namespace App\Http\Controllers;
	
use Mockery\CountValidator\Exception;
use Session;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Excel;
use App\collection\CollectionModel as collection;
use App\collection\GrouplistModel as Grouplist;
use App\properties\PropertyModel as properties;
use App\properties\RetailerModel as retailer;
use App\properties\ContactModel as contact;
use App\UploadModel as uploadfile;
use Redirect;
use Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class CI_ModelController extends Controller
{
	protected $data;
	function __Construct()
	{
		parent::__Construct();
		$this->data['logedin'] = Auth::user();

	}
	static function get_all($table = "", $limit="-1")
	{
		$data = $table->take($limit)->get();
		if(count($data) > 0)
		{
			return $data->toArray();
		}
		else
		{
			return false;
		}
	}
	static function get_single($table, $filter, $orders = "")
	{
		$data = $table->where($filter)->take(1);
		if($orders != "")
		{
			foreach($orders as $col => $order)
			{
				$data = $data->orderby($col, $order);
			}
		}
		$data = $data->get();

		if(count($data) > 0)
		{
			$data = $data->toArray();
			$data = $data[0];
			return $data;
		}
		else
		{
			return false;
		}
		
	}

	static function insert_data($table, $data)
	{
		$flag = $table->create($data);
		return $flag->id;
	}
	
	static function update_data($table, $data, $filter)
	{
		$flag = $table->where($filter)->update($data);
		return $flag;
	}

	static function intranet_form()
	{
		return view('pages.intranet');
	}

	static function delete_data($table, $filters)
	{
		$data = $table;
		foreach($filters as $filter)
		{
			$data = $data->where($filter[0], $filter[1], $filter[2]);
		}
		$flag = $data->delete();
		return $flag;
	}

	static function download_sample($folder = "samples", $sample_file = "sample_csv.xlsx")
	{
		$pathToFile = $folder."/".$sample_file;
		return response()->download($pathToFile);
	}

	static function read_excell($destination, $fileName)
	{
		
		$path = public_path()."/".$destination."/".$fileName;
		$objWorksheet =  Excel::load($path, function($reader){})->toArray();
		$objWorksheet = $objWorksheet[0];
		return $objWorksheet;
	}

	static function get_by_condition($table, $filters)
	{
		$data = $table;

		foreach($filters as $filter)
		{
			$data = $data->where($filter[0], $filter[1], $filter[2]);
		}
		$data = $data->get();

		if(count($data) > 0)
		{
			$data = $data->toArray();
			return $data;
		}
		else
		{
			return false;
		}

	}

	static function get_collection($id = "", $user = "", $limit = "")
	{
		if($user == "")
		{
			$user = Auth::user();
			$user = $user['id'];
		}
		$filter = array(
			array("user_id", "=", $user)
		);
		if($id != "")
		{  $filter[] = array("id", "=", $id); }

		$table = new collection();
		$collection = false;

		$collect = CI_ModelController::get_by_condition($table, $filter);
		if($collect != false)
		{
			foreach($collect as $group)
			{
				$filter = array(array("collection_id", "=", $group['id']));
				$table  = new Grouplist();

				$wishes = CI_ModelController::get_by_condition($table, $filter);

				if($wishes != false)
				{
					$group['list_total']  = count($wishes);
					if($limit != "")
					{
						$wishes = array_slice($wishes,0, $limit);
					}
					foreach($wishes as $wish)
					{
						$filter = array("id" => $wish['property_id']);
						$table  = new properties();

						if($wish['property_from'] == "retailer")
						{ $table  = new retailer(); }

						$property = CI_ModelController::get_single($table, $filter);

						if($property != false)
						{
							$property['collectfrom'] = $wish['property_from'];
							$property['property_id'] = $wish['property_id'];
							$property['list_id']     = $wish['id'];
							$group['list'][] = $property;
						}
					}
					$collection[] = $group;
				}
			}
		}

		return $collection;
	}

	static function dateDifference($date_1 , $date_2 , $differenceFormat = '%h Hours %i Minute %s Seconds' )
	{
		$datetime1 = date_create($date_1);
		$datetime2 = date_create($date_2);

		$interval = date_diff($datetime1, $datetime2);

		return $interval->format($differenceFormat);

	}

	static function getseconds($time)
	{
		$time = explode(",", $time);

		$day = $time[0]*24*3600;
		$hour = $time[1]*3600;
		$minute = $time[2]*60;

		$second = $day+$hour+$minute+$time[3];

		return $second;
	}

	static function gettime($sec, $padHours = false)
	{

		// do the hours first: there are 3600 seconds in an hour, so if we divide
		// the total number of seconds by 3600 and throw away the remainder, we're
		// left with the number of hours in those seconds
		$hours = intval(intval($sec) / 3600);

		// start our return string with the hours (with a leading 0 if asked for)
		if ($padHours) {
			$hms = str_pad($hours, 2, "0", STR_PAD_LEFT). ":";
		} else {
			$hms = $hours. ":";
		}

		// dividing the total seconds by 60 will give us the number of minutes
		// in total, but we're interested in *minutes past the hour* and to get
		// this, we have to divide by 60 again and then use the remainder
		$minutes = intval(($sec / 60) % 60);

		// add minutes to $hms (with a leading 0 if needed)
		$hms .= str_pad($minutes, 2, "0", STR_PAD_LEFT). ":";

		// seconds past the minute are found by dividing the total number of seconds
		// by 60 and using the remainder
		$seconds = intval($sec % 60);

		// add seconds to $hms (with a leading 0 if needed)
		$hms .= str_pad($seconds, 2, "0", STR_PAD_LEFT);

		// done!
		return $hms;

	}

	static function fileupload($image = "", $upload = "uploads")
	{
		if($image != "" && is_object($image))
		{
			$uploadpth = 'storage/';

			$folders = explode("/", $upload);

			foreach($folders as $dir)
			{
				if($dir != "")
				{
					if (!file_exists($uploadpth.$dir)) {
						mkdir($uploadpth.$dir, 0777, true);
						chmod($uploadpth.$dir, 0777);
					}
					else{
						chmod($uploadpth.$dir, 0777);
					}
					$uploadpth .= $dir."/";
					$folder = $dir;
				}
			}


			if($image != "" && $uploadpth != "")
			{
				$destinationPath = $uploadpth; // upload path
				$extension = $image->getClientOriginalExtension();
				$fileName = date('dmYHis').rand(100, 999).'.'.$extension; // renameing image
				if($image->move($destinationPath, $fileName)) // uploading file to given path
				{
					return array("name" => $fileName, "type" => $image->getClientMimeType());
				}
				else
				{
					return false;
				}

			}

		}
		else{
			return false;
		}


	}


	static function imageupload($image, $upload="upload", $thumbconfig=array())
	{
		if($image != "" && is_object($image))
		{
			$uploadpth = 'storage/';

			$folders = explode("/", $upload);

			foreach($folders as $dir)
			{
				if($dir != "")
				{
					if (!file_exists($uploadpth.$dir)) {
						mkdir($uploadpth.$dir, 0777, true);
						chmod($uploadpth.$dir, 0777);
					}
					else{
						chmod($uploadpth.$dir, 0777);
					}
					$uploadpth .= $dir."/";
					$folder = $dir;
				}
			}

			if (!file_exists($uploadpth.'thumbs')) {
				mkdir($uploadpth.'thumbs', 0777, true);
				chmod($uploadpth.'thumbs', 0777);
			}
			else{
				chmod($uploadpth.'thumbs', 0777);
			}

			$extension = $image->getClientOriginalExtension();
			$fileName = date('YmdHis').rand(0,999).'.' . $extension;
			$image->move($uploadpth, $fileName);

			if($thumbconfig != "" && (isset($thumbconfig['width']) || isset($thumbconfig['height'])))
			{
				$thumbwidth = (isset($thumbconfig['width']) && $thumbconfig['width'] != "")?$thumbconfig['width']:null;
				$thumbheight = (isset($thumbconfig['height']) && $thumbconfig['height'] != "")?$thumbconfig['height']:null;

				$thumb = Image::make($uploadpth.$fileName);
				$thumb = $thumb->resize($thumbwidth, $thumbheight, function ($constraint) {
					$constraint->aspectRatio();
				});

				$thumb->save($uploadpth.'thumbs/'.$fileName);
			}

			$image = Image::make($uploadpth.$fileName);

			return array("name" => $fileName, "type" => $image->mime());
		}
		else{
			return false;
		}
	}

	function delete_image(Request $request)
	{

		$filter = array(
			array( "id", "=", $request->input('property_image_id'))
		);

		$deleted = CI_ModelController::delete_data(new uploadfile(),$filter);
		if($deleted != false)
		{
			echo json_encode(
				array(
					"status" => 200,
					"message" => "Successful! <br/> Image deleted successfuly!"
				)
			);
		}else{

			echo json_encode(
				array(
					"status" => 500,
					"message" => "Sorry! Something went wrong<br/>Please try again.......!"
				)
			);

		}
		exit();
	}
}
?>

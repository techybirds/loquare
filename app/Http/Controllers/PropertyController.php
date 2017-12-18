<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\CI_ModelController as common;
use App\DistrictzipModel as distzip;
use App\DistrictModel as district;
use App\properties\ProperttypesModel as property_type;
use App\properties\PropertyModel as property;
use App\properties\ContactModel as contact;
use App\UploadModel as uploadfile;
use Redirect;
use Auth;
use Excel;
use DB;

class PropertyController extends Controller
{
	protected $data, $view, $searchdata;

	function __construct()
	{
		session::regenerate();
		$this->middleware('auth');
		$this->data['title'] = "Loquare";
		$this->data['layout'] = "template";
		$this->data['page'] = "Loquare";

		$this->data['success'] = session('success');
		$this->data['error'] = session('error');

		$this->data['scripts'] = false;

		$this->data['logedin']	= Auth::user();
	}

	public function index()
	{
		$this->view = 'home';
		return $this->load_view();
	}

	function load_view()
	{
		return view("property.".$this->view, $this->data);
	}

	function add()
	{
		$table = new property_type();
		$this->data['scripts'] = array(
			'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.1.1/mapbox-gl-geocoder.min.js',
			asset('/frontend/js/add_property.js')
		);

		$this->data['property_types'] = common::get_all($table);
		$this->view = "add_property";
		return $this->load_view();
	}

	function submit(Request $request)
	{
		$data = $this->property_post($request);

		$table = new property();
		$propertyid = common::insert_data($table, $data);

		if($propertyid != false)
		{
			$table = new uploadfile();

			$uploadfiles = $request->file('property_image');

			if($uploadfiles != "")
			{
				foreach($uploadfiles as $file)
				{
					$filename = common::imageupload($file, 'Property/'.$propertyid, array("width" => 355));
					$data = array(
						"filename"   => $filename['name'],
						"filetype"   => $filename['type'],
						"post_id"    =>  $propertyid,
						"post_type"  => "property-image",
						"created_at" => date('Y-m-d H:i:s')
					);
					common::insert_data($table, $data);

				}
			}

			$uploadfiles = $request->file('energy_certificate');

			if($uploadfiles != "") {

				$extension=$uploadfiles->getClientOriginalExtension();

				$extensionList=array('png','jpg','jpeg','svg','gif');
				if(in_array($extension,$extensionList))
				{
					$thumbconfig=array("width" => 355);
					$filename = common::imageupload($uploadfiles, 'enrgycertificats/' . $propertyid, $thumbconfig);

				}
				else
				{
					$filename = common::fileupload($uploadfiles, 'enrgycertificats/' . $propertyid);
				}

				$data = array(
					"filename"   => $filename['name'],
					"filetype"   => $filename['type'],
					"post_id"    =>  $propertyid,
					"post_type"  => "owner-certificate",
					"created_at" => date('Y-m-d H:i:s')
				);
				common::insert_data($table, $data);
			}

			$uploadfiles = $request->file('owner_certificate');

			if($uploadfiles != "") {

				$extension=$uploadfiles->getClientOriginalExtension();

				$extensionList=array('png','jpg','jpeg','svg','gif');
				if(in_array($extension,$extensionList))
				{
					$thumbconfig=array("width" => 355);
					$filename = common::imageupload($uploadfiles, 'ownercertificates/' . $propertyid, $thumbconfig);

				}
				else
				{
					$filename = common::fileupload($uploadfiles, 'ownercertificates/' . $propertyid);
				}

				$data = array(
					"filename"   => $filename['name'],
					"filetype"   => $filename['type'],
					"post_id"    =>  $propertyid,
					"post_type"  => "owner-certificate",
					"created_at" => date('Y-m-d H:i:s')
				);
				common::insert_data($table, $data);
			}


			$data = array(
				"property" => $propertyid,
				"contact_name" => $request->input('contact_name'),
				"contact_phone" => $request->input('contact_phone'),
				"contact_email" => $request->input('contact_email'),
				"duration" => $request->input('duration'),
				"created_at" => date('Y-m-d H:i:s'),
			);

			common::insert_data(new contact(), $data);

			echo json_encode(
				array(
					"status" => 200,
					"message" => "Congratulation! <br/> Property published successfuly!"
				)
			);
		}
		else{
			echo json_encode(
				array(
					"status" => 500,
					"message" => "Sorry! Something went wrong<br/>Please try again!"
				)
			);
		}

		exit();

	}

	function publish(Request $request)
	{
		$property_id =$request->input('id');
		$status =$request->input('status');


		$filter=array( "id"=>$property_id );
		$data = array( "status" => $status );
		$table = new property();
		$published = common::update_data($table, $data,$filter);

		if($published != false)
		{
			echo json_encode(TRUE);
		}else{
			echo json_encode(FALSE);
		}

		exit();
	}

	function get_property($type="post", $id = "", Request $request)
	{
		if($id == "")
		{
			$id = $request->input("id");
		}


		$filter = array(
			array("PR.id", $id)
		);

		$data = property::get_property($filter);

		if($type = "json")
		{
			echo json_encode($data);
		}
		else{
			return $data;
		}
		exit();
	}
		
	function delete(Request $request)
	{
		$property_id =$request->input('id');
		
		 $filter = array(
						array("id", "=",$property_id)
			);
		$table = new property();
		$deleted = common::delete_data($table,$filter);

		
		if($deleted != false)
		{
			  $filter = array(
						array("property", "=",$property_id)
			);
			$deleted_contact = common::delete_data(new contact(),$filter);
			
			$filter = array(
						array( "post_id", "=",$property_id )
			);
			$deleted_image = common::delete_data(new uploadfile(),$filter);
		
			if($deleted_contact != false)
			{
				echo json_encode(
					array(
						"status" => 200,
						"message" => "Congratulation! <br/> Property deleted successfuly!"
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
			 
		}else{
			 echo json_encode(
				array(
					"status" => 500,
					"message" => "Sorry! Something went wrong<br/>Please try again!"
				)
			);
		}
		exit();
	}
	function edit($id = "", Request $request)
	{
		if($id != "") {

			$filter = array("id" => $id);
			$table = new property();
			$property = common::get_single($table, $filter);

			if($property != false)
			{
				$this->data['property'] = $property;

				$this->data['scripts'] = array(
					'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.1.1/mapbox-gl-geocoder.min.js',
					asset('/frontend/js/add_property.js')
				);

				$this->data['property_types'] = common::get_all(new property_type());

				$filter = array("property" => $id);
				$this->data['contact'] = common::get_single(new contact(), $filter);

				$filter = array(
					array("post_id", "=", $id),
					array("post_type", "=", "property-image")
				);
				$this->data['images'] = common::get_by_condition(new uploadfile(), $filter);

				$filter = array(
					array("post_id", "=", $id),
					array("post_type", "=", "owner-certificate")
				);
				$owner_certificate = common::get_by_condition(new uploadfile(), $filter);
				$this->data['owner_certificate'] = ($owner_certificate != false) ? $owner_certificate[0] : $owner_certificate;

				$filter = array(
					array("post_id", "=", $id),
					array("post_type", "=", "energy-certificate")
				);
				$energy_certificate = common::get_by_condition(new uploadfile(), $filter);
				$this->data['energy_certificate'] = ($energy_certificate != false) ? $energy_certificate[0] : $energy_certificate;

				$this->view = "edit_property";
				return $this->load_view($this->view);
			}
			else{

				return redirect("/");
			}
		}
		else{

			return redirect("/");
		}
	 
	}

	function property_post($request)
	{
		$comunidad_autonoma = $request->input("comunidad_autonoma");
		$cops = $request->input("cops");
		$direccion = $request->input("direccion");
		$localidad = $request->input("localidad");
		$provincia = $request->input("provincia");
		$dist_id = $request->input("dist_id");
		$hood = $request->input("hood");
		$state_id = "Barcelona";
		$property_for = $request->input("property_for");
		$property_type = $request->input("property_type");
		$rooms = $request->input("rooms");
		$bathrooms = $request->input("bathrooms");
		$sizem2 = $request->input("sizem2");
		$property_deal = $request->input("property_deal");
		$rent_by = $request->input("rent_by");
		$lease_duration = $request->input("lease_duration");
		$price = ($property_deal == "SALE")?$request->input("price_sale"):$request->input("price_rent");

		$price = trim(implode("",explode(",", $price)));

		$discription = $request->input("discription");
		$usability = $request->input("usability");
		$construction = $request->input("construction");

		$elevetor = $request->input("elevetor");
		$doorman = $request->input("doorman");
		$furnished = $request->input("furnished");
		$heating = $request->input("heating");
		$laundry = $request->input("laundry");
		$central_ac = $request->input("central_ac");
		$outdoor_space = $request->input("outdoor_space");
		$gym = $request->input("gym");
		$dishwasher = $request->input("dishwasher");
		$pool = $request->input("pool");
		$pets = $request->input("pets");
		$cats = $request->input("cats");
		$others = $request->input("others");
		$latitude = $request->input("latitude");
		$longitude = $request->input("longitude");
		$status = 1;

		$data = array(
			"comunidad_autonoma" => $comunidad_autonoma,
			"cops" => $cops,
			"direccion" => $direccion,
			"localidad" => $localidad,
			"provincia" => $provincia,
			"property_for" => $property_for,
			"hoods" => $hood,
			"dist_id" => $dist_id,
			"state_id" => $state_id,
			"property_type" => $property_type,
			"rooms" => $rooms,
			"bathrooms" => $bathrooms,
			"sizem2" => $sizem2,
			"property_deal" => $property_deal,
			"rent_by" => $rent_by,
			"lease_duration" => $lease_duration,
			"price" => $price,
			"discription" => $discription,
			"usability" => (trim($usability) != "")?1:0,
			"construction" => $construction,
			"elevetor" => $elevetor,
			"doorman" => $doorman,
			"furnished" => $furnished,
			"heating" => $heating,
			"laundry" => $laundry,
			"central_ac" => $central_ac,
			"outdoor_space" => $outdoor_space,
			"gym" => $gym,
			"dishwasher" => $dishwasher,
			"pool" => $pool,
			"pets" => $pets,
			"cats" => $cats,
			"others" => $others,
			"latitude" => $latitude,
			"longitude" => $longitude,
			"status" => $status,
			"created_at" => date("Y-m-d h:i:s")
		);
		return $data;
	}


	function update(Request $request)
	{
		$propertyId=$request->input("property_id");

		$data = $this->property_post($request);

		$table = new property();
		$filter=array("id"=>$propertyId);
		$propertyUpdated = common::update_data($table, $data, $filter);

		if($propertyUpdated != false)
		{
			 
			$table = new uploadfile();

			$uploadfiles = $request->file('property_image');
		
			if($uploadfiles != "")
			{
				foreach($uploadfiles as $file)
				{
					$filename = common::imageupload($file, 'Property/'.$propertyId, array("width" => 355));
					$data = array(
						"filename"   => $filename['name'],
						"filetype"   => $filename['type'],
						"post_id"    =>  $propertyId,
						"post_type"  => "property-image",
						"created_at" => date('Y-m-d H:i:s')
					);
					 
					common::insert_data($table, $data);

				}
			}


			$uploadfiles = $request->file('energy_certificate');

			if($uploadfiles != "") {

				$extension=$uploadfiles->getClientOriginalExtension();
				$extensionList=array('png','jpg','jpeg','svg','gif');
				if(in_array($extension,$extensionList))
				{
					$thumbconfig=array("width" => 355);
					$filename = common::imageupload($uploadfiles, 'enrgycertificats/' . $propertyId, $thumbconfig);
				}
				else{
					$filename = common::fileupload($uploadfiles, 'enrgycertificats/' . $propertyId);
				}

				$data = array(
					"filename"   => $filename['name'],
					"filetype"   => $filename['type'],
					"post_id"    =>  $propertyId,
					"post_type"  => "energy-certificate",
					"created_at" => date('Y-m-d H:i:s')
				);
				common::insert_data($table, $data);
			}

			$uploadfiles = $request->file('owner_certificate');

			if($uploadfiles != "") {

				$extension=$uploadfiles->getClientOriginalExtension();

				$extensionList=array('png','jpg','jpeg','svg','gif');
				if(in_array($extension,$extensionList))
				{
					$thumbconfig=array("width" => 355);
					$filename = common::imageupload($uploadfiles, 'ownercertificates/' . $propertyId, $thumbconfig);

				}
				else
				{
					$filename = common::fileupload($uploadfiles, 'ownercertificates/' . $propertyId);
				}

				$data = array(
					"filename"   => $filename['name'],
					"filetype"   => $filename['type'],
					"post_id"    =>  $propertyId,
					"post_type"  => "owner-certificate",
					"created_at" => date('Y-m-d H:i:s')
				);
				common::insert_data($table, $data);
			}


			$data = array(
				"property" => $propertyId,
				"contact_name" => $request->input('contact_name'),
				"contact_phone" => $request->input('contact_phone'),
				"contact_email" => $request->input('contact_email'),
				"duration" => $request->input('duration'),
				"created_at" => date('Y-m-d H:i:s')
			);
		
			$filter=array('property'=>$propertyId);
			common::update_data(new contact(), $data ,$filter);
	 
			echo json_encode(
				array(
					"status" => 200,
					"message" => "Congratulation! <br/> Property updated successfuly!"
				)
			);
		}
		else{
			echo json_encode(
				array(
					"status" => 500,
					"message" => "Sorry! Something went wrong<br/>Please try again!"
				)
			);
		}

		exit();
		
	 
	}

}

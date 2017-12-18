<?php

namespace App\Http\Controllers;

use App\properties\PropertyModel;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\CI_ModelController as common;
use App\population\PopulationModel as population;
use App\properties\RetailerModel as retailers;
use App\properties\PropertyModel as property;
use App\DistrictzipModel as distzip;
use App\DistrictModel as district;
use Illuminate\Support\Facades\Storage;
use Redirect;
use Auth;
use Excel;
use DB;
use App\collection\CollectionModel as collect;
use File;

class HomeController extends Controller
{
	protected $data, $view, $searchdata;

    public function __construct()
    {
	    session::regenerate();
	    $this->middleware('auth');
	    $this->data['title'] = "Loquare";
	    $this->data['layout'] = "template";
	    $this->data['page'] = "Loquare";
	    $this->data['success'] = session('success');
	    $this->data['error'] = session('error');
	    $this->data['location'] = "";


	    $this->searchdata['search']     = "";
	    $this->searchdata['zipcode']    = "";
	    $this->searchdata['provincia']  = "";
	    $this->searchdata['type']       = 1;
	    $this->searchdata['min_price']  = "";
	    $this->searchdata['max_price']  = "";
	    $this->searchdata['rooms']      = "";
	    $this->searchdata['bathrooms']  = array();
	    $this->searchdata['searchin']   = "";

	    $this->data['scripts'] = false;

	    if(Session::has('searchdata'))
	    {
		    $searchdata = session('searchdata');
		    $this->searchdata = $searchdata;
	    }
	    $this->data['filters'] = $this->searchdata;
	    $this->data['logedin']	= Auth::user();
	

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->view = 'home';
	    return $this->load_view();
    }

	function load_view()
	{
		return view($this->view, $this->data);
	}

    public function list_rent()
    {

	    $this->data['success'] = session('success');
	    $this->data['error'] = session('error');

    	$this->data['scripts'] = array(
		    asset('/frontend/js/retailer-map.js'),
		    asset('/frontend/js/mapbox-functions.js')
	    );
	    $property_types =   DB::table('property_types')->get();
	    $this->data["property_types"] = $property_types;

	    $this->view = 'rent-listing';
	    return $this->load_view();
    }

    public function property($id = "")
	{
		if($id != "")
		{
			$filter = array("id" => $id);
			$table  = new property();
			$data   = common::get_single($table, $filter);

			if($data == false) { return Redirect::route('list-rent'); }

			$population = new population();

			$population = $population->select(DB::raw("AVG(pedad10) as below16, 
				AVG(pedad40) as between16_64,
				AVG(pedad75) as older75, 
				AVG(psexof) as woman, 
				AVG(pnacional) as spanish
			"))->where("cops",$data['cops'])->get()->first()->toArray();

			$spanish = round($population['spanish']*100);
			$woman   = round($population['woman']*100);

			$qry = 'SELECT GF.F_FactorInmig, ((GF.factor*100)/FT.total_f) as per_factor FROM
					(
						SELECT F_FactorInmig, COUNT(F_FactorInmig) AS factor FROM population WHERE cops = '.$data['cops'].' GROUP BY F_FactorInmig
			) GF,
			(
			SELECT COUNT(F_FactorInmig) AS total_f FROM population WHERE cops = '.$data['cops'].'
			) FT';

			$factors = DB::select($qry);
			$factors = array_reverse($factors);
			$factor = array();

			foreach($factors as $fact)
			{
				for($i=0;$i<5;$i++)
				{
						if($i == $fact->F_FactorInmig)
						{
							$factor["index_".($i+1)] = array("title" => "'index ".($i+1)."'", "value" => round($fact->per_factor));
						}
				}
			}
			for($i=0;$i<5;$i++)
			{
				if(!array_key_exists("index_".($i+1),$factor))
				{
					$factor["index_".($i+1)] = array("title" => "'index ".($i+1)."'", "value" => 10);
				}
			}


			$this->data['indexes'] = $factor;
			$this->data['age'] = array(
				"below16" => array("title" => "'Below 16 y.o'", "value" => round($population['below16']*100)),
				"between16_64" => array("title" => "'16 - 64 y.o'", "value" => round($population['between16_64']*100)),
				"older75" => array("title" => "'75+ y.o'", "value" => round($population['older75']*100))
			);
			$this->data['national'] = array(
				"spanish" =>array("title" => "'Spanish'", "value" =>  $spanish),
				"other" => array("title" => "'Other'", "value" => (100 - $spanish))
			);

			$this->data['sex'] =  array(
				"female" => array("title" => "'Female'", "value" =>  $woman),
				"male" => array("title" => "'Male'", "value" =>  (100-$woman))
			);

			$images = DB::table('loquare_uploads')->select('filename')->where("post_id", "=", $id);
			$images = $images->where("post_type", "=", "property-image")->get();

			$images = json_decode(json_encode($images), true);
			$data['images'] = $images;

			$this->data['nearby_flats'] = PropertyModel::nearby_property($id);
			$data['property_type']      = PropertyModel::property_type($id);

			if($data != false)
			{
				$this->data['property'] = $data;
				$this->data['scripts'] = array(
					asset('/frontend/js/retailer-single.js'),
					asset('/frontend/js/analys.js'),
					asset('/frontend/js/analysSchools.js'),
					'https://api.tiles.mapbox.com/mapbox.js/plugins/turf/v1.3.0/turf.min.js',
					'https://api.tiles.mapbox.com/mapbox.js/v2.0.1/mapbox.js',
					asset('/frontend/js/mapbox-functions.js')
				);

				$this->data['success'] = session('success');
				$this->data['error'] = session('error');

				$this->data['og'] = array(
					"title" => $data['direccion'],
					"url" => url('/')."rent/property/".$data['id'],
					"image" => url('/storage/Property/'.$data['id'].'/thumbs/'.$images[0]['filename']),
					"discription" => $data['discription']
				);

				$this->view = 'single';
				return $this->load_view();
			}
			else{
				return Redirect::route('home');
			}
		}
		else{
			return Redirect::route('home');
		}
	}

	public function page($page = "")
	{
		if($page != "")
		{
			$page = explode(".", $page);

			if(view()->exists("design.".$page[0])){
				return view("design.".$page[0], $this->data);
			}
			else{
				return Redirect::route('home');
			}
		}
		else{
			return Redirect::route('home');
		}
	}

	function properties(Request $request)
	{
		$zipcode = $city = "";
		$search = $request->input('search');
		$page = $request->input('page');
		$min = (int)trim($request->input('min_price'));
		$max = (int)trim($request->input('max_price'));
		$type = $request->input('type');
		$property_type = $request->input('property_type');
		$room = $request->input('rooms');
		$baths = $request->input('bathrooms');
		$features = $request->input('features');
		$sort_by = $request->input('sort_by');
		$searchin = $request->input("searchin");


		$this->data['baths'] = $baths;
		$this->data['features'] = $features;
		$this->data['rooms'] = $room;
		if($baths != "" && $baths != NULL)
		{ $baths = implode(" - ",$this->data['baths']); }

		$minsize = $request->input('min_size');
		$maxsize = $request->input('max_size');

		$filter = "";

		$typeof = $request->input('typeof');

		if($page == "" || $page == 0)
		{
			$page = 1;
		}

		$page = (($page * 10) - 10);


		DB::connection()->enableQueryLog();

		if ($searchin == "listing") {

			$provincia = "";

			$check = explode(";", $search);


			if(count($check) > 0)
			{
				for ($i = 0; $i < count($check); $i++) {
					$creck1 = explode(" ", $check[$i]);
					for ($j = 0; $j < count($creck1); $j++) {
						if (is_numeric(trim($creck1[$j])) && strlen($creck1[$j]) >= 4) {
							$zipcode = $creck1[$j];
							$provincia = $creck1[$j + 1];
						}
					}
				}
			}

			$qry = "SELECT * FROM `property` WHERE  `status` = 1";

			if($zipcode != "")
			{
				$qry .= " AND `cops` = '" . $zipcode . "' ";
			}

			$qry .= " AND ( `direccion` LIKE '%" .addslashes($check[0]). "%'";

			if($provincia != "")
			{
				"AND `provincia` LIKE '%" . $provincia . "%'";
			}
			$qry .= ")";

			if ($min != "")
			{
				$filter .= " AND `price` >= " . $min;
			}
			if($max != "")
			{
				$filter .= " AND `price` <= " . $max;
			}



			if(trim($minsize) != "" && trim($maxsize) != "")
			{ $filter .= " AND `sizem2` BETWEEN ".$minsize." AND ". $maxsize;}

			elseif(trim($minsize) != "")
			{ $filter .= " AND `sizem2` >= ".$minsize;}
			elseif(trim($maxsize) != "")
			{ $filter .= " AND `sizem2` <= ". $maxsize;}

			if ($type != "") {
				$filter .= " AND `property_deal` = '" . $type . "'";
			}
			if (count($this->data['rooms']) != 0) {
				foreach($this->data['rooms'] as $key => $val) {
					if($val == '5+')
					{ $this->data['rooms'][$key] = 5;}
				}
				$filter .= " AND `rooms` IN (" . implode(",", $this->data['rooms']) . ")";
			}
			if($property_type!=''){
				$filter .= " AND `property_type` IN (" . implode(",", $property_type) . ")";
			}
			if (count($this->data['baths']) != 0) {
				foreach($this->data['baths'] as $key => $val) {
					if($val == '5+')
					{ $this->data['baths'][$key] = 5;}
				}

				$filter .= " AND `bathrooms` IN (" . implode(",", $this->data['baths']) . ")";
			}

			if($features != "" && $features != NULL)
			{
				//$features = explode(",", $features);
				$filter .= " AND (";
				foreach($features as $feature)
				{
					$filter .= $feature ." = 1 OR ";
				}
				$filter = rtrim($filter,  "OR ");
				$filter .= ")";
			}

			if($sort_by!=''){
				$sort_array=explode('-',$sort_by);
				$filter .= " ORDER BY `".$sort_array[0]."` ". $sort_array[1];
			}
			else
			{
				$filter .= " ORDER BY `construction` DESC";
			}
			$qry2 = $qry . " " . $filter;
			$qry .= " " . $filter . " LIMIT " . $page . ", 10";

			$total = DB::select($qry2);
			$total2 = "";
			foreach ($total as $dt) {
				$property = (array)$dt;

				$images = DB::table('loquare_uploads')->select('filename')->where("post_id", "=", $property['id']);
				$images = $images->where("post_type", "=", "property-image")->get();

				$images = json_decode(json_encode($images), true);

				$total2[] = (array)$property;
			}
			if (count($total)) {
				$total = $total2;
			}


			$data = DB::select($qry);

			$data2 = "";

			foreach ($data as $dt) {

				$property = (array)$dt;

				$images = DB::table('loquare_uploads')->select('filename')->where("post_id", "=", $property['id']);
				$images = $images->where("post_type", "=", "property-image")->get();

				$images = json_decode(json_encode($images), true);
				$property['images'] = $images;
				$data2[] = $property;
			}
			if (count($data)) {
				$data = $data2;
			}

		}
		else {
			$data = new property();
			$data = $data->where("status", "=", 1);

			if($searchin == "district")
			{
				$zips = [];
				$table = new distzip();
				$filter = array(
					array("district", "like", "%".$search."%"),
				);

				$areazips = common::get_by_condition($table, $filter);
				if($areazips != false)
				{
					foreach($areazips as $areazip)
					{
						$zips[] = $areazip['zipcode'];
					}
				}
				$data = $data->whereIn("cops", $zips);
			}
			elseif($searchin == "hoods")
			{
				$data = $data->where("hoods", 'LIKE', '%' . trim($search) . '%');
			}
			elseif($searchin == "cops")
			{

				if($search[0] == 0){
					$search = substr($search, 1);
				}

				$data = $data->where("cops", 'LIKE', '%' . trim($search) . '%');
			}
			else{
				$search = explode(",", $search);

				if (count($search) > 1) {

					$data = $data->where("provincia", 'LIKE', '%' . trim($search[0]) . '%');
					for ($i = 1; $i < count($search); $i++) {

						$data = $data->orwhere("provincia", 'LIKE', '%' . trim($search[$i]) . '%');
						$data = $data->orwhere("direccion", 'LIKE', '%' . trim($search[$i]) . '%');
					}
				}else{

					if(trim($search[0]) != "")
					{
						$data = $data->where("provincia", 'LIKE', '%' . trim($search[0]) . '%');
						$data = $data->orwhere("direccion", 'LIKE', '%' . trim($search[0]) . '%');
					}

				}
			}

			if ($type != "") {
				$data = $data->where("property_deal", '=', $type);
			}

			if($property_type!=''){
				$data = $data->whereIn('property_type', $property_type);
			}
			if(count($this->data['rooms'])>0){
				if (in_array("5+", $this->data['rooms'])) {
					foreach($this->data['rooms'] as $key => $val) {
						if($val == '5+')
						{ $this->data['rooms'][$key] = 5;}
					}

					$data = $data->where(function ($query) {
						$query=$query->whereIn('rooms', $this->data['rooms'])
							->orWhere('rooms', '>=', 5);
					});
				} else {
					$data = $data->whereIn('rooms', $this->data['rooms']);
				}
			}

			if (count($this->data['baths']) > 0) {
				if (in_array("5+", $this->data['baths'])) {
					foreach($this->data['baths'] as $key => $val) {
						if($val == '5+')
						{ $this->data['baths'][$key] = 5;}
					}

					$data = $data->where(function ($query) {
						$query=$query->whereIn('bathrooms', $this->data['baths'])
							->orWhere('bathrooms', '>=', 5);
					});
				} else {
					$data = $data->whereIn('bathrooms', $this->data['baths']);
				}
			}

			if($features != "" && $features != NULL)
			{
				$data = $data->where(function ($query) {
					$features = $this->data['features'];
					foreach($features as $feature)
					{
						$query = $query->orWhere($feature, '=', 1);
					}
				});
			}

			if(trim($min) != "")
			{
				$data = $data->where("price", ">=", $min);
			}
			if($max != "")
			{
				$data = $data->where("price", "<=", $max);
			}
			if(trim($minsize) != "" || ($maxsize) != "" )
			{
				$data = $data->whereBetween("sizem2", array($minsize, $maxsize));
			}

			if($sort_by!=''){
				$sort_array=explode('-',$sort_by);
				$data = $data->orderBy($sort_array[0],$sort_array[1]);
			}
			else
			{
				$data = $data->orderBy('construction','DESC');
			}

			$total = $data->get();

			//$queries = DB::getQueryLog();
			//$last_query = end($queries);

			$total = $total->toArray();

			$data = $data->offset($page)->limit(10)->get();

			$data = $data->toArray();

			$data2 = array();
			foreach ($data as $dt) {

				$property = $dt;

				$images = DB::table('loquare_uploads')->select('filename')->where("post_id", "=", $property['id']);
				$images = $images->where("post_type", "=", "property-image")->get();

				$images = json_decode(json_encode($images), true);
				$property['images'] = $images;
				$data2[] = $property;
			}
			$data = $data2;

		}

		if (count($total) > 0) {
			$results['total'] = $total;
			$results['details'] = $data;
			echo json_encode($results);
		} else {
			echo json_encode(FALSE);
		}
	}

	function searchin(Request $request)
	{
		$search = $request->input('search');
		$searchin = false;
		$response = array(
			"status" => 200,
			"searchin" => "listing"
		);

		$data = DB::table("property")->where("provincia", $search)->count();

		if($data > 0)
		{
			$searchin = true;
			$response['searchin'] = "areas";
		}

		if(!$searchin)
		{
			$data = DB::table("property")->where("hoods", $search)->count();
			if($data > 0)
			{
				$searchin = true;
				$response['searchin'] = "hoods";
			}
		}

		if(!$searchin)
		{
			$data = DB::table("district_zip")->where("district",$search)->count();
			if($data > 0)
			{
				$searchin = true;
				$response['searchin'] = "district";
			}
		}

		if(!$searchin)
		{
			$data = DB::table("district_zip")->where("district",$search)->count();
			if($data > 0)
			{
				$searchin = true;
				$response['searchin'] = "district";
			}
		}


		if(!$searchin)
		{
			$data = DB::table("district_zip")->where("zipcode",$search)->count();
			if($data > 0)
			{
				$searchin = true;
				$response['searchin'] = "cops";
			}
		}

		echo  json_encode($response);
		exit();
	}

	function searchresult(Request $request)
	{
		$query = $request->input('query');

		$queryparts = explode(",", $query);

		$state = $request->input("states");

		if($state == "" || $state == NULL)
		{
			$state = $this->searchdata['provincia'];
		}

		$result['cops']         = $this->zipcodes($queryparts);
		$result['district']     = $this->searchDistrict($state, $queryparts);
		$result['hoods']        = $this->hoods($queryparts);
		$result['areas']        = $this->searchfor($state, $queryparts, array("provincia"));
		$result['listing']      = $this->searchfor($state, $queryparts, array('direccion', 'rooms', 'bathrooms', 'price', 'provincia', 'cops'));

		echo json_encode($result);
	}

	function hoods($queryparts)
	{
		$hoods = "SELECT DISTINCT(`hoods`) from `property`";
		if(sizeof($queryparts) > 0)
		{
			$count  = 0;
			$hoods .= " WHERE status = 1 AND (";
			foreach($queryparts as $hood)
			{
				if($count == 0)
				{
					$hoods .= "(`hoods` LIKE '%".$hood."%')";
				}
				else{
					$hoods .= " OR (`hoods` LIKE '%".$hood."%')";
				}
				$count++;
			}
			$hoods .= ")";
		}
		$hoods .= ' ORDER BY `hoods` ASC';
		$data = DB::select($hoods);

		return $data;
	}

	function zipcodes($queryparts)
	{
		$hoods = "SELECT DISTINCT(`cops`) from `property`";
		if(sizeof($queryparts) > 0)
		{
			$count  = 0;
			$hoods .= " WHERE status = 1 AND (";
			foreach($queryparts as $hood)
			{
				if($count == 0)
				{
					$hoods .= "(`cops` LIKE '%".$hood."%')";
				}
				else{
					$hoods .= " OR (`cops` LIKE '%".$hood."%')";
				}
				$count++;
			}
			$hoods .= ")";
		}
		$hoods .= ' ORDER BY `cops` ASC';
		$data = DB::select($hoods);

		return $data;
	}

	function searchDistrict($state="", $queryparts)
	{
		$queryparts = explode(" ", implode(" ", $queryparts));

		$areaquery = "SELECT DISTINCT `district` FROM `district_zip`";
		$count = 0;

		$areaquery .= " WHERE `state` = '".$state."'";

		if(count($queryparts) > 0)
		{
			$areaquery .= " AND (";
			foreach($queryparts as $area)
			{
				if($count == 0)
				{
					$areaquery .= "(`zipcode` = '".$area."' OR district LIKE '%".trim($area)."%')";
				}
				else{
					$areaquery .= " OR (`zipcode` = '".$area."' OR district LIKE '%".trim($area)."%')";
				}
				$count++;
			}
			$areaquery .= ")";

		}

		$areaquery .= ' ORDER BY `district` ASC';
		$data = DB::select($areaquery);

		return $data;
	}

	function searchfor($state="", $queryparts, $select)
	{

		$slct = "";
		foreach($select as $field)
		{
			$slct .= "`".$field."`,";
		}

		if(count($select) == 0)
		{
			$slct = "*";
		}

		$slct = trim($slct, ",");

		$areaquery = "SELECT DISTINCT ".$slct." from `property`";

		$areaquery .= " WHERE `status` = 1 AND `provincia` = '".$state."'";
		if(count($queryparts) > 0) {
			$areaquery .= " AND ( ";
		}

		for($i = 0;$i < count($queryparts);$i++)
		{
			$place = trim($queryparts[$i]);
			if($i == 0)
			{
				$areaquery .= "(( `comunidad_autonoma` LIKE '%".$place."%' OR `direccion` LIKE '%".$place."%' OR `provincia` LIKE '%".$place."%' OR `cops` LIKE '%".$place."%' OR `hoods` LIKE '%".$place."%')";
			}
			else{
				$areaquery .= " OR ( `comunidad_autonoma` LIKE '%".$place."%' OR `direccion` LIKE '%".$place."%' OR `provincia` LIKE '%".$place."%' OR `cops` LIKE '%".$place."%' OR `hoods` LIKE '%".$place."%')";
			}
		}
		if(count($queryparts) > 0) {
			$areaquery .= "))";
		}

		for($i = 0;$i < count($queryparts); $i++)
		{
			if(trim($queryparts[$i]) == "SALE" || trim($queryparts[$i]) == "RENT")
			{
				$areaquery .= " AND `property_deal` = '".trim($queryparts[$i])."'";
				break;
			}
		}

		$data = DB::select($areaquery);

		return $data;
	}
}

<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\collection\CollectionModel as collect;
use App\Http\Controllers\CI_ModelController as common;
use App\properties\PropertyModel as property;
use Session;
use DB;
use Auth;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
	protected $data, $view, $logedin;

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
		$this->data['scripts'] = false;

		$this->middleware(function ($request, $next) {
			$this->logedin = Auth::user();
			return $next($request);
		});

	}

	public function load_view()
	{
		return view("user.".$this->view, $this->data);
	}

	function my_property($name = "")
	{
		if($name != "")
		{
			if($name == $this->logedin->name)
			{
				$this->data['scripts'] = array(
					asset('/frontend/js/my-property.js')
				);

				$this->view  = "my_properties";
				return $this->load_view();
			}
			else
			{
				return Redirect("/");
			}
		}
		else{
			return Redirect("/");
		}
	}
	function get_my_property(Request $request)
	{
		$id     =$this->logedin->id;
		$page   = $request->input('page');
		$limit  = $request->input('limit');
		$property_for = trim($request->input('property_for'));

		$offset = ($page - 1)*$limit;

		$filters = array();
		if($property_for != "")
		{
			$filters[] = array("property_deal", $property_for);
		}

		$data['properties'] = property::get_MyProperty($id,$offset,$limit, $filters);


		$response = array(
			"total" => property::my_total_properties(Auth::user()->id, $filters),
			"content" => View::make("user.my_property_page", $data)->render()
		);

		echo json_encode($response);
	}


}

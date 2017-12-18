<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\collection\CollectionModel as collect;
use App\Http\Controllers\CI_ModelController as common;
use Session;
use Redirect;
use App\collection\GrouplistModel as collectlist;
use DB;

class CollectionsController extends Controller
{
	protected $data, $view, $logedin;

	function __construct()
	{
		parent::__construct();
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
		return view($this->view, $this->data);
	}

	function search_add_collection(Request $request)
	{
		$collection = $request->input("collection");
		$property   = $request->input("property");

		if(trim($collection) != "")
		{
			$table = new collect();
			$filter = array(
				array("collection", "like", "%".$collection."%"),
				array("user_id", "=", Auth::user()->id),
			);

			$data = common::get_by_condition($table, $filter);

			if($data == false)
			{
				$insert = array(
					"collection"    => $collection,
					"user_id"       => Auth::user()->id,
					"created_at"    => date('Y-m-d H:i:s')
				);

				$flag = common::insert_data($table, $insert);

				if($flag != false)
				{
					$data = common::get_by_condition($table, $filter);
				}

			}

			if($data != false)
			{
				$collections = '<input type="hidden" value="'.$property.'" name="property">';
				foreach($data as $collect)
				{
					$collections .= '<div class="list-checks__item active">
		                                <input type="radio" id="collect'.$collect['id'].'" name="collect" value="'.$collect['id'].'">
		                                <label for="collect'.$collect['id'].'">'.$collect['collection'].'<span class="list-checks__count">('.$collect['total_property'].')</span></label>
		                            </div>';
				}
				echo json_encode($collections);
			}
			else{
				echo json_encode(FALSE);
			}

		}
		else{
			return json_encode(FALSE);
		}
	}

	function savein_collection(Request $request)
	{

		$collection = $request->input("collect");
		$comment    = $request->input("collection_comment");
		$property   = $request->input("property");

		$table = new collect();
		$filter = array(
			"user_id" => Auth::user()->id,
			"id" => $collection
		);
		$collection = common::get_single($table, $filter);

		if($property != "" && $collection != false)
		{
			$insert     = array(
				"property_id"   => $property,
				"collection_id" => $collection['id'],
				"property_from" => "retailer",
				"comment"       => $comment,
				"user_id"       => Auth::user()->id,
				"created_at"    => date('Y-m-d h:i:s')
			);

			$table = new collectlist();
			$flag  = common::insert_data($table, $insert);

			if($flag != false)
			{
				$total_property = collect::find($collection['id']);
				$total_property->total_property = $total_property->total_property+1;
				$total_property->save();

				Session::flash("success", "Congratulation!<br/>Property successfuly saved in \"".$collection['collection']."\"");
			}
			else{
				Session::flash("error", "Sorry! Something went wrong<br/>Please try again!");
			}
		}
		else{
			Session::flash("error", "Sorry! Something went wrong<br/>Please try again!");
		}


		return redirect()->back();
	}

	public function collection($name = "", $collection_id="")
	{
		if($name != "")
		{
			if($name == $this->logedin->name)
			{
				$table = new collect();

				$filter = array(
					array("user_id", "=", $this->logedin->id),
					array("id", "=", $collection_id),
				);
				$exists = common::get_single($table, $filter);

				$this->data['scripts'] = array(
					asset("/frontend/js/collections.js")
				);

				$filter = array(
					array ("user_id", "=", $this->logedin->id)
				);
				$collections = common::get_by_condition($table, $filter);
				$this->data['collections'] = $collections;
				$this->data['collect_id'] = ($exists != false)?$exists['id']:$collections[0]['id'];
				$this->view  = "user.collections";
				return $this->load_view();
			}
			else{
				return Redirect("/");
			}
		}
		else{
			return Redirect("/");
		}
	}

	public function get_collection_property(Request $request)
	{
		$collection  = $request->input("collection");
		$limit       = $request->input("limit");
		$page        = $request->input("page");

		$offset = ($page - 1)*$limit;

		$data['collections'] = collect::get_collection_property($collection, $offset, $limit);

		$data['page'] = $page;

		return view("user.collection_page", $data);
	}

	public function rename(Request $request)
	{
		$name = $request->input("name");
		$id = $request->input("collection");

		$collection = collect::find($id);

		if($collection->user_id = Auth::user()->id)
		{
			$collection->collection = $name;

			$flag = $collection->save();

			if($flag)
			{
				echo json_encode(TRUE);
			}

		}
		else
		{
			echo json_encode(FALSE);
		}

		exit();
	}

	public function delete(Request $request)
	{
		$id = $request->input("collection");

		$collection = collect::where("id", $id)->where("user_id", Auth::user()->id);

		$flag = $collection->delete();

		if($flag)
		{
			collectlist::where("collection_id", $id)->where("user_id", Auth::user()->id)->delete();

			echo json_encode(
				array(
					"status" => 200,
					"message" => "Congratulation! <br/> Collection deleted successfuly!"
				)
			);
		}
		else
		{
			echo json_encode(
				array(
					"status" => 500,
					"message" => "Sorry! Something went wrong<br/>Please try again!"
				)
			);
		}
		exit();
	}

	function remove_from_collection(Request $request)
	{
		$collection = $request->input("collection");
		$property   = $request->input("property");

		$flag = collectlist::where("collection_id", $collection)
			->where("property_id", $property)
			->where("user_id", Auth::user()->id)
			->delete();

		if($flag != false || $flag != false)
		{
			$collection  = collect::find($collection);
			$collection->total_property = $collection->total_property - 1;
			$collection->save();

			Session::flash("success", "Successful!<br/> property Removed from your collection!");

			echo json_encode(
				array(
					"status" => 200,
					"message" => "Congratulation! <br/> property removed from collection successfuly!"
				)
			);

		}
		else
		{
			Session::flash("error", "Sorry! Something went wrong<br/>Please try again!");
			echo json_encode(
				array(
					"status" => 500,
					"message" => "Sorry! Something went wrong<br/>Please try again!"
				)
			);
		}

		exit();
	}

	function update_collection_comment(Request $request)
	{
		$collection = $request->input("collection");
		$property = $request->input("property");
		$comment = $request->input("comment");

		$table = new collectlist();
		$filter = array(
			"collection_id" => $collection,
			"property_id" =>  $property,
			"user_id" => Auth::user()->id
		);

		$collection_property = common::get_single($table, $filter);

		if($collection_property != false)
		{
			$collection_property = collectlist::find($collection_property['id']);
			$collection_property->comment = trim($comment);
			$flag = $collection_property->save();

			if($flag)
				echo json_encode(
					array(
						"status" => 200,
						"message" => "Congratulation! <br/> Comment updated successfuly!"
					)
				);
			else
				echo json_encode(
					array(
						"status" => 500,
						"message" => "Sorry! Something went wrong<br/>Please try again!"
					)
				);
		}
		else
		{
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

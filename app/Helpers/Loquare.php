<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CI_ModelController as common;
use Auth;
use Session;

class Loquare
{
	protected $data;

	public function __construct()
	{

	}

	public static function collections($user = "")
	{
		$result = DB::table("collections");

		if($user != "")
		{
			$result = $result->where("user_id", $user);
		}

		$result = $result->get();

		if($result)
		{
			$result = json_decode(json_encode($result));

			return $result;
		}
		else{
			return false;
		}
	}

	public static function success(){
		return session("success");
	}

	public static function error(){
		return session("error");
	}
}
?>
<?php

namespace App\properties;

use Illuminate\Database\Eloquent\Model;
use DB;

class PropertyModel extends Model
{
	protected $table = "property";

	protected $fillable = array(
		"user_id",
		"comunidad_autonoma",
		"direccion",
		"localidad",
		"provincia",
		"cops",
		"property_for",
		"dist_id",
		"state_id",
		"property_type",
		"rooms",
		"bathrooms",
		"sizem2",
		"property_deal",
		"rent_by",
		"lease_duration ",
		"price",
		"discription",
		"usability",
		"construction",
		"ref",
		"hoods",
		"elevetor",
		"doorman",
		"furnished",
		"heating",
		"laundry",
		"central_ac",
		"outdoor_space",
		"gym",
		"dishwasher",
		"pool",
		"pets",
		"dogs",
		"cats",
		"most_relevant",
		"loquare_listing",
		"others",
		"latitude",
		"longitude",
		"status",
		"created_at",
		"updated_at"
	);

	protected function property_type($id = "")
	{
		if($id != "")
		{
			$data = DB::table($this->table." as TB")->select("PT.property_type_name as type")
				->leftjoin("property_types as PT", "TB.property_type", "=", "PT.id")
				->where("TB.id", "=", $id)
				->first();

			return $data->type;
		}
		else{
			return false;
		}
	}

	protected function nearby_property($id = "")
	{
		if($id != "")
		{
			$property = DB::table($this->table)->where("id", "=", $id)->first();

			 $select = "id, direccion, price, property_deal, rooms, bathrooms, sizem2, 111.1111 * DEGREES(ACOS( COS(RADIANS(" . $property->longitude. ")) * COS(RADIANS(longitude)) * COS(
			 RADIANS(" . $property->latitude. " - latitude)) + 
			 SIN(RADIANS(" . $property->longitude. ")) * SIN(RADIANS(longitude)) ) ) AS distance";

			$nearby = DB::table($this->table)->select(DB::raw($select))
				->where("id", "!=", $id)
				->orderBy("distance", 'asc')
				->limit(8)->get();

			$nearby = json_decode(json_encode($nearby), true);

			return $nearby;

		}
		else{
			return false;
		}
	}

	protected function my_total_properties($user="", $filters=array())
	{
		$result = DB::table('property as PR');
		if($user != "")
		{
			$result = $result->where("user_id", $user);
		}
		if(sizeof($filters) > 0)
		{
			foreach($filters as $filter)
			{
				$result = $result->where($filter[0], $filter[1]);
			}
		}

		$result = $result->count();

		return $result;
	}

	protected function get_MyProperty($id, $offset, $limit, $filters=array())
	{
		$result = DB::table("property as PR");
		$result = $result->select("PR.*", "LU.filename", "PT.property_type_name as property_type")
			->leftjoin("property_types as PT", "PT.id", "=", "PR.property_type")
			->leftjoin("loquare_uploads as LU", "LU.id","=",DB::raw('(SELECT MIN(id) as lid FROM loquare_uploads as LU2 where LU2.post_type = "property-image" AND LU2.post_id = PR.id LIMIT 1)'));

		if(sizeof($filters) > 0)
		{
			foreach($filters as $filter)
			{
				$result = $result->where($filter[0], $filter[1]);
			}
		}

		$result = $result->limit($limit)->offset($offset);
		$result = $result->orderby("PR.id", "DESC");

		$result = $result->get();

		if($result !=NULL)
		{
			return json_decode(json_encode($result),true);
		}
		else
		{
			return false;
		}
	}

	protected function get_property($filters = array(), $limit = 1, $offset = 0)
	{
		$result = DB::table("property as PR");
		$result = $result->select("PR.*", "LU.filename", "PT.property_type_name as property_type")
			->leftjoin("property_types as PT", "PT.id", "=", "PR.property_type")
			->leftjoin("loquare_uploads as LU", "LU.id","=",DB::raw('(SELECT MIN(id) as lid FROM loquare_uploads as LU2 where LU2.post_type = "property-image" AND LU2.post_id = PR.id LIMIT 1)'));

		if(sizeof($filters) > 0)
		{
			foreach($filters as $filter)
			{
				$result = $result->where($filter[0], $filter[1]);
			}
		}

		$result = $result->limit($limit)->offset($offset);
		$result = $result->orderby("PR.id", "DESC");

		$result = $result->get();

		if($result !=NULL)
		{
			return json_decode(json_encode($result),true);
		}
		else
		{
			return false;
		}
	}
}

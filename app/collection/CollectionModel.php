<?php

namespace App\collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class CollectionModel extends Model
{
	protected $table = "collections";

	protected $fillable = array('collection', 'user_id', 'total_property');


	static function get_collection_property($collection = "", $offset, $limit)
	{

		if($collection != "")
		{
			$data = DB::table("property as PR");
			$data = $data->select("CL.property_id AS pid", "PR.*", "CL.id as cid", "CL.comment", "LU.filename", "PT.property_type_name as property_type")
				->leftjoin("property_in_collections as CL", "CL.property_id", "=", "PR.id")
				->leftjoin("property_types as PT", "PT.id", "=", "PR.property_type")
				->leftjoin("loquare_uploads as LU", "LU.id","=",DB::raw('(SELECT MIN(id) as lid FROM loquare_uploads as LU2 where LU2.post_type = "property-image" AND LU2.post_id = PR.id LIMIT 1)'))
				->where("CL.collection_id", "=", $collection)
				->limit($limit)
				->offset($offset)
				->get();

			if($data != NULL)
			{
				return json_decode(json_encode($data));
			}
			else{
				return false;
			}

		}
		else{
			return false;
		}

		return $data;
	}

}

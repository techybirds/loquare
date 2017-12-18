<?php

namespace App\properties;

use Illuminate\Database\Eloquent\Model;

class ProperttypesModel extends Model
{
	protected $table = "property_types";

	protected $fillable = array(
		"property_type_name",
		"created_datetime",
		"modified_datetime",
	);
}

?>
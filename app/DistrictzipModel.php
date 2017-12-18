<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistrictzipModel extends Model
{
	protected $table = "district_zip";

	protected $fillable = array('zipcode', 'district');
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatesModel extends Model
{
	protected $table = "states";

	protected $fillable = array('id', 'statename', 'status');
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
	protected $table = "comments_property";
	protected $fillable = array('property_id', 'user_id', 'comment', 'property_from','created_at');
}

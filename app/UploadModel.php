<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadModel extends Model
{
	protected $table = "loquare_uploads";

	protected $fillable = array(
		'filename',
		'filetype',
		'post_id',
		'post_type',
		'created_at',
		'updated_at'

	);
}

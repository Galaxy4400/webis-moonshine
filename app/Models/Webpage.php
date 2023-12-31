<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Webpage extends Model
{
	use HasFactory;
	use NodeTrait;

	protected $fillable = [
		'title',
		'slug',
		'body',
		'parent_id',
		'sorting',
	];
}

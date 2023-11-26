<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Webpage extends Model
{
	use HasFactory;

	protected $fillable = [
		'title',
		'slug',
		'body',
		'webpage_id', 
		'sorting'
	];


	public function webpage(): BelongsTo
	{
		return $this->belongsTo(self::class);
	}
}

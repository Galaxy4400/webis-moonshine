<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
		'sorting'
	];


	// public function parent(): BelongsTo
	// {
	// 	return $this->belongsTo(self::class, 'parent_id');
	// }


	// public function children(): HasMany
	// {
	// 	return $this->hasMany(self::class, 'parent_id');
	// }
}

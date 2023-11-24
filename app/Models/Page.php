<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
	use HasFactory;

	protected $fillable = ['title', 'slug', 'page_id', 'sorting'];


	public function page(): BelongsTo
	{
		return $this->belongsTo(self::class);
	}
}

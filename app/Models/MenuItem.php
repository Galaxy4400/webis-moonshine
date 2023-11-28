<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuItem extends Model
{
	use HasFactory;
	use NodeTrait;

	protected $fillable = [
		'menu_id',
		'parent_id',
		'title',
		'link',
		'sorting',
	];


	public function menu(): BelongsTo
	{
		return $this->belongsTo(Menu::class);
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
	];


	public function items(): HasMany
	{
		return $this->hasMany(MenuItem::class);
	}
}

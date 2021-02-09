<?php

namespace MrTea\Concierge\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
	protected $fillable = [
		'token',
		'created_at',
	];

	public $timestamps = false;

	public function authenticatable()
    {
        return $this->morphTo();
    }
}

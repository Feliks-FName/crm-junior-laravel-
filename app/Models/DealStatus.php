<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealStatus extends Model
{
    protected $fillable = [
        'name',
        'code',
    ];

    public function deals()
    {
        return $this->hasMany(Deal::class, 'status_id', 'id')->orderBy('created_at', 'desc');
    }
}

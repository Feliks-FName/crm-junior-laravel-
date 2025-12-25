<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
    ];

    public function deals()
    {
        return $this->hasMany(Deal::class, 'client_id', 'id')->orderBy('created_at', 'desc');

    }

    public function statuses()
    {
        return $this->hasMany(DealStatus::class, 'client_id', 'id');
    }
}

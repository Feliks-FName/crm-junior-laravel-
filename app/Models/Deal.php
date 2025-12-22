<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'client_id',
        'status_id',
        'comments',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_content',
        'utm_term'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->orderBy('created_at', 'desc');
    }

    public function client()
    {
        return $this->belongsTo(Client::class)->orderBy('created_at', 'desc');
    }

    public function status()
    {
        return $this->belongsTo(DealStatus::class, 'status_id')->orderBy('created_at', 'desc');
    }
}

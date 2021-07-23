<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $primaryKey = 'id_event';

    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'title', 'start', 'end',];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the campaign (i.e. GM)
     */
    public function owner() {
        return $this->belongsTo(User::class, 'master_id');
    }

    public function theme() {
        return $this->belongsTo(Theme::class, 'theme_id');
    }

}

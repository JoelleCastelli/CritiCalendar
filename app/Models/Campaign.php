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

    public function sessions() {
        return $this->hasMany(Session::class)->orderBy('date', 'DESC');
    }

    public function characters() {
        return $this->hasMany(Character::class);
    }

    public function invitations() {
        return $this->hasMany(Invitation::class)->where('accepted', false);
    }

}

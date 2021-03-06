<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function characters()
    {
        return $this->hasMany(Character::class,'player_id');
    }

    public static function getSessions()
    {
        // get campaigns as player
        foreach (Auth::user()->characters as $character) {
            $campaignsId[] = $character->campaign->id;
        }

        // get campaigns as master
        foreach (Campaign::all() as $campaign) {
            if ($campaign->master_id == Auth::user()->id)
                $campaignsId[] = $campaign->id;
        }
        return Event::whereIn('campaign_id', $campaignsId)->get();

    }
}

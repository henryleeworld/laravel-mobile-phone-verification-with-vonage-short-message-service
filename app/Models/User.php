<?php

namespace App\Models;

use App\Interfaces\MustVerifyMobile as IMustVerifyMobile;
use App\Notifications\SendVerifySMS;
use App\Traits\MustVerifyMobile;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements IMustVerifyMobile
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, MustVerifyMobile, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile_number',
        'mobile_verify_code',
        'mobile_attempts_left',
        'mobile_last_attempt_date',
        'mobile_verify_code_sent_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'mobile_verify_code',
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'mobile_verify_code_sent_at' => 'datetime',
            'mobile_last_attempt_date' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Route notifications for the Vonage channel.
     */
    public function routeNotificationForVonage(SendVerifySMS $notification): string
    {
        return $this->mobile_number;
    }
}

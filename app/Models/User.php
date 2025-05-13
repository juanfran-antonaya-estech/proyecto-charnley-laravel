<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
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
            'password' => 'hashed',
        ];
    }

    public function chatrooms(){
        return $this->hasMany(Sala::class, 'id_paciente', 'id');
    }

    /**
     * @author Jose Lopez Vilchez
     * La idea es poder sacar las salas en las que alguien participe de soporte,
     * para no recibir todos los chats existentes al hacer la vista de soporte.
     * Me viene bien para el helper.
     *
     * En Sala se podía sacar qué usuarios están asociados a una sala,
     * pero intentar usar solo eso para sacar las salas asociadas a un
     * usuario hubiese ensuciado mucho.
     */
    public function salasSoporte()
    {
        return $this->belongsToMany(Sala::class, 'sala_user', 'user_id', 'sala_id');
    } // ------------------------------------------------

    public function takingCareOf(){
        return $this->belongsTo(User::class, 'taking_care_of', 'id');
    }
    public function takenCareOf(){
        return $this->belongsToMany(User::class, 'taking_care_of', 'id');
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'users'; // Confirmamos que el modelo usa 'users' como nombre de tabla


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
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
            'password' => 'hashed',
        ];
    }

    public function jocs()
    {
        return $this->belongsToMany(Joc::class, 'usuaris_jocs', 'usuari_id', 'joc_id')
                    ->withPivot('rating') // Incluir la columna 'rating' en la relación
                    ->withTimestamps();
    }

    
}

class Usuari extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    public function jocs()
{
    return $this->belongsToMany(Joc::class, 'usuaris_jocs')->withPivot('rating');
}


    
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariJoc extends Model
{
    use HasFactory;

    protected $table = 'usuaris_jocs';

    protected $fillable = ['usuari_id', 'joc_id', 'rating'];
}

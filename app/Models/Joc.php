<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joc extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function usuaris()
{
    return $this->belongsToMany(User::class, 'usuaris_jocs', 'joc_id', 'usuari_id')
                ->withPivot('rating')  // Asegúrate de que se carga la columna 'rating' de la tabla intermedia
                ->withTimestamps();
}

public function usuaris_jocs()
{
    return $this->belongsToMany(User::class, 'usuaris_jocs', 'joc_id', 'usuari_id')
                ->withPivot('rating');
}


    

}


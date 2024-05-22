<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    // Campos a mostrar
    protected $fillable = ['role', 'descripcion'];

    // realación entre tablas
    // 1-N -> 1 Rol a varios Usuarios, 1 Usuario a un Rol
    public function users():HasMany{
        return $this->hasMany(User::class);
    }
}

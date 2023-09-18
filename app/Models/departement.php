<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departement extends Model
{
    use HasFactory;

    protected $table = 'departements';
    protected $primaryKey = 'id_departement';

    protected $fillable = [
        'id_departement',
        'nama_departement',
        'deskripsi'
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'id_departement', 'id_departement');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Relasi extends Model
{
    use HasFactory;
    protected $table = 'relasis';
    protected $primaryKey = 'id_relasi';

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'id_user', 'id_user');
    }

    public function project(): HasMany
    {
        return $this->hasMany(Project::class, 'id_project', 'id_project');
    }
}

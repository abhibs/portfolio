<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function multiprogram()
    {
        return $this->hasMany(MultiProgram::class, 'program_id', 'id');
    }

}

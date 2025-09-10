<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Tag extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'color', // Make sure 'color' is also here if you're trying to save it.
    ];

    // Relatie met de Cars
    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}

<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Tag extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Relatie met de Cars
    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}

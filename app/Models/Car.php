<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;

class Car extends Model
{
    use HasFactory;
    // Relatie met de User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relatie met de Tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    protected $fillable = [
        'license_plate',
        'brand',
        'model',
        'image',
        'price',
        'mileage',
        'seats',
        'doors',
        'production_year',
        'weight',
        'color',
        'sold_at',
        'views',
    ];
}

?>

<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = "persons";

    protected $fillable = [
        "firstName", "lastName", "documentNumber", "country", 
        "city", "street", "number", "single"
    ];

    protected $hidden = [
        "created_at", "updated_at"
    ];
}
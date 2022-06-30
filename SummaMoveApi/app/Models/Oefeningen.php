<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oefeningen extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['naam_NL','naam_EN','omschrijving_NL','omschrijving_EN'];

}

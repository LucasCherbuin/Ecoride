<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditGagneDonnees extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'creditGagne_donnees';

    protected $fillable = ['date', 'total'];

}

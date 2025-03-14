<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CovoiturageDonnees extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'covoitruage_donnees';

    protected $fillable = ['date', 'total', 'date_depart'];
}

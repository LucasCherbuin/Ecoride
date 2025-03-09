<?php

namespace App\View\Components;

use Illuminate\view\Component;

class Annonce extends Component
{
    public $depart;
    public $arrive;
    public $date;
    public $heure;
    public $ecologique;
    public $creation;

    public function __construct($depart, $arrive, $date, $heure, $ecologique, $creation)
    {
        $this->depart = $depart;
        $this->arrive = $arrive;
        $this->date = $date;
        $this->date = $heure;
        $this->date = $ecologique;
        $this->date = $creation;
    }

    public function render()
    {
        return view('components.annonce');
    }
}

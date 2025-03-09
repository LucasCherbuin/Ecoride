<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RechercheCovoiturage extends Component
{
    public $title;
    public $content;

    public function render()
    {
        return view('livewire.recherche-covoiturage');
    }

    public function search()
    {
        // Logique de recherche ici
    }

    public function filterSelection($filter)
    {
        // Logique de filtrage ici
    }
}

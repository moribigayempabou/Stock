<?php

namespace App\Listeners;

use App\Events\MaterielCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateQuantiteRestante
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MaterielCreated $event): void
    {
        $materiel = $event->materiel;

        // Mettre à jour la colonne "quantite_restante" avec la valeur de la colonne "quantite"
        $materiel->quantite_reste = $materiel->quantite;

        // Enregistrez la modification du matériel
        $materiel->save();
    }
   
}

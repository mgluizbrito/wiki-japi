<?php

namespace App\Http\Controllers;

use App\Models\CommunityIdentification;
use App\Models\Observation;

class PortalController extends Controller
{
    public function index(){

            $observations = Observation::with(['user', 'ident']) // Carrega os relacionamentos
                ->orderByDesc("created_at")
                ->paginate(50);

            foreach ($observations as $observation) {
                $observation->datetime = date('d/m/Y á\s H:i', strtotime($observation->datetime));
            }   
            //dd($observations[0]->ident);
            return view("Portal", [
                'observations' => $observations,
            ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Observation;

class PortalController extends Controller
{
    public function index(){

        $observations = Observation::all()->sortByDesc('created_at')->take(50);
        foreach ($observations as $observation) {
            $observation->datetime = date('d/m/Y á\s H:i', strtotime($observation->datetime));
        }
        
        return view("Portal", [
            'observations' => $observations,
        ]);
    }
}

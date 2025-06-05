<?php

namespace App\Http\Controllers;

use App\Models\CommunityIdentification;
use App\Models\Observation;
use DB;
use Illuminate\Http\Request;
use Str;

class ObservationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obsData = $request->validate([
            'desc' => 'required|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'foto' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        
        $obsData['datetime'] = $request->date . " " . $request->time;
        $obsData['latitude'] = $request->latitude;
        $obsData['longitude'] = $request->longitude;
        $obsData['user_id'] = auth()->user()->id;

        $fileName = Str::uuid() . "." . $request->file('foto')->getClientOriginalExtension();
        $obsData['photo_url'] = $request->file('foto')->storeAs('obs', $fileName, 'public');
    
        Observation::create($obsData);

        return redirect(route('portal'))->with('success', 'Observação criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $obs = Observation::findOrFail($request->id);
        
        if (CommunityIdentification::where('observation_id', $obs['id'])->exists()){

            return view('Observation', [
                'obs' => $obs,
                'iden' => CommunityIdentification::where('observation_id', $obs['id'])->orderBy("created_at", "desc")->first(),
            ]);
        }
        return view('Observation', [
            'obs' => $obs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

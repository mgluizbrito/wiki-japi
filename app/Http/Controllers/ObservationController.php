<?php

namespace App\Http\Controllers;

use App\Models\CommunityIdentification;
use App\Models\Observation;
use DB;
use Illuminate\Http\Request;
use Str;

class ObservationController extends Controller
{

    public function myObservations(Request $request)
    {
        $observations = Observation::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

            //dd($observations);
        return view('myObservations', [
            'observations' => $observations,
        ]);
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
                'user' => $obs->user,
                'iden' => CommunityIdentification::where('observation_id', $obs['id'])->orderBy("created_at", "desc")->first(),
            ]);
        }

        return view('Observation', [
            'obs' => $obs,
            'user' => $obs->user,
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
    public function update(Request $request)
    {
        $obs = Observation::findOrFail($request->id);

        $data = $request->validate([
            'desc' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $data['datetime'] = $request->date . " " . $request->time;

        if ($request->hasFile('foto')) {
            $fileName = Str::uuid() . "." . $request->file('foto')->getClientOriginalExtension();
            $data['photo_url'] = $request->file('foto')->storeAs('obs', $fileName, 'public');
        }

        DB::transaction(function () use ($obs, $data) {
            $obs->update($data);
            if ($obs->ident) {
                $obs->ident()->update(['created_at' => now()]);
            }
        });

        return redirect(route('observacao.show', [
            'id' => $obs->id,
        ]))->with('success', 'Observação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $obs = Observation::findOrFail($request->id);
        
        if ($obs->user_id !== auth()->user()->id) {
            return redirect(route('portal'))->with('error', 'Você não tem permissão para excluir esta observação.');
        }

        DB::transaction(function () use ($obs) {
            $obs->ident()->delete();
            $obs->delete();
        });

        return redirect(route('portal'))->with('success', 'Observação excluída com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CommunityIdentification;
use Illuminate\Http\Request;

class IdentificationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "id" => "required",
            "scientific_name" => "required",
            "common_name" => "required",
        ]);

        $data["observation_id"] = $request->id;
        $data["user_id"] = auth()->user()->id;

        CommunityIdentification::create($data);
        return redirect(route("portal"));
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityIdentification $communityIdentification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityIdentification $communityIdentification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityIdentification $communityIdentification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityIdentification $communityIdentification)
    {
        //
    }
}

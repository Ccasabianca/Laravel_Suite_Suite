<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use App\Http\Requests\GiftRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\GiftCreated;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gifts = Gift::orderBy('created_at', 'desc')->get();
        return view('welcome', [
            'gifts' => $gifts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gifts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GiftRequest $request)
    {
        Gift::create($request->validated());

        Mail::to('c.casabianca@live.fr')->send(
            new GiftCreated($request->validated()['name'], $request->validated()['price'])
        );
        return redirect()->route('gifts.index')->with('message', 'Cadeau ajouté.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gift $gift)
    {
        return view('gifts.show', [
            'gift' => $gift
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gift $gift)
    {
        return view('gifts.edit', [
            'gift' => $gift
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GiftRequest $request, Gift $gift)
    {
        $gift->update($request->validated());

        return redirect()->route('gifts.show', $gift)->with('message', 'Cadeau modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gift $gift)
    {
        $gift->delete();

        return redirect()->route('gifts.index')->with('message', 'Cadeau supprimé.');
    }
}

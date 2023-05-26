<?php

namespace App\Http\Controllers;

use App\Models\Chrip;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\response;


class ChripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        return Inertia::render('Chrips/Index',[
            'chrips' => Chrip::with('user:id,name')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->chrips()->create($validated);

        return redirect(route('chrips.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chrip  $chrip
     * @return \Illuminate\Http\Response
     */
    public function show(Chrip $chrip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chrip  $chrip
     * @return \Illuminate\Http\Response
     */
    public function edit(Chrip $chrip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chrip  $chrip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chrip $chrip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chrip  $chrip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chrip $chrip)
    {
        //
    }
}

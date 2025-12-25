<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\ClientStoreRequest;
use App\Models\Client;
use App\Models\Deal;
use App\Models\DealStatus;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::query()->orderByDesc('created_at')->paginate(10);
        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientStoreRequest $request)
    {
        $data = $request->validated();
        Client::query()->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $client->load('deals', 'deals.status');

        return view('client.show', compact('client'));
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

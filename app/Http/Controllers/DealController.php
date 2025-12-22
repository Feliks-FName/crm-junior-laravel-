<?php

namespace App\Http\Controllers;

use App\Http\Requests\Deal\DealStoreRequest;
use App\Models\Deal;
use App\Models\DealStatus;
use App\Models\User;
use App\Services\Deal\CreateDealService;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = DealStatus::all();
        $deals = Deal::with(['client', 'status', 'user'])->get();

        return view('dashboard', compact('statuses', 'deals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $statuses = DealStatus::all();
        return view('deal.create', compact('users', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DealStoreRequest $request, CreateDealService $createDealService)
    {
        $data = $request->validated();
        $createDealService->create($data);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

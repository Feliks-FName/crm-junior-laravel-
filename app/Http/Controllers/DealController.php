<?php

namespace App\Http\Controllers;

use App\Http\Requests\Deal\DealStoreRequest;
use App\Http\Requests\Deal\DealUpdateRequest;
use App\Models\Deal;
use App\Models\DealStatus;
use App\Models\User;
use App\Services\Deal\CreateDealService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Deal $deal)
    {
        $statuses = DealStatus::all();
        $deals = Deal::with(['client', 'status', 'user'])->get();

        return view('dashboard', compact('statuses', 'deals', 'deal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Deal::class);

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
    public function show(Deal $deal)
    {
        return view('deal.show', compact('deal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deal $deal)
    {
        $users = User::all();
        $statuses = DealStatus::all();
        return view('deal.edit', compact('deal', 'users', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DealUpdateRequest $request, Deal $deal)
    {
        $data = $request->validated();
        $deal->update($data);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

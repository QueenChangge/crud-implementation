<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('status', 'active')->paginate(4);
        $recentUsers = User::latest()->take(5)->get();

        return view('dashboard2.Students.list.index', compact('users', 'recentUsers'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $users = User::where('fullname', 'like', "%$search%")->paginate(5);
        $recentUsers = User::latest()->take(5)->get();

        return view('dashboard2.Students.list.index', compact('users', 'recentUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

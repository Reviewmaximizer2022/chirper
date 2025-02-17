<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index() : Response

    {
        return Inertia::render('Users/Index',[
            'users' => User::select(['id','name','created_at'])->withCount('chirps')->get(),
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Inertia\Response
     */
    public function show(User $user): Response
    {
        return Inertia::render('Users/Show',
            [
                'user' => $user->only(['id', 'name']),
                'chirps' => $user->chirps()->withCount('likes')->with('likes', function ($query) {
                    $query->where('user_id', \request()->user()->id);
                })->latest()->get()
            ]);
    }

}

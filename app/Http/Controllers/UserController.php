<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        $users = User::all();
        return view('welcome', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function store(Request $request, User $user): RedirectResponse
    {
        $user->firstName = $request->get('firstName');
        $user->lastName = $request->get('lastName');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->save();
        return back()->with('message', "$user->firstName successfully created !");
    }
}

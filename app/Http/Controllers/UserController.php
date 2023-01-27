<?php

namespace App\Http\Controllers;

use App\Events\NewUserEvent;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $validated["password"] = Hash::make($validated["password"]);
        $user = User::create($validated);
        event(new NewUserEvent($user));  //fires the NewUserEvent event
        return response()->json($user);
    }
}

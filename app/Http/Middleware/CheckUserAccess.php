<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckUserAccess
{
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('id');
        $user = User::find($id);

        if(auth()->user()->role_id == 1){
            return $next($request);
        }

        if (!$user || $user->user_id !== auth()->id()) {
            $request->session()->flush();
            return redirect('/');
        }

        
    }
}


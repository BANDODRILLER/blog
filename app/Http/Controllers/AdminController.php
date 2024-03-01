<?php

namespace App\Http\Controllers;

use App\Models\Stk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function mpesatransaction()
    {
        $user = auth()->user();
        if ($user) {
            $user_type = $user->user_type;
            $username = $user->name;
        } else {
            $user_type = null;
            $username = null;
        }
        $transaction = Stk::all();
        return view('admin.mpesatransaction', compact('username', 'transaction','user'));
    }

}

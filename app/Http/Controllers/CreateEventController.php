<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateEventController extends Controller
{
    public function addevent()
    {
        $user = Auth::user();

        return view('admin.addevent', compact('user'));
    }
}

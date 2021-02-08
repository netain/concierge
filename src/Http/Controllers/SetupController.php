<?php

namespace MrTea\Concierge\Http\Controllers;

use MrTea\Concierge\Models\Administrator;

class SetupController extends Controller
{
    public function index()
    {
        return view('concierge::setup');
    }

    public function create(){
        $data = request()->validate([
            'firstname'     => 'required',
            'lastname'      => 'required',
            'email'         => 'unique:administrators,email',
            'locale'        => 'required',
            'new_password'  => 'required|min:6|confirmed',
        ]);

        Administrator::create($data);
        return redirect(route('concierge.setup.completed'));
    }

    public function completed(){
        return view('concierge::setup.completed');
    }
}

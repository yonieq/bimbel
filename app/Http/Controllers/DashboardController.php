<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['title'] = 'Dashboard';
    }

    public function index(): Renderable
    {
        if (auth()->user()->is_admin == true) {
            return view('admin.dashboard', $this->data);
        } else {
            return view('student.dashboard', $this->data);
        }
    }
}

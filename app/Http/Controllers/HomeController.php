<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->data['title'] = 'Home Page';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->data['data'] = Setting::first();

        return view('home', $this->data);
    }
}

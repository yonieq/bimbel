<?php

namespace App\Http\Controllers;

use App\Models\PaymentBimbel;
use App\Models\StudentOfBimbel;
use App\Models\User;
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
        if (auth()->user()->is_admin) {
            $this->data['total_student'] = User::where('is_admin', false)->count();
            $this->data['register'] = StudentOfBimbel::count();
            $this->data['total_user'] = User::count();
            $this->data['payment'] = PaymentBimbel::count();

            $this->data['data_register'] = StudentOfBimbel::with(['user', 'bimbel'])->take(10)->get();

            return view('admin.dashboard', $this->data);
        } else {
            return view('student.dashboard', $this->data);
        }
    }
}

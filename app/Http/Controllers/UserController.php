<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudentVoucher;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $voucher = StudentVoucher::all();

        return view('admin.main', [
            'orders' => $voucher
        ]);
    }

    public function instintution()
    {
        return view('admin.institution');
    }
}

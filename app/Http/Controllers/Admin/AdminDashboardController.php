<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // هات أي داتا للوحة التحكم هنا
        // $stats = [...];
        return view('admin.dashboard'); 
    }
}


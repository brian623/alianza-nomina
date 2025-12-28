<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Usuario ficticio
        $username = 'Elisa Gómez';
        $role = 'Administradora';

        return view('dashboard.index', compact('username', 'role'));
    }
}

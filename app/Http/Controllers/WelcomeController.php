<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function index()
    {
        return view('welcome');
    }
}

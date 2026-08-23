<?php

namespace App\Http\Controllers;

class MemorySkyController extends Controller
{
    public function __invoke()
    {
        return view('memory-sky');
    }
}
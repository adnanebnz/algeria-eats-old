<?php

namespace App\Http\Controllers;

class ConsumerController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
}

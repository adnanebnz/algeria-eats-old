<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardLayout extends AbstractLayout
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title = '')
    {

        parent::__construct($title);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.dashboard');
    }
}

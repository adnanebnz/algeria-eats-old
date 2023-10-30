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
    public function __construct(
        public string $title = '',
        public bool $isUser = true,
        public bool $isAdmin = false,
        public bool $isArtisan = false,
        public bool $isDeliver = false,
    ) {

        parent::__construct($title);
        parent::__construct($isUser);
        parent::__construct($isAdmin);
        parent::__construct($isArtisan);
        parent::__construct($isDeliver);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.dashboard');
    }
}

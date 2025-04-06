<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $dropdownItems = [
            'Organizations' => [
                'Administration' => '#administration',
                'Accounts' => '#accounts',
                'Stores' => '#stores',
                'Production' => '#production',
                'Mechnical' => '#mechanical',
                'Electrical' => '#electrical',
                'Instrumentation' => '#instrumentation',
                'Civil' => '#civil',
                'Laboratory' => '#laboratory',
                'Safety & Environment' => '#safety',
                'Fire' => '#fire'
            ],
            'Plants' => [
                'TBP' => '#tbp',
                'D2PHA' => '#d2pha',
                'VSPP' => '#vspp',
                'Boran' => '#boran',
                'B11' => '#b11',
                'B10' => '#b10',
                'IETP' => '#ietp',
                'TAPO' => '#tapo',
                'TOPO' => '#topo',
                'CC6' => '#cc6'
            ],
            'Products' => [
                'TBP' => '#product-tbp',
                'D2PHA' => '#product-d2pha',
                'B11' => '#product-b11',
                'B10' => '#product-b10',
                'TAPO' => '#product-tapo',
                'TOPO' => '#product-topo',
                'CC6' => '#product-cc6'
            ]
        ];

        return view('components.navbar',compact('dropdownItems'));
    }
}

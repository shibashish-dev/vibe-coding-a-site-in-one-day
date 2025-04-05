<?php

namespace App\View\Components;

use App\Models\Circular;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Circulars extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $circularLinks = Circular::latest()
            ->take(15)
            ->get()
            ->mapWithKeys(function ($circular) {
                $url = $circular->type === 'link'
                    ? $circular->link
                    : asset('storage/' . $circular->pdf_path);

                return [$circular->title => $url];
            });

        return view('components.circulars', compact('circularLinks'));
    }
}

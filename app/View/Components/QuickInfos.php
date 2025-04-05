<?php

namespace App\View\Components;

use App\Models\QuickInfo;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuickInfos extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $infoLinks = QuickInfo::latest()
            ->take(15)
            ->get()
            ->mapWithKeys(fn($info) => [
                $info->title => $info->link
            ]);

        return view('components.quick-info', compact('infoLinks'));
    }
}

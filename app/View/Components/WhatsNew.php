<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\View\Component;

class WhatsNew extends Component
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
        $news = new Collection([
            ['date' => '04 Mar 2025', 'title' => 'Ground Breaking Ceremony of Hydrogen Production Plant', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],
            ['date' => '21 Feb 2025', 'title' => 'Commemoration of Heavy Water Day 2025', 'gallery' => 'Media Gallery'],


            // ... (other entries)
        ]);

        // // Sort the news by date in descending order to get the latest first
        $news = $news->sortByDesc('date')->values();

        // Limit the collection to fetch only the latest 10 items
        $news = $news->take(10);
        return view('components.whats-new',compact('news'));
    }
}

<?php
namespace App\View\Components;

use App\Models\WhatsNew;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WhatsNews extends Component
{
    public function render(): View|Closure|string
    {
        $news = WhatsNew::latest('on_date')
            ->take(10)
            ->get()
            ->map(function ($item) {
                return [
                    'date' => \Carbon\Carbon::parse($item->on_date)->format('d M Y'),
                    'title' => $item->title,
                    'category' => $item->category,
                ];
            });

        return view('components.whats-new', compact('news'));
    }
}

<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
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
        $procurementRoute = auth('procurement')->check()
            ? route('procurement.dashboard')
            : route('procurement.login');

        $menuItems = [
            ['name' => 'Zimbra', 'href' => '#zimbra', 'icon' => 'fa-solid fa-envelope'],
            ['name' => 'e-Office', 'href' => '#e-office', 'icon' => 'fa-solid fa-building'],
            ['name' => 'Integrated Info System', 'href' => '#iis', 'icon' => 'fa-solid fa-network-wired'],
            ['name' => 'Attendance', 'href' => '#attendance', 'icon' => 'fa-solid fa-user-check'],
            ['name' => 'Procurement', 'href' => $procurementRoute, 'icon' => 'fa-solid fa-shopping-cart'],
            ['name' => 'Forms & Formats', 'href' => route('forms.view'), 'icon' => 'fa-solid fa-file-contract'],
            ['name' => 'VMS', 'href' => '#vms', 'icon' => 'fa-solid fa-shield-alt'],
            ['name' => 'HIMS', 'href' => '#hims', 'icon' => 'fa-solid fa-hospital'],
            ['name' => 'Photo Gallery', 'href' => route('gallery.view'), 'icon' => 'fa-solid fa-images'],
            ['name' => 'Canteen Info', 'href' => route('canteen.view'), 'icon' => 'fa-solid fa-utensils'],
            ['name' => 'Vehicle', 'href' => '#vehicle', 'icon' => 'fa-solid fa-car'],
        ];

        $links = [
            ['name' => 'Google', 'href' => 'https://www.google.com', 'icon' => 'fa-brands fa-google'],
            ['name' => 'HWB', 'href' => 'https://www.hwb.gov.in', 'icon' => 'fa-solid fa-atom'],
            ['name' => 'HWB Intranet', 'href' => '#hwb-intranet', 'icon' => 'fa-solid fa-network-wired'],
        ];
        return view('components.sidebar', compact('menuItems', 'links'));
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Circular;
use App\Models\QuickInfo;
use App\Models\WhatsNew;
use App\Models\FormPdf;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCirculars = Circular::count();
        $totalQuickInfos = QuickInfo::count();
        $totalWhatsNew = WhatsNew::count();
        $totalFormPdfs = FormPdf::count();

        $recentCirculars = Circular::latest()->take(3)->get();
        $quickLinks = QuickInfo::latest()->take(5)->get();

        $months = collect(range(0, 5))->map(function ($i) {
            return Carbon::now()->subMonths($i)->format('F Y');
        })->reverse()->values();

        $chartLabels = $months->all();

        $chartData = $months->map(function ($month) {
            $date = Carbon::parse($month);
            return FormPdf::whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year)
                ->count();
        })->values()->all();


        return view('dashboard', compact(
            'totalCirculars',
            'totalQuickInfos',
            'totalWhatsNew',
            'totalFormPdfs',
            'recentCirculars',
            'quickLinks',
            'chartLabels',
            'chartData'
        ));
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Session;

class StartProcurementSession extends StartSession
{
    protected function getSessionName()
    {
        return 'procurement_session';
    }

    protected function getSessionLifetime()
    {
        return config('session.lifetime');
    }
}
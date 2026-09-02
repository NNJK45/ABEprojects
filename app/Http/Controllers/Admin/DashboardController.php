<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\Evenement;
use App\Models\Programme;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.home', [
            'programmeCount' => Programme::query()->count(),
            'evenementCount' => Evenement::query()->count(),
            'actualiteCount' => Actualite::query()->count(),
        ]);
    }
}

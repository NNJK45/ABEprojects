<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\Evenement;
use App\Models\Image;
use App\Models\Message;
use App\Models\Programme;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.home', [
            'programmeCount' => Programme::query()->count(),
            'evenementCount' => Evenement::query()->count(),
            'actualiteCount' => Actualite::query()->count(),
            'imageCount' => Image::query()->count(),
            'messageCount' => Message::query()->count(),
            'userCount' => User::query()->count(),
        ]);
    }
}

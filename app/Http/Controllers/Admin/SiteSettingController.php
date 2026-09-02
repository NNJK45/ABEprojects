<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteSettingRequest;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function edit(): View
    {
        $setting = SiteSetting::query()->firstOrCreate([], ['site_name' => 'ABE']);
        $this->authorize('view', $setting);

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(SiteSettingRequest $request): RedirectResponse
    {
        $setting = SiteSetting::query()->firstOrCreate([], ['site_name' => 'ABE']);
        $this->authorize('update', $setting);
        $setting->update($request->validated());

        return to_route('admin.settings.edit')->with('success', 'Paramètres mis à jour.');
    }
}

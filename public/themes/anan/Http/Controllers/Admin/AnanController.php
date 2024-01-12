<?php

namespace Themes\Anan\Http\Controllers\Admin;

use Modules\Admin\Ui\Facades\TabManager;
use Themes\Anan\Http\Requests\SaveAnanRequest;

class AnanController
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = setting()->all();
        $tabs = TabManager::get('anan');

        return view('admin.anan.edit', compact('settings', 'tabs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SaveAnanRequest $request)
    {
        setting($request->except('_token', '_method'));

        return back()->withSuccess(trans('admin::messages.resource_saved', ['resource' => trans('setting::settings.settings')]));
    }
}

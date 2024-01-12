<?php

namespace Modules\Group\Http\Controllers;

use Illuminate\Routing\Controller;

class GroupController extends Controller {

    public function index() {
        return view('public.blog.index');
    }

    public function show() {
        return view('public.blog.show');
    }

}
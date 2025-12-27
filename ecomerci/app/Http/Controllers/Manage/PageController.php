<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manage\Attribute\StoreAttributeRequest;
use App\Http\Requests\Manage\Attribute\UpdateAttributeRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('manage.page.dashboard');
    }
}

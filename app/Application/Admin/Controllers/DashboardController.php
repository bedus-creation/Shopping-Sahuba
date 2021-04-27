<?php

namespace App\Application\Admin\Controllers;

use App\Http\Controllers\Controller;

/**
 * Class AdminController
 *
 * @package App\Application\Admin\Controllers
 */
class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }
}

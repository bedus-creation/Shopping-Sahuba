<?php

namespace App\Application\Admin\Controllers;

use App\Core\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    public function __invoke()
    {
        $data = DB::table('jobs')->get();

        return view('utils.jobs.index', compact('data'));
    }
}

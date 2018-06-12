<?php

namespace App\Http\Controllers\Utils;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Controller;

class CommandController extends Controller
{
    public static function Command(Request $request, $command)
    {
        $commands=explode(" ", $command);
        $command="";
        $option=array();
        foreach ($commands as $key => $value) {
            if ($key==0) {
                $command=$value;
            } else {
                $option[]=	$value;
            }
        }
        try {
            $exitCode = Artisan::call($command);
            echo Artisan::output();
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}

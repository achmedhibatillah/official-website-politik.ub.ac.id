<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LogicController extends Controller
{
    public function d()
    {
        Session::flush();
        return redirect()->back();
    }

    public function generateUniqueId($table, $column, $length = 8) {
        do {
            $randomId = random_int(pow(10, $length - 1), pow(10, $length) - 1);
        } while (DB::table($table)->where($column, $randomId)->exists());
    
        return $randomId;
    }
}
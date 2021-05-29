<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;

class MatchController extends Controller
{
    //
    public function index () {
        $data = Matches::all();
        return response(json_encode($data));
    }
}

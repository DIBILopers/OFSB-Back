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

    public function generate (Request $request) {
        $pass_temp = 'kibs';
        if ($request->password == $pass_temp) {
            $data = [];
            for ($i=1; $i <= $request->number_of_matches; $i++) { 
                array_push($data, [
                    'meron_odd' => '100',
                    'wala_odd' =>  '100',
                    'winner' => 'TBA',
                    'match_number' => $i, 
                    'meron_total' => 0,
                    'wala_total' => 0,
                    'total_bet' => 0
                ]);
            }
            $res = Matches::insert($data);
        } else {
            $res = ['Invalid Password Tanga!'];
            // $res = [$request->password];
        }
        

        return response(json_encode($res));

    }

    public function thanosx2 () {
        Matches::truncate();
    }
}

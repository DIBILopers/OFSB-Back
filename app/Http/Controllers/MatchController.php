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
                    'total_bet' => 0,
                    'is_current_match' => $i == 1 ? true : false
                ]);
            }
            $res = Matches::insert($data);
        } else {
            $res = ['Invalid Password!'];
            // $res = [$request->password];
        }
        

        return response(json_encode($res));

    }

    public function get_current () {
        $data = Matches::where('is_current_match', true)->first();
        return response(json_encode($data));
    }

    public function next_match (Request $request) {
        $curent_id = $request->current_id;
        $current_match = $request->current_match;
    }

    public function edit_odd (Request $request, $id) {
        $data = Matches::find($id);
        print_r($request->all());
        if (!is_null($data)) {
            $data->meron_odd = $request->meron_odd;
            $data->wala_odd = $request->wala_odd;
            $data-save();
            $res = $data->save();
        } else {
            $res = ['Error!'];
        }
        return response(json_encode($res));
    }

    public function thanosx2 () {
        Matches::truncate();
    }
}

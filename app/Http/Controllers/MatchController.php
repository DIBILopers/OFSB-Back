<?php

namespace App\Http\Controllers;
use App\Models\Matches;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    //
    public function index () {
        $data = Matches::orderBy('match_number')->get();
        return response(json_encode($data));
    }

    public function generate (Request $request) {
        $pass_temp = 'sabong';
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
                    'is_current_match' => $i == 1 ? true : false,
                    'is_displayed' => false
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
    public function get_recent () {
        $data = Matches::where('winner', '!=', 'TBA')->orderBy('match_number', 'desc')->get();
        return response(json_encode($data));
    }

    public function next_match (Request $request, $id) {
        $data = Matches::findOrFail($id);
        if ( !is_null($data) ) {
          $data->winner = $request->winner;
          $data->is_current_match = false;
          $data->is_displayed = true;
          $data->save();
          if( $data->save() ) {
             $new_match = Matches::where('match_number', ++$request->current_match_number)->firstOrFail();
             if ( !is_null($new_match) ) {
                 $new_match->is_current_match = true;
                 $new_match->save();
                 $res = ['naka new', $new_match];
             } else {
                 $res = ['NO MORE MATCHES'];
             }
          } else {
              $res = ['ERROR!'];
          }
        }
        return response(json_encode($res));
    }

    public function is_displayed ($id) {
        $data = Matches::findOrFail($id);
        $data->is_displayed = false;
        $data->save();
    }

    public function edit_odd (Request $request, $id) {
        $data = Matches::findOrFail($id);
        
        if (!is_null($data)) {
            $data->meron_odd = $request->meron_odd;
            $data->wala_odd = $request->wala_odd;
            $data->save();
            $res = $data->save() == true ? $data : ['Error!'];
        } else {
            $res = ['Error!'];
        }
        return response(json_encode($res));
    }

    public function add_bet (Request $request, $id) {
        $data = Matches::findOrFail($id);
        
        if (!is_null($data)) {
            if ($request->bet_side == 'MERON') {
                $data->meron_total = ++$data->meron_total;
                $data->total_bet = $data->total_bet + $request->bet_amount;
            } else if ($request->bet_side == 'WALA') {
                $data->wala_total = ++$data->wala_total;
                $data->total_bet = $data->total_bet + $request->bet_amount;
            }
            $res = $data->save() == true ? $data : ['Error!'];
        } else {
            $res = ['Error!'];
        }
        return response(json_encode($res));
    }

    public function thanosx2 () {
        Matches::truncate();
    }
}

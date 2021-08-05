<?php

namespace App\Http\Controllers;
use App\Models\Bets;
use Illuminate\Http\Request;

class BetController extends Controller
{
    //
    public function index () {
        $data = Bets::orderBy('match_number')->get();
        return response(json_encode($data));
    }

    public function add (Request $request) {
        $bet = new Bets;

        $bet->ticket_number = $request->input('ticket_number');;
        $bet->match_number = $request->input('match_number');
        $bet->match_winner =  'TBA';
        $bet->bet_side = $request->input('bet_side');
        $bet->match_odd = $request->input('match_odd');
        $bet->bet_amount = $request->input('bet_amount');
        $bet->bet_prize = $request->input('bet_prize');
        $bet->total_payout = $request->input('total_payout');
        $bet->status = 'Unclaimed';
        $bet->cashier_id = $request->input('cashier_id');
      
        if( $bet->save())
        {
            return response(json_encode($bet));
        }
    }
}

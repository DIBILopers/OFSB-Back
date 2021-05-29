<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Users;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    // protected $ofsb;

    // public function __construct() {
    //     $this->ofsb = DB::connection('ofsb');
    // }

    public function getuserdata () {
        // $data = DB::table('Users')->get();
        // return $data;
        $datas = Users::all();
        return $datas;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class ClockController extends Model
{
    public function getClock(){
        $data = json_decode(Http::get('http://localhost:3000/api/clocked'), true);
        $clockedData = $data['clockedExample'];
        return view('clockin.pointage', ['data' => $data]);
    }


}

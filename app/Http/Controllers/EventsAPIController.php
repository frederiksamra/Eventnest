<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventsAPIController extends Controller
{
    public function apievent(){
        $events = Event::orderby('id','desc')->get();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditampilkan',
            'data' => $events
        ], 200);
        
    }
}

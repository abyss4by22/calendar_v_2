<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("admin.dashboard");
    }

    public function event_create_form(){
        return view("admin.event.create");
    }

//create event
    public function event_store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_start_date' => 'required|date',
            'event_start_time' => 'required|date_format:H:i',
            'event_end_date' => 'required|date',
            'event_end_time' => 'required|date_format:H:i',
        ]);
    
        Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'event_start_date' => $request->input('event_start_date'),
            'event_start_time' => $request->input('event_start_time'),
            'event_end_date' => $request->input('event_end_date'),
            'event_end_time' => $request->input('event_end_time'),
        ]);
    
        return redirect()->route("admin.index");
    }

    }


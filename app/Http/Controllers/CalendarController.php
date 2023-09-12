<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $evenements = array();
        $events = Event::all();
        
        foreach ($events as $event) {
            // Format start and end times
            $startTime = Carbon::parse($event->event_start_time)->format('H:i:s'); // Adjust the format as needed
            $endTime = Carbon::parse($event->event_end_time)->format('H:i:s'); // Adjust the format as needed
            
            // Combine start date and formatted start time
            $startDateTime = Carbon::parse($event->event_start_date . ' ' . $startTime)->toIso8601String();
            
            // Combine end date and formatted end time
            $endDateTime = Carbon::parse($event->event_end_date . ' ' . $endTime)->toIso8601String();
            
            // Create an event array with formatted date and time
            $formattedEvent = [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $startDateTime,
                'end' => $endDateTime,
                "description"=>$event->description,
            ];
            
            $evenements[] = $formattedEvent; // Append the formatted event to the $evenements array
        }
        
        return view("calendar", compact('evenements'));
    }
    //delete events 
    public function destroy($id)
    {
        $event = Event::find($id);

        if ($event) {
            $event->delete();
            return $id;
        } else {
            return redirect()->back()->with('error', 'Event not found');
        }
    }
}

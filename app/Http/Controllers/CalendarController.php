<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;

class CalendarController extends Controller
{

    public function index(Request $request)
    {

        $events = Event::get(null, null, [], $request->id);

        $data = [
            'events' => $events,
        ];

        return view('calendar.index')->with($data);
    }

    public function rss(Request $request)
    {

        $meta = [
            'title' => 'Kalender för '.$request->id,
            'link' => \Request::getRequestUri(),
            'description' => 'Kalender för '.$request->id,
            'language' => 'sv-se',
            'updated' => date(\DateTime::RSS),
        ];

        $maxDays=isset($request->maxDays)?$request->maxDays:7;
        $maxEvents=isset($request->maxEvents)?$request->maxEvents:7;

        $from = Carbon::now();
        $to = Carbon::now()->addDays($maxDays);

        $events = Event::get($from, $to, [], $request->id);

        $items = [];
        $numberOfEvents=0;
        foreach($events as $event)
        {
            if(isset($request->filter) && strpos($event->description, $request->filter) === false) {
                continue;
            }
            $item = [
                'title' => $event->name,
                'link' => $event->htmlLink,
                'summary' => $event->description,
                'author' => $event->creator->email,
                'id' => $event->id,
                'updated' => $event->startDateTime,
                
            ];
            array_push($items, $item);
            $numberOfEvents++;
            if($numberOfEvents >= $maxEvents) {
                break;
            }
        }

        $data = [
            'events' => $events,
            'meta' => $meta,
            'items' => $items,
        ];

        $contents = view('calendar.rss')->with($data);
        return response($contents)->header('Content-Type', 'application/xml');
    }
}

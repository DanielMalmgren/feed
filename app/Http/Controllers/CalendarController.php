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
        date_default_timezone_set('Europe/Stockholm');
        setlocale(LC_ALL, 'sv');
        \App::setLocale('sv');

        logger(\Request::getRequestUri());

        $meta = [
            'title' => 'Kalender för '.$request->id,
            'link' => \Request::getRequestUri(),
            'description' => 'Kalender för '.$request->id,
            'language' => 'sv-se',
            'updated' => date(\DateTime::RSS),
        ];

        $maxDays=isset($request->maxDays)?$request->maxDays:365;
        $maxEvents=isset($request->maxEvents)?$request->maxEvents:100;

        switch($request->period) {
            case 'today':
                $from = Carbon::parse('today');
                $to = Carbon::parse('tomorrow');
                break;
            case 'rest_of_today':
                $from = Carbon::now();
                $to = Carbon::parse('tomorrow');
                break;
            case 'this_week':
                $from = Carbon::parse('last monday');
                $to = Carbon::parse('next monday');
                break;
            case 'rest_of_this_week':
                $from = Carbon::now();
                $to = Carbon::parse('next monday');
                break;
            case 'tomorrow':
                $from = Carbon::parse('tomorrow');
                $to = Carbon::parse('tomorrow')->addDays(1);
                break;
            case 'next_week':
                $from = Carbon::parse('next monday');
                $to = Carbon::parse('next monday')->addDays(7);
                break;
            default:
                $from = Carbon::now();
                $to = Carbon::now()->addDays($maxDays);
        }
        logger('Period: '.$request->period);
        logger('From: '.$from);
        logger('To: '.$to);

        if(isset($request->id)) {
            try {
                $events = Event::get($from, $to, ['orderBy' => 'startTime', 'q' => $request->filter], $request->id);
            } catch(\Google\Service\Exception $e) {
                $meta['title'] = 'Calendar not found. Insufficient permissions?';
                $events = [];
            }
        } else {
            $meta['title'] = 'Calendar ID missing!';
            $events = [];
        }

        $items = [];
        $numberOfEvents=0;
        foreach($events as $event)
        {
            if($event->startDateTime!==null) {
                $pubDate=$event->startDateTime->toRssString();
                $description=$event->startDateTime->translatedFormat('l j F H:i').' - '.$event->endDateTime->locale('sv')->translatedFormat('H:i');
            } else {
                $pubDate=$event->startDate->toRssString();
                $description=$event->startDate->translatedFormat('l j F');
            }

            $item = [
                'title' => $event->name,
                'link' => $event->htmlLink,
                'description' => $description,
                'author' => $event->creator->email,
                'id' => $event->id,
                'pubDate' => $pubDate,
            ];
            array_push($items, $item);
            $numberOfEvents++;
            if($numberOfEvents >= $maxEvents) {
                break;
            }
        }

        logger("Genererar RSS med ".$numberOfEvents." kalenderhändelser");

        $data = [
            'events' => $events,
            'meta' => $meta,
            'items' => $items,
        ];

        $contents = view('calendar.rss')->with($data);
        return response($contents)->header('Content-Type', 'application/xml');
    }
}

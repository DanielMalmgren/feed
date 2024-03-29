<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LdapRecord\Models\ActiveDirectory\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function rss(Request $request)
    {
        date_default_timezone_set('Europe/Stockholm');
        setlocale(LC_ALL, 'sv');
        \App::setLocale('sv');

        $arguments = explode("?", $request->getRequestUri())[1];
        $argumentsWithoutHash = substr($arguments, 0, strpos($arguments, '&hash'));
        $md5_hash = md5(env('MD5_SALT').$argumentsWithoutHash);

        if ($request->hash != $md5_hash) {
            logger("Wrong hash! Expected ".$md5_hash." but got ".$request->hash);
            abort(403);
        } 

        $maxDays=isset($request->maxDays)?$request->maxDays:365;
        $maxUsers=isset($request->maxUsers)?$request->maxUsers:100;

        $meta = [
            'title' => 'Nya användare i '.$request->organization,
            'link' => \Request::getRequestUri(),
            'description' => 'Personer anställda de senaste '.$maxDays.' dagarna i '.$request->organization,
            'language' => 'sv-se',
            'updated' => date(\DateTime::RSS),
        ];

        $from = (new \DateTime($maxDays.' days ago'))->format('YmdHis.0\Z');
        $to = (new \DateTime('tomorrow'))->format('YmdHis.0\Z');

        $users = User::where('company', '=', $request->organization)->whereBetween('whencreated', [$from, $to])->limit($maxUsers)->get();

        $items = [];
        $numberOfUsers=0;
        foreach($users as $user)
        {
            $carbon = new Carbon($user->whencreated, 'Europe/Stockholm');

            $item = [
                'title' => $user->displayname[0],
                'link' => 'https://www.'.$request->organization.'.se',
                'description' => $user->name[0],
                'author' => isset($user->mail)?$user->mail[0]:'',
                'id' => $user->getConvertedGuid(),
                'pubDate' => $carbon->toRssString(),
                //'pubDate' => $user->whencreated,
            ];
            array_push($items, $item);
            $numberOfUsers++;
            if($numberOfUsers >= $maxUsers) {
                break;
            }
        }

        logger("Genererar RSS med ".$numberOfUsers." användare");

        $data = [
            'meta' => $meta,
            'items' => $items,
        ];

        $contents = view('calendar.rss')->with($data);
        return response($contents)->header('Content-Type', 'application/rss+xml');
    }
}

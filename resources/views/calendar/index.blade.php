@extends('layouts.app')

@section('content')

    @foreach($events as $event)
        {{$event->name}} ({{$event->startDateTime}} - {{$event->endDateTime}})<br>
    @endforeach

@endsection

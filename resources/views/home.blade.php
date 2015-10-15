@extends('layouts.master')

@section('title')
    Joe's Toolkit
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

@stop



@section('content')
<p><a class="" href="{{ action("LoremController@getIndex") }}">Lorem-Ipsum Generator</a></p>
<p><a class="" href="{{ action("UserController@getIndex") }}">User Profile Generator</a></p>
<p><a class="" href="{{ action("PasswordController@getIndex") }}">XKCD Password Generator</a></p>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop

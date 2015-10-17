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
<br>
<p><a class="toollink" href="{{ action("LoremController@getIndex") }}">Lorem-Ipsum Generator
<img class="screenshot" src="images/li.jpg" width="360" height="120">
</a></p>
<p class="desc">The Lorem-Ipsum generator allows you to easily generate a requested number of words, sentences
  or paragraphs to use as seed data.  Specify a quantity and whether you want word, sentences or paragraphs, and the
  utility will generate the requested output.</p>
<hr>
<p><a class="toollink" href="{{ action("UserController@getIndex") }}">User Profile Generator
<img class="screenshot" src="images/user.jpg" width="360" height="120">
</a></p>
<p class="desc">The User Profile Generator easily generates sample user profiles.  Specify how many you want,
  and optionally include an address, a date of birth and/or a lorem-ipsum profile paragraph,
  and the utility will generate the requested output.</p>
<hr>
<p><a class="toollink" href="{{ action("PasswordController@getIndex") }}">XKCD Password Generator
<img class="screenshot" src="images/pw.jpg" width="360" height="150">
</a></p>
<p class="desc">The XKCD Password Generator allows the user to generate up to 10 random passwords.  The user can select
  how many passwords they want, a categoy for the words, the number of words in each password, what separator to use
  between words (hyphen, space or CamelCase), and whether to include random digits and/or special characters.</p>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop

@extends('layouts.master')

@section('title')
    Joe's Toolkit - User Profile Generator
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

@stop

@section('content')
<form method="POST" action="{{URL::to('/user')}}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <fieldset>
    <div class='pwform'>
    <p class="legend">User Profile Generator Options:</p>
      <div class='field'>
        <label for='users'>How Many Users:</label>
        <?php
          $value = Request::input('users', '10');
        ?>
        <input type="number" name="users" min="1" max="99" value="<?php echo $value; ?>">
      </div>
      <label for='address'>Additional Items:</label>
      <?php
        $checked = '';
        if(null !== Request::input('address')) {
          $checked = 'checked';
        }
      ?>
      <input type="checkbox" name="address" id="address" value="address" <?php echo $checked; ?>> Include an Address<br>
      <label for='dob'></label>
      <?php
        $checked = '';
        if(null !== Request::input('dob')) {
          $checked = 'checked';
        }
      ?>
      <input type="checkbox" name="dob" id="dob" value="dob" <?php echo $checked; ?>> Include a Birthdate<br>
      <label for='profile'></label>
      <?php
        $checked = '';
        if(null !== Request::input('profile')) {
          $checked = 'checked';
        }
      ?>
      <input type="checkbox" name="profile" id="profile" value="profile" <?php echo $checked; ?>> Include a Dummy Profile<br>
      <br><br><label for="submit">&nbsp;</label>
      <button type="submit" id="submit" class="btn btn-primary">Generate the Profiles</button>
    </div>

  </fieldset>
</form>
<br><div><a class="home" href="{{URL::to('/')}}">Back to Toolkit Home</a></div>

  <div class="passwords">
    @if (isset($users))
      <br>
      <form class="pwform">
      <p class='legend'>Here are your users:</p>
      @foreach ($users as $user)

          <span class='outputlabel'>Name: </span>{{ $user[0] }}
        <br>
        @if(isset($_POST["address"]))

            <span class='outputlabel'>Address: </span>{{ $user[1] }}
          <br>
        @endif
        @if(isset($_POST["dob"]))

            <span class='outputlabel'>Date of Birth: </span>{{ $user[2] }}
          <br>
        @endif
        @if(isset($_POST["profile"]))

            <span class='outputlabel'>Profile: </span>{{ $user[3] }}
          <br>
        @endif
        <hr>
      @endforeach
      </form>
    @endif
  </div>
<br><br>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop

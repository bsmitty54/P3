@extends('layouts.master')

@section('title')
    Joe's Toolkit - Lorem-Ipsum Generator
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

@stop



@section('content')
<form method='GET' action='index.php'>
  <fieldset>
    <div class='pwform'>
    <p class="legend">Password Generator Options:</p>
    <div class='field'>
        <label for='words'>How Many Words:</label>
        <select id='words' name='words'>
          <option selected='selected' value='2'>2</option>
          <option value='3'>3</option>
          <option value='4'>4</option>
          <option value='5'>5</option>
          <option value='6'>6</option>
          <option value='7'>7</option>
          <option value='8'>8</option>
          <option value='9'>9</option>
        </select>
      </div>
      <div class='field'>
          <label for='wordcat'>Word Category:</label>
          <select id='wordcat' name='wordcat'>
            <option selected='selected' value='Random'>Random</option>
            <option value='Animals'>Animals</option>
            <option value='Things'>Things</option>
            <option value='Verbs'>Verbs</option>
            <option value='Colors'>Colors</option>
          </select>
        </div>
        <div class='field'>
            <label for='schar'>How Many Special Characters:</label>
            <select id='schar' name='schar'>
              <option selected='selected' value='0'>0</option>
              <option value='1'>1</option>
              <option value='2'>2</option>
              <option value='3'>3</option>
              <option value='4'>4</option>
              <option value='5'>5</option>
            </select>
            <?php
              if(isset($_GET["words"]) && (int) $_GET["schar"] > (int) $_GET["words"] ) {
                echo "<span>&nbsp;You can't have more special characters than words</span>";
              }
            ?>
          </div>
          <div class='field'>
              <label for='digits'>How Many Digits:</label>
              <select id='digits' name='digits'>
                <option selected='selected' value='0'>0</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
              </select>
              <?php
                if(isset($_GET["words"]) && (int) $_GET["digits"] > (int) $_GET["words"] ) {
                  echo "<span>&nbsp;You can't have more digits than words</span>";
                }
              ?>
          </div>
          <br>
          <label>Separator:</label>
          <input type="radio" name="separator" id="Hyphen" value="Hyphen" checked> Hyphen
          <input type="radio" name="separator" id="Space" value="Space"> Space
          <input type="radio" name="separator" id="CamelCase" value="CamelCase"> CamelCase
          <div class='field'>
              <label for='pwcnt'>How Many Passwords:</label>
              <select id='pwcnt' name='pwcnt'>
                <option selected='selected' value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
                <option value='6'>6</option>
                <option value='7'>7</option>
                <option value='8'>8</option>
                <option value='9'>9</option>
                <option value='10'>10</option>
              </select>
          </div>

          <br><br><label for="submit">&nbsp;</label>
          <button type="submit" id="submit" class="btn btn-primary">Generate the Passwords</button>
    </div>

  </fieldset>
</form>
<br><br>
<p><a class="" href="{{URL::to('/')}}">Back to Toolkit Home</a></p>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop

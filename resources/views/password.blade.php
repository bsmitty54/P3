@extends('layouts.master')

@section('title')
    Joe's Toolkit - XKCD Password Generator
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')


@stop

<?php
  if(null !== Request::input('wordcat')) {
      echo '<body onload="setDropDowns()">';
    } else {
      echo '<body>';
    }
  $words = Request::input('words', '1');
  $wordcat = Request::input('wordcat', 'Random');
  $schar = Request::input('schar', '0');
  $digits = Request::input('digits', '0');
  $separator = Request::input('separator', 'Hyphen');
  $pwcnt = Request::input('pwcnt', '1');
?>

<script>

  function setDropDowns() {
      //Get select object
  var objSelect = document.getElementById("words");
  //Set selected
  setSelectedValue(objSelect, <?php echo $words; ?>);

  var objSelect = document.getElementById("wordcat");
  //Set selected
  setSelectedValue(objSelect, <?php echo "'" . $wordcat . "'"; ?>);

  var objSelect = document.getElementById("schar");
  //Set selected
  setSelectedValue(objSelect, <?php echo $schar; ?>);

  var objSelect = document.getElementById("digits");
  //Set selected
  setSelectedValue(objSelect, <?php echo $digits; ?>);

  var objSelect = document.getElementById("pwcnt");
  //Set selected
  setSelectedValue(objSelect, <?php echo $pwcnt; ?>);

    function setSelectedValue(selectObj, valueToSet) {
      for (var i = 0; i < selectObj.options.length; i++) {
          if (selectObj.options[i].text== valueToSet) {
              selectObj.options[i].selected = true;
              return;
          }
      }
  }
    //alert("Executed");
  };

</script>

@section('content')
<form method="POST" action="{{URL::to('/password')}}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
              if(null !== Request::input('words') && (int) Request::input('schar') > (int) Request::input('words') ) {
                echo "<span class='errormsg'>&nbsp;You can't have more special characters than words</span>";
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
                if(null !== Request::input('words') && (int) Request::input('digits') > (int) Request::input('words') ) {
                  echo "<span class='errormsg'>&nbsp;You can't have more digits than words</span>";
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
<div><a class="home" href="{{URL::to('/')}}">Back to Toolkit Home</a></div>

  <div class="passwords">
    <?php
      if(null !== Request::input('words')) {
        if ((int) Request::input('words') >= (int) Request::input('schar') && (int) Request::input('words') >= (int) Request::input('digits')) {
          echo "<br>";
          echo '<form class="pwform">';
          echo "<p class='legend'>Here are your passwords:</p>";
          //echo "<pre>";
          //print_r($_POST);
          //print_r($wordlist);
          //print_r($pw);
          //echo "</pre>";
          foreach($pw as $pword)
          echo '<div class="pword">' . $pword . '</div>';
          echo "<br>";
          echo "</form>";
          echo "<br><br>";
        }
      }
      ?>

  </div>
<br><br>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
<script>
document.getElementById(<?php echo "'" . $separator . "'"; ?>).checked = true;
</script>
@stop

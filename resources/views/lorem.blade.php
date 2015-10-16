@extends('layouts.master')

@section('title')
    Joe's Toolkit - Lorem Ipsum Generator
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

@stop

<?php
  if(isset($_POST["litype"])) {
    $litype = $_POST["litype"];
  } else {
    $litype = "paragraphs";
  }
?>

@section('content')
<form method="POST" action="{{URL::to('/lorem')}}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <fieldset>
    <div class='pwform'>
    <p class="legend">Lorem Ipsum Generator Options:</p>
      <div class='field'>
        <label for='num'>How Many:</label>
        <?php
          $value = '10';
          if(isset($_POST["num"])) {
            $value = $_POST["num"];
          }
        ?>
        <input type="number" name="num" min="1" max="99" value="<?php echo $value; ?>">
      </div>
      <label for='litype'>Choose One:</label>
      <input type="radio" name="litype" id="paragraphs" value="paragraphs"> Paragraphs
      <input type="radio" name="litype" id="sentences" value="sentences"> Sentences
      <input type="radio" name="litype" id="words" value="words"> Words

      <br><br><label for="submit">&nbsp;</label>
      <button type="submit" id="submit" class="btn btn-primary">Generate the Text</button>
    </div>

  </fieldset>
</form>
<br><div><a class="home" href="{{URL::to('/')}}">Back to Toolkit Home</a></div>

  <div class="passwords">
    @if (isset($paragraphs))
      <br>
      <form class="pwform">
      <p class='legend'>Here is your text:</p>
      @foreach ($paragraphs as $paragraph)

          {{ $paragraph }}

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
<script>
document.getElementById(<?php echo "'" . $litype . "'"; ?>).checked = true;
</script>
@stop

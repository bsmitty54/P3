<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Foobooks' --}}
        @yield('title','Joes Toolbox')
    </title>

    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
    <link href="/includes/css/jmscss.css" type='text/css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/bootstrap/dist/js/bootstrap.min.js"></script>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>
  <div id="wrapper" class="container-fluid">

    <div id="header" class="row">
      <div id="topHeader" class="">

      	<div class="transbox">
      		@yield('title','Joes Toolbox')
        </div>

      </div>
    </div>
    <div id="maincontent" class="row">

        <div id="leftgutter" class="col-sm-3">
          <h2>Menu</h2>
            <ul class="nav nav-stacked">

              <li><a class="" href="http://p1.jsmitty54php.com">Project One - View</a></li>
              <li><a class="" href="https://github.com/bsmitty54/P1">Project One - Github</a></li>
              <li><a class="" href="http://p2.jsmitty54php.com">Project Two - View</a></li>
              <li><a class="" href="https://github.com/bsmitty54/P2">Project Two - Github</a></li>
              <li><a class="" href="">Project Three - View</a></li>
              <li><a class="" href="">Project Three - Github</a></li>
              <li><a class="" href="">Project Four - View</a></li>
              <li><a class="" href="">Project Four - Github</a></li>
              <li><a class="" href="http://www.jsmitty54cf.com/mywebsite">My ColdFusion Project</a></li>
              <li><a class="" href="http://www.jsmitty54.com/wp">My Wordpress Project</a></li>
              <li><a class="" href="http://www.jsmitty54.com/drup">My Drupal Project</a></li>
              <li><a class="" href="http://www.jsmitty54.com">My Joomla Project</a></li>


            </ul>
        </div>


        <div id="center" class="col-sm-9">
          {{-- Main page content will be yielded here --}}
          @yield('content')
        </div>

      </div>

      <div id="footer" class="row">
        Dynamic Web Applications&nbsp;*&nbsp;Fall 2015&nbsp;*&nbsp;Instructor: Susan Buck&nbsp;*&nbsp;Author / Student: Joe Smith
      </div>




    </div>
  {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
  @yield('body')

</body>
</html>

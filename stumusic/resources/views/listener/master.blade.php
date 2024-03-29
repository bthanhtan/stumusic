<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('user/listener/main.css')}}">

    <title>STU Music</title>
  </head>
  <body>
    <!-- menu top -->
    <div class="container">
      <div class="row">
        <div class="col-12">

          <div class="topnav" id="myTopnav">
            <a href="#home" class="active">Home</a>
            <a href="#news">Top</a>
            <a href="#contact">MV</a>
            <a href="#about">Nghệ sỹ</a>
            <a href="#about">My list</a>
            <a href="#" class="icon" onclick="myFunction()">
              <i class="fa fa-bars"></i>
            </a>
          </div>

      </div>
    </div>
    <!-- end menu top -->
    <!-- jumbotron -->
    <div class="container">
      <div class="jumbotron">
        <h1>Bootstrap Tutorial</h1>
        <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing
        responsive, mobile-first projects on the web.</p>
    </div>
    </div>
    <!-- end jumbotron -->
    <!-- main content -->
    <div class="container">
      <div class="row">
        <div class="col-12">@yield('main_content')</div>
      </div>
    </div>
    <!-- end main content -->
    <!-- footer -->
    <div class="container">
      <div class="row">
        <div class="col-12">@yield('footer')</div>
      </div>
    </div>
    <!-- end footer -->
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{url('user/listener/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
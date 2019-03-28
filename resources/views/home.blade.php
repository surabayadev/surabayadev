<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="shortcut icon" href="{{ asset('img/logo/logo.png') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('img/logo/logo.png') }}" type="image/x-icon">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <!-- Bootstrap JS -->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>

  <!-- Bootstrap CSS -->
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/hover.css') }}">

  <!-- Animation -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">

  <!-- Scrolling Animation -->
  <script src="{{ asset('js/wow.min.js') }}"></script>
  <script type="text/javascript">
    new WOW().init();
  </script>

  <script>
    $(function() {
      // $('a[href*=#]:not([href=#])').click(function() {
      //   if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

      //     var target = $(this.hash);
      //     target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      //     if (target.length) {
      //       $('html,body').animate({
      //         scrollTop: target.offset().top
      //       }, 1000);
      //       return false;
      //     }
      //   }
      // });
    });
  </script>
  <title>Surabaya Dev</title>
</head>
<body id="mypage" data-spy="scroll" data-target=".navbar" data-offset="">
  <!-- navigasi -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#list">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#home"><img src="{{ asset('img/navbar/logo.png') }}" width="140"></a>
      </div>

      <nav class="collapse navbar-collapse" id="list">
        <ul class="nav navbar-nav navbar-right text">
          <li><a href="#home">Home</a></li>
          <li><a href="#event">Event</a></li>
          <li><a href="#galeri">Galeri</a></li>
          <li><a href="#blog">Blog</a></li>
          <li><a href="#katamereka">Kata Mereka</a></li>
          <li><a href="#partnership">Partnership</a></li>
        </ul>
      </nav>
    </div>
  </nav>

  <!-- Home -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="padding-top: 56px;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div id="home" class="carousel-inner">

      <div class="item active">
        <img src="{{ asset('img/slide/foto.jpg') }}" alt="Home View" style="width:100%; opacity:0.1;">
        <div class="carousel-caption">
          <h1 class="wow slideInLeft" style="color:black;padding-bottom:0px;margin-left:100px;margin-bottom:10px;margin-left:-5px;">#SurabayaDev</h1>
          <p class="w3-animate-bottom" style="font-size:19px;padding-bottom:100px;margin-left:0px;margin-bottom:-250px;margin-right:290px;text-align:left;color:black;">SurabayaDev adalah komunitas IT yang membantu meningkatkan dan memanfaatkan potensi pegiat IT di seluruh Indonesia khususnya di kota Surabaya dalam bidang Teknologi, guna mendukung, untuk mewujudkan suatu kondisi yang saling melengkapi dalam rangka peningkatan keahlian, dan semangat kerjasama.</p>
          <div class="">
            <img src="{{ asset('img/navbar/logo.png') }}" alt="" style="width:50%; margin-left:530px;margin-bottom:190px;">
          </div>
        </div>
      </div>

      <div class="item">
        <img src="{{ asset('img/slide/foto.jpg') }}" alt="" style="width:100%;">
        <div class="carousel-caption">
          <h2 class="wow slideInRight" style="padding-bottom:0px; margin-left:470px;margin-right:-200px; color:white;"><strong>Lorem Lorem Lorem Lorem</strong></h2>
          <h2 class="wow slideInLeft" style="padding-bottom:350px; margin-left:570px;margin-right:-200px; color:white;">Lorem Lorem Lorem Lorem</h2>
        </div>
      </div>

      <div class="item">
        <img src="{{ asset('img/slide/foto.jpg') }}" alt="" style="width:100%;">
        <div class="carousel-caption">
          <h2 class="wow slideInRight" style="padding-bottom:0px;margin-right: 430px;margin-left: -200px; color:white;"><strong>Lorem Lorem Lorem Lorem</strong></h2>
          <h2 class="wow slideInLeft" style="padding-bottom: 350px;margin-right: 330px;margin-left: -200px;color:white;">Lorem Lorem Lorem Lorem</h2>
        </div>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- Event -->
  <div id="event">
    <div class="container">
      <h1>Event</h1>
      <p>Seminar, workshop, gathering</p>
      <div class="row">
        <div class="col-md-4">
          <div class="thumbnail">
            <div class="caption">
              <p style="background-color:gray;color:white;width:120px;height:25px;padding-top:4px;text-align:center;opacity:0.7">21 July 2018</p>
            </div>
            <a href="#" target="_blank">
              <img src="{{ asset('img/event/event1.jpg') }}" alt="Lights" style="width:100%">
              <div class="caption">
                <h4 style="color:green">Android Training For Beginner</h4>
                <p>Gedung E2 (Fakultas Teknik, UNESA Ketintang)</p>
                <p>14:00 - 15:30 WIB</p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="thumbnail">
            <div class="caption">
              <p style="background-color:gray;color:white;width:120px;height:25px;padding-top:4px;text-align:center;opacity:0.7">21 Des 2018</p>
            </div>
            <a href="#" target="_blank">
              <img src="{{ asset('img/event/event2.jpg') }}" alt="Nature" style="width:100%">
              <div class="caption">
               <h4 style="color:green">The Ideal Design Workflow Applied</h4>
               <p>Stikom Surabaya</p>
               <p>14:00 - 15:30 WIB</p>
             </div>
           </a>
         </div>
       </div>
       <div class="col-md-4">
        <div class="thumbnail">
          <div class="caption">
            <p style="background-color:gray;color:white;width:120px;height:25px;padding-top:4px;text-align:center;opacity:0.7">21 July 2018</p>
          </div>
          <a href="#" target="_blank">
            <img src="{{ asset('img/event/event3.jpg') }}" alt="Fjords" style="width:100%">
            <div class="caption">
              <h4 style="color:green">Pengenalan Flutter</h4>
              <p>Untag Lantai 15</p>
              <p>14:00 - 15:30 WIB</p>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="thumbnail">
          <div class="caption">
            <p style="background-color:gray;color:white;width:120px;height:25px;padding-top:4px;text-align:center;opacity:0.7">21 July 2018</p>
          </div>
          <a href="#" target="_blank">
            <img src="{{ asset('img/event/event1.jpg') }}" alt="Lights" style="width:100%">
            <div class="caption">
              <h4 style="color:green">Android Training For Beginner</h4>
              <p>Gedung E2 (Fakultas Teknik, UNESA Ketintang)</p>
              <p>14:00 - 15:30 WIB</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="thumbnail">
          <div class="caption">
            <p style="background-color:gray;color:white;width:120px;height:25px;padding-top:4px;text-align:center;opacity:0.7">21 Des 2018</p>
          </div>
          <a href="#" target="_blank">
            <img src="{{ asset('img/event/event2.jpg') }}" alt="Nature" style="width:100%">
            <div class="caption">
             <h4 style="color:green">The Ideal Design Workflow Applied</h4>
             <p>Stikom Surabaya</p>
             <p>14:00 - 15:30 WIB</p>
           </div>
         </a>
       </div>
     </div>
     <div class="col-md-4">
      <div class="thumbnail">
        <div class="caption">
          <p style="background-color:gray;color:white;width:120px;height:25px;padding-top:4px;text-align:center;opacity:0.7">21 July 2018</p>
        </div>
        <a href="#" target="_blank">
          <img src="{{ asset('img/event/event3.jpg') }}" alt="Fjords" style="width:100%">
          <div class="caption">
            <h4 style="color:green">Pengenalan Flutter</h4>
            <p>Untag Lantai 15</p>
            <p>14:00 - 15:30 WIB</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
</div>

<div class="container">
  <div class="row">
    <button class="button" style="vertical-align:middle"><span>Lihat Event Lainnya</span></button>
  </div>
</div>

<div class="container">
  <div class="row">
    <h2>Telegram Group</h2>
    <p style="font-size:17px">Untuk sharing, membahas topik IT dan berbagi pengalaman</p>
    <button class="joint" style="vertical-align:middle"><span>Join Group</span></button>
    <img src="{{ asset('img/tele.png') }}" alt="" width="auto" height="auto" style="width:100%">
  </div>
</div>

<!-- Telegram Group -->
<!-- <div class="telegram">
  <div class="container">
    <div class="row">
      <h2>Telegram Group</h2>
      <p style="font-size:17px">Untuk sharing, membahas topik IT dan berbagi pengalaman</p>
      <button class="joint" style="vertical-align:middle"><span>Joint Group</span></button>
    </div>
  </div>
</div> -->

<!-- Galeri -->
<div id="galeri">
  <div class="container">
    <h1>GALERI</h1>
    <p>Dokumentasi setiap bulan</p>
    <div class="row">

      <?php foreach (range(1, 4) as $value): { ?>

            <div class="col-md-4">
              <div class="thumbnail">
                <a href="#" target="_blank">
                  <img src="{{ asset('img/galeri/'.$value) }}.jpg" alt="Lights" style="width:100%">
                </a>
              </div>
            </div>

        <?php } endforeach ?>
      <div class="col-md-4">
        <div class="thumbnail">
          <a href="#" target="_blank">
            <img src="{{ asset('img/galeri/3.jpg') }}" alt="Nature" style="width:100%">
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="thumbnail">
          <a href="#" target="_blank">
            <img src="{{ asset('img/galeri/4.jpg') }}" alt="Fjords" style="width:100%">
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Blog -->
<div id="blog">
  <div class="container">
    <h1 style="margin-left:51%; margin-top:50px; margin-bottom:50px;">POSTINGAN TERBARU</h1>
    <div class="row">
      <div class="col-md-6">
        <img src="{{ asset('img/galeri/4.jpg') }}" alt="4" style="width:80%;">
      </div>
      <div class="col-md-6">
        <ul class="list-group list-group-flush">

          <?php foreach (range(1, 4) as $value): { ?>
            <p>by Admin . 12 Agustus 2018</p>
            <li class=""><h4>Pengenalan Flutter Untuk Programmer Pemula</h4></li>
            <hr>
          <?php } endforeach ?>

        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Kata Mereka -->
<div id="katamereka" style="background-color:#f7f7f7; height:710px; margin-top:100px; padding-top:100px;">
  <div class="container-fluid bg-white" style="width:55%; margin-top:200px; height:320px">
    <div class="row">
      <h1 style="color:black; text-align:center;margin-top:-280px;padding-bottom:70px">APA KATA MEREKA</h1>
      <img src="{{ asset('img/burisma.png') }}" alt="burisma" style="width:28%; margin-left:240px;">
      <p style="color:black; text-align:center; margin-top:70px; font-size:20px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </div>
  </div>
</div>

<div id="partnership" class="bg-light" style="padding-top:30px; margin-top:50px; margin-bottom:120px">
  <div class="container text-center">
    <h1 style="margin-bottom:50px;">Terimkasih Atas Dukungan</h1>
    <br>
    <div class="row">
      <div class="col-xs-6 col-md-3">
        <a href="#">
          <img src="{{ asset('img/support/sponsor_niagahoster.png') }}" alt="Niaga Hoster" style="width: 100%;">
        </a>
      </div>
      <div class="col-xs-6 col-md-3">
        <a href="#">
          <img src="{{ asset('img/support/sponsor_dilo.png') }}" alt="dilo" style="width: 100%;">
        </a>
      </div>
      <div class="col-xs-6 col-md-3">
        <a href="#">
          <img src="{{ asset('img/support/sponsor_jetbrains.png') }}" alt="jetbrains" style="width: 100%;">
        </a>
      </div>
      <div class="col-xs-6 col-md-3">
        <a href="#">
          <img src="{{ asset('img/support/sponsor_indigo.png') }}" alt="indigo" style="width: 100%;">
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<div class="footer">
  <div class="container">
    <h5 style="text-align:center; padding-top:15px;">&copy; 2018 Powered By SurabayaDev</h5>
    <div class="pull-right">
      <a href="#"><img src="{{ asset('img/footer/wa.png') }}" alt="Whatsapp" width="25" height="25"></a>
      <a href="#"><img src="{{ asset('img/footer/fb.png') }}" alt="Facebook" width="25" height="25"></a>
      <a href="#"><img src="{{ asset('img/footer/ig.png') }}" alt="Instagram" width="25" height="25"></a>
      <a href="#"><img src="{{ asset('img/footer/twitter.png') }}" alt="Twitter" width="25" height="25"></a>
      <a href="#"><img src="{{ asset('img/footer/google.png') }}" alt="Google+" width="25" height="25"></a>
    </div>
  </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>
</html>
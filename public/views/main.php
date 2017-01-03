<?php
  require_once('../../include/auth.php');
?>

<!DOCTYPE html>
<html lang = 'sr' >

  <head>
    <title>Olgina prodavnica suvenira</title>
    <meta charset="utf-8">

    <link href = "../app/assets/css/bootstrap.css" rel = "stylesheet">
    <link href = "../app/assets/css/main.css" rel = "stylesheet">
  </head>

  <body ng-app="Store">
    <!--libraries -->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src = "../app/assets/js/bootstrap.js"></script>
    <script type = "text/javascript" src = "../app/assets/js/angular.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
    <script type = "text/javascript" src = "../app/app.js"></script>
    <!--- controllers -->
    <script type = "text/javascript" src = "../app/controllers/LoginController.js"></script>
    <script type = "text/javascript" src = "../app/controllers/routes.js"></script>

    <div class = 'wrapper'>
      <div class = 'nav navbar-default navbar-static-top'>

        <div class = 'container'>
          <div class = 'navbar-header'>
            <img src = '../app/assets/img/other/logo1.png' alt = 'logo' class = 'navbar-brand navbar-left' id = 'logo' style = "width: 15%; heigth:20%;">
            <a href = '#/' class = 'navbar-brand maintitle' id = 'maintitle'>Olgina prodavnica suvenira</a>
            <button type = 'button' class = 'navbar-toggle' data-toggle = 'collapse' data-target = '.navbar-collapse'>
                <span class = 'sr-only'>Toggle navigation</span>
                <span class = 'icon-bar'></span>
                <span class = 'icon-bar'></span>
                <span class = 'icon-bar'></span>
            </button>

          <ul class = 'nav navbar-nav navbar-right  collapse navbar-collapse'>
            <li><a href = '#/about'>O nama</a></li>
            <li><a href = '#/products' data-target = '#' data-toggle = 'dropdown'>Proizvodi<span class = 'caret'></span></a>
              <ul class = 'dropdown-menu'>
                <li>Proizvodi od keramike</li>
                <li class = 'divider'></li>
                <li>Stari novac</li>
                <li>Markice</li>
                <li><a href = '#/catalogue'>Proizvodi od papira i kartona</a></li>
                <li class = 'divider'></li>
                <li>Ostali suveniri</li>
              </ul>
            </li>
            <li><a href = '#/history'>Istorijat</a></li>
            <li><a href = '#/contact'>Kontakt</a></li>
            <?php
              if(!isAuthenticated()) {
                echo "<li><a href='#/register'><span class='glyphicon glyphicon-user'></span>Registruj se</a></li>";
                echo "<li><a href='#/login'><span class='glyphicon glyphicon-user'></span>Prijavi se</a></li>";
              } else {
                echo "<li><a href='#/mojnalog' data-target = '#' data-toggle = 'dropdown'><span class='glyphicon glyphicon-user'></span>Moj nalog</a>
                ;
              }
            ?>
            <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Korpa</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div ng-view></div>

    <div class = 'container'>
      <div class = 'row footer' style = "background-color: gray;">
          <div class = 'col-xs-12'>
            <p> </p>
          </div>
          <div class = 'col-sm-3 col-xs-offset-1'>
            <i class = 'glyphicon glyphicon-list-alt'></i>
            <h4>Stranice</h4>
            <ul class = 'list-unstyled'>
              <li><a href = '#/'>Naslovna strana</a></li>
              <li><a href = '#/about'>O nama</a></li>
              <li><a href = '#/history'>Istorijat</a></li>
              <li>Proizvodi od keramike</li>
              <li>Stari novac</li>
              <li>Markice</li>
              <li>Proizvodi od papira i kartona</li>
              <li>Ostali suveniri</li>
              <li><a href = '#/contact'>Kontakt</a></li>
            </ul>
          </div>
          <div class = 'col-sm-3 col-xs-offset-1'>
            <i class = 'glyphicon glyphicon-heart-empty'></i>
            <h4>Volim te na svim jezicima!</h4>
            <p><i>Volim te</i> - Srpski</p>
          </div>
          <div class = 'col-sm-3 col-xs-offset-1'>
            <i class = 'glyphicon glyphicon-phone-alt'></i>
            <h4>Kontakt i naručivanje</h4>
            <p>Olga Stanković<br> Tel: +38163 789 2701<br> Email: fastoria@live.com</p>
          </div>
        </div>
    </div>
  </body>

</html>

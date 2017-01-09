<?php
  session_start();
?>

<!DOCTYPE html>
<html lang = 'rs' >

  <head>
    <title>Olgina prodavnica suvenira</title>
    <meta charset="utf-8">
    <link href = "../app/assets/css/bootstrap.css" rel = "stylesheet">
    <link href = "../app/assets/css/main.css" rel = "stylesheet">

    <!--libraries -->
    <script src = "../app/assets/js/jquery.min.js"></script>
    <script type = "text/javascript" src = "../app/assets/js/angular.min.js"></script>
    <script type = "text/javascript" src = "../app/assets/js/angular-sanitize.min.js"></script>
    <script src = "../app/assets/js/angular-route.js"></script>
    <script src = "../app/assets/js/bootstrap.js"></script>
    <script type = "text/javascript" src = "../app/app.js"></script>


    <!--- routes,services and controllers -->
    <script type = "text/javascript" src = "../app/controllers/routes.js"></script>
    <script type = "text/javascript" src = "../app/controllers/LoginController.js"></script>
    <script type = "text/javascript" src = "../app/controllers/LogoutController.js"></script>
    <script type = "text/javascript" src = "../app/controllers/RegisterController.js"></script>
    <script type = "text/javascript" src = "../app/controllers/StoreController.js"></script>
    <script type = "text/javascript" src = "../app/controllers/CategoryController.js"></script>
    <script type = "text/javascript" src = "../app/controllers/UserController.js"></script>
    <script type = "text/javascript" src = "../app/controllers/ChangeinfoController.js"></script>

    <!-- contains function for love you on all languages part-->
    <script type="text/javascript" src="../app/assets/js/loveYou.js"></script>

  </head>

  <body onload = "loveYou()" ng-app="Store" ng-init="loggedin=<?php echo isset($_SESSION['userId']) ? 'true' : 'false'; ?>;
    userid=<?php echo isset($_SESSION['userId']) ? $_SESSION['userId'] : -1; ?>">
    <div class = 'wrapper'>

      <!-- Navigation bar -->
      <div class = 'nav navbar-default navbar-static-top'>
        <div class = 'container'>
          <div class = 'navbar-header'>
            <img src = '../app/assets/img/other/logo1.png' alt = 'logo' class = 'navbar-brand navbar-left' id = 'logo'>
            <a href = '#/' class = 'navbar-brand maintitle' id = 'maintitle'>Olgina prodavnica suvenira</a>
            <button type = 'button' class = 'navbar-toggle' data-toggle = 'collapse' data-target = '.navbar-collapse'>
                  <span class = 'sr-only'>Toggle navigation</span>
                  <span class = 'icon-bar'></span>
                  <span class = 'icon-bar'></span>
                  <span class = 'icon-bar'></span>
            </button>
            <ul class = 'nav navbar-nav navbar-right  collapse navbar-collapse'>
              <li><a href = '#/about'>O nama</a></li>
              <li><a href = '' data-target = '#' data-toggle = 'dropdown'>Proizvodi<span class = 'caret'></span></a>
                <ul class = 'dropdown-menu' ng-controller = 'CategoryController'>
                  <li ng-repeat='category in categories'><a href = '#/catalogue/{{$index}}'>{{category.name}}</a></li>
                </ul>
              </li>
              <li><a href = '#/history'>Istorijat</a></li>
              <li><a href = '#/contact'>Kontakt i naručivanje</a></li>
              <!-- PHP code is cheking if user is logged in and he is site admin he should have admin panel option displayed-->
              <?php
                echo "<li><a href='#/register' ng-hide = 'loggedin'><span class='glyphicon glyphicon-pencil'></span>Registracija</a></li>";
                echo "<li><a href='#/login' ng-hide = 'loggedin'><span class='glyphicon glyphicon-user'></span>Prijava</a></li>";
                echo "<li><a href='' data-target = '#' data-toggle = 'dropdown' ng-show = 'loggedin'>
                              <span class='glyphicon glyphicon-user'></span>Moj nalog</a>
                    <ul class = 'dropdown-menu'>
                    " . (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] ? "<li>Admin panel</li>" : "" ) . "
                    <li><a href = '#/myaccount'>Profil</a></li>
                    <li>Prikaži narudžbine</li>
                    <li><a href='#' ng-controller='LogoutController' ng-click='logout()' target='_self'>Odjavi se</a></li>
                  </ul>
                </li>";
              ?>
              <li><a href="#/shoppingCart"><span class="glyphicon glyphicon-shopping-cart"></span>Korpa</a></li>
            </ul>
          </div>
        </div>
      </div>

    <!--Here is where we insert page content we want. ng-view is directive providing that. -->
    <div class = 'container' id = 'pagecontent'>
      <div ng-view>
      </div>
    </div>

    <!-- This piece of code is for bottom footer menu & other -->
    <div class = 'container'>
      <div class = 'row footer' id = 'footer'>
          <div class = 'col-sm-3 col-xs-offset-1'>
            <i class = 'glyphicon glyphicon-list-alt'></i>
            <h4>Stranice</h4>
            <ul class = 'list-unstyled'>
              <li><a href = '#/'>Naslovna strana</a></li>
              <li><a href = '#/about'>O nama</a></li>
              <li><a href = '#/history'>Istorijat</a></li>
              <li ng-repeat='category in categories'><a href = '#/catalogue/{{$index}}'>{{category.name}}</a></li>
              <li><a href = '#/contact'>Kontakt</a></li>
            </ul>
          </div>
          <div class = 'col-sm-3 col-xs-offset-1'>
            <i class = 'glyphicon glyphicon-heart-empty'></i>
            <h4>"Volim te" na raznim jezicima</h4>
            <p><i id = "iLoveYou"> Volim te - Srpski</i></p>
          </div>
          <div class = 'col-sm-3 col-xs-offset-1'>
            <i class = 'glyphicon glyphicon-phone-alt'></i>
            <h4>Kontakt i naručivanje</h4>
            <p>Olga Stanković<br> Tel: +38163 789 2701<br> Email: fastoria@live.com</p>
          </div>
        </div>
      </div>

    </div>
  </body>
</html>

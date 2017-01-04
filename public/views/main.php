<?php
  session_start();
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
    <!--- routes and controllers -->
    <script type = "text/javascript" src = "../app/controllers/routes.js"></script>
    <script type = "text/javascript" src = "../app/controllers/languages.js"></script>
    <script type = "text/javascript" src = "../app/controllers/LoginController.js"></script>
    <script type = "text/javascript" src = "../app/controllers/LogoutController.js"></script>
    <script type = "text/javascript" src = "../app/controllers/RegisterController.js"></script>
    <script type = "text/javascript" src = "../app/controllers/StoreController.js"></script>

    <div class = 'wrapper' ng-controller = 'LanguageController as LangCtrl'>
      <div class = 'nav navbar-default navbar-static-top'>

        <div class = 'container'>
          <div class = 'navbar-header'>
            <img src = '../app/assets/img/other/logo1.png' alt = 'logo' class = 'navbar-brand navbar-left' id = 'logo' style = "width: 15%; heigth:20%;">
            <a href = '#/' class = 'navbar-brand maintitle' id = 'maintitle'>{{LangCtrl.lang.title}}</a>
            <button type = 'button' class = 'navbar-toggle' data-toggle = 'collapse' data-target = '.navbar-collapse'>
                <span class = 'sr-only'>Toggle navigation</span>
                <span class = 'icon-bar'></span>
                <span class = 'icon-bar'></span>
                <span class = 'icon-bar'></span>
            </button>

          <ul class = 'nav navbar-nav navbar-right  collapse navbar-collapse'>
            <li><a href = '#/about'>{{LangCtrl.lang.about}}</a></li>
            <li><a href = '' data-target = '#' data-toggle = 'dropdown'>{{LangCtrl.lang.products}}<span class = 'caret'></span></a>
              <ul class = 'dropdown-menu'>
                <li><a href = '#/catalogue'>{{LangCtrl.lang.allproducts}}</a></li>
                <li>{{LangCtrl.lang.ceramics}}</li>
                <li class = 'divider'></li>
                <li>{{LangCtrl.lang.old_money}}</li>
                <li>{{LangCtrl.lang.stamps}}</li>
                <li><a href = '#/catalogue'>{{LangCtrl.lang.postcards}}</a></li>
                <li class = 'divider'></li>
                <li>{{LangCtrl.lang.other}}</li>
              </ul>
            </li>
            <li><a href = '#/history'>{{LangCtrl.lang.history}}</a></li>
            <li><a href = '#/contact'>{{LangCtrl.lang.contact}}</a></li>
            <?php
              if(!isset($_SESSION['userId'])) {
                echo "<li><a href='#/register'><span class='glyphicon glyphicon-pencil'></span>{{LangCtrl.lang.register}}</a></li>";
                echo "<li><a href='#/login'><span class='glyphicon glyphicon-user'></span>{{LangCtrl.lang.login}}</a></li>";
              } else {
                echo "<li><a href='#/myaccount' data-target = '#' data-toggle = 'dropdown'><span class='glyphicon glyphicon-user'></span>{{LangCtrl.lang.myaccount}}</a>  <ul class = 'dropdown-menu'>
                    " . ($_SESSION['isAdmin'] ? "<li>Admin panel</li>" : "" ) . "
                    <li>{{LangCtrl.lang.profile}}</li>
                    <li>{{LangCtrl.lang.changeinfo}}</li>
                    <li>{{LangCtrl.lang.showorders}}</li>
                    <li><a href='#' ng-controller='LogoutController' ng-click='logout()' target='_self'>{{LangCtrl.lang.logout}}</a></li>
                  </ul>
                </li>";
              }
            ?>
            <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> {{LangCtrl.lang.basket}}</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class = 'container' id = 'pagecontent'>
      <div ng-view>
      </div>
    </div>

    <div class = 'container'>
      <div class = 'row footer' style = "background-color: gray;">
          <div class = 'col-xs-12'>
            <p> </p>
          </div>
          <div class = 'col-sm-3 col-xs-offset-1'>
            <i class = 'glyphicon glyphicon-list-alt'></i>
            <h4>{{LangCtrl.lang.pages}}</h4>
            <ul class = 'list-unstyled'>
              <li><a href = '#/'>{{LangCtrl.lang.mainpage}}</a></li>
              <li><a href = '#/about'>{{LangCtrl.lang.about}}</a></li>
              <li><a href = '#/history'>{{LangCtrl.lang.history}}</a></li>
              <li>{{LangCtrl.lang.ceramics}}</li>
              <li>{{LangCtrl.lang.old_money}}</li>
              <li>{{LangCtrl.lang.stamps}}</li>
              <li>{{LangCtrl.lang.postcards}}</li>
              <li>{{LangCtrl.lang.other}}</li>
              <li><a href = '#/contact'>{{LangCtrl.lang.contact}}</a></li>
            </ul>
          </div>
          <div class = 'col-sm-3 col-xs-offset-1'>
            <i class = 'glyphicon glyphicon-heart-empty'></i>
            <h4>{{LangCtrl.lang.ily}}</h4>
            <p><i>{{LangCtrl.lang.ily2}}</i> - {{LangCtrl.lang.ily3}}</p>
          </div>
          <div class = 'col-sm-3 col-xs-offset-1'>
            <i class = 'glyphicon glyphicon-phone-alt'></i>
            <h4>{{LangCtrl.lang.co}}</h4>
            <p>Olga Stanković<br> Tel: +38163 789 2701<br> Email: fastoria@live.com</p>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>

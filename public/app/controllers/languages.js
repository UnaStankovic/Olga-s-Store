(function(){
  angular.module("Store").controller('LanguageController',['$scope', function($scope){
    /*$scope.checkLanguage = function(lang) {
      if(lang == 'en')
        this.lang = en;
      else
        this.lang = rs;
      };*/
      this.lang = en;
  }]);
  var rs = {
    title : "Olgina prodavnica suvenira",
    about : "O nama",
    history : "Istorijat",
    products : "Proizvodi",
    old_money : "Stari novac",
    stamps : "Markice",
    ceramics : "Keramika",
    postcards : "Proizvodi od papira i kartona",
    other : "Ostali proizvodi",
    contact : "Kontakt",
    register : "Registruj se",
    login : "Prijavi se",
    basket : "Korpa",
    myaccount : "Moj nalog",
    changeinfo : "Izmeni informacije",
    showorders : "Prikaži narudžbine",
    logout : "Odjavi se",
    mainpage : "Naslovna strana",
    pages : "Stranice",
    ily : "Volim te na svim jezicima",
    ily2 : "Volim te",
    ily3 : "Srpski",
    co : "Kontakt i naručivanje"
  }
  var en = {
    title : "Olga's souvenir store",
    about : "About",
    history : "History",
    products : "Products",
    old_money : "Old money",
    stamps : "Stamps",
    ceramics : "Ceramics",
    postcards : "Postcards & similar products",
    other : "Other products",
    contact : "Contact",
    register : "Register",
    login : "Login",
    basket : "Basket",
    myaccount : "My Account",
    changeinfo : "Change account information",
    showorders : "Show orders",
    logout : "Log out",
    mainpage : "Main page",
    pages : "Stranice",
    ily : "I love you in all languages",
    ily2 : "I love you",
    ily3 : "Engleski",
    co : "Contact us and ordering"
  }
})();

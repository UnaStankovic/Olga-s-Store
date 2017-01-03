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
    co : "Kontakt i naručivanje",
    historytext : "Gospođa Olga,poznata i kao dama sa belim šeširom, rođena je 1931. godine u Beogradu. Ceo radni vek provodi na Kalemegdanu(sada već 61 godinu, a nadamo se i jos mnogo više),pa je zbog toga zovu i legendom Kalemegdana. Gospođa koja danas ima 85 godina, je najstariji radnik na Kalemegdanskoj Tvrđavi.<br>Još od davne 1955. godine ona je radila, najpre, u Muzeju Šumarstva i lova (danas poznatiji kao Prirodnjački muzej) sve do 1990. godine, kada se penzionisala.<br> Tokom rada u muzeju napisala je knjigu Beli zeka decu čeka, inspirisana sopstvenim, kao i detinjstvima mnogobrojne dece koju je svakodnevno vidjala na Kalemegdanu. Knjiga je dobila naslov po statui belog zeke koja je stajala na prozoru muzeja i time privlačila mnogobrojnu decu. Nakon penzionisanja nije zelela da se povuče u kuću, kao većina ljudi danas, već je odlučila da se bavi onime što najviše voli - turistima. <br>Zbog svoje ljubavi prema turistima ona se već više od 20 godina trudi da svakog turistu pozdravi sa osmehom i lepim rečima, kao i suvenirima koje prodaje po najnižim cenama u gradu. Paleta proizvoda koje prodaje možda nije najveća, ali veliki broj proizvoda sama pravi uz pomoć svoje ćerke i unuke, kao što su na primer jedinstveni setovi sa kovanim novcem koji je veoma popularan među strancima. <br>Stranci je naprosto obožavaju i mnogi od njih žele da se slikaju sa njom, pa tako se ona nalazi na slikama sa ljudima sa svih strana sveta, a vrlo često je i intervjuišu za različite vrste tv emisija. Njena posvećenost i energija vredni su svakog divljenja ako se uzme u obzir da je ona na poslu svaki dan od pola 8 do 8 leti, a nešto kraće zimi i da posao nastavlja kada dođe kući.",
    quotesh : "Želja da svaki turista iz Beograda ode sa osmehom, lepim utiscima i najlepšim i jedinstvenim suvenirima mi je glavna motivacija koja mi pruža novu energiju svaki dan." ,
    ordering : "Naručivanje se za sada vrši pouzećem ili ličnim preuzimanjem na Kalemegdanu.",
    toorder : "Naručivanje",
    forgotpass : "Zaboravili ste lozinku?",
    logindata : "Unesite podatke",
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
    pages : "Pages",
    ily : "I love you in all languages",
    ily2 : "I love you",
    ily3 : "Engleski",
    co : "Contact us and ordering",
    historytext : "sometext",
    quotesh : "I want for every tourist to go from Belgrade with a smile, amazing impressions and most beautiful and unique souvenirs. That is my main motivation that gives me new strenght every day.",
    ordering : "For now you can only purchase products at Kalemegdan fortress.",
    toorder : "Ordering of products",
    forgotpass : "Forgot your password?",
    logindata : "Enter your data",
  }
})();

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
  /*NOTE : Some elements are used on multiple pages*/
  var rs = {
    /*Skelleton page elements*/
    title : "Olgina prodavnica suvenira",
    about : "O prodavnici",
    history : "Istorijat",
    products : "Proizvodi",
    allproducts : "Svi proizvodi",
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

    /*Main page elements*/
    welcome : "Dobrodošli u Olginu prodavnicu suvenira",
    shortdesc : "U ovoj prodavnici možete naći različite vrste klasičnih suvenira, suvenira namenjenih kolekcionarima, poštanske markice,...), kao i suvenira za osobe sa prostora EX YU. ",
    sh : "Kratak istorijat",
    shorthistory : "Gospođa Olga, rođena je 1931. godine u Beogradu. Ceo radni vek provodi na Kalemegdanu(sada već 61 godinu, a nadamo se i jos mnogo više), pa je zbog toga zovu i legendom Kalemegdana.Zbog svoje ljubavi prema turistima ona se već više od 20 godina trudi da svakog turistu pozdravi sa osmehom i lepim rečima, kao i suvenirima koje prodaje po najnižim cenama u gradu. Paleta proizvoda koje prodaje možda nije najveća, ali veliki broj proizvoda sama pravi uz pomoć svoje ćerke i unuke.",
    motivation : "Motivacija",
    goal : "Cilj",
    goaltext : "  Glavni cilj ove prodavnice je da proizvode koje Olga prodaje predstavimo široj publici, s obzirom na to da je dosta ljudi iskazalo interesovanje za ono što imamo da ponudimo. Mnogi od njih su ljudi iz Rusije, Kine, Japana, SAD-a, kao i ljudi iz zemalja bivše Jugoslavije. ",

    /*History page elements*/
    historytext : "Gospođa Olga,poznata i kao dama sa belim šeširom, rođena je 1931. godine u Beogradu. Ceo radni vek provodi na Kalemegdanu(sada već 61 godinu, a nadamo se i jos mnogo više),pa je zbog toga zovu i legendom Kalemegdana. Gospođa koja danas ima 85 godina, je najstariji radnik na Kalemegdanskoj Tvrđavi.<br>Još od davne 1955. godine ona je radila, najpre, u Muzeju Šumarstva i lova (danas poznatiji kao Prirodnjački muzej) sve do 1990. godine, kada se penzionisala.<br> Tokom rada u muzeju napisala je knjigu Beli zeka decu čeka, inspirisana sopstvenim, kao i detinjstvima mnogobrojne dece koju je svakodnevno vidjala na Kalemegdanu. Knjiga je dobila naslov po statui belog zeke koja je stajala na prozoru muzeja i time privlačila mnogobrojnu decu. Nakon penzionisanja nije zelela da se povuče u kuću, kao većina ljudi danas, već je odlučila da se bavi onime što najviše voli - turistima. <br>Zbog svoje ljubavi prema turistima ona se već više od 20 godina trudi da svakog turistu pozdravi sa osmehom i lepim rečima, kao i suvenirima koje prodaje po najnižim cenama u gradu. Paleta proizvoda koje prodaje možda nije najveća, ali veliki broj proizvoda sama pravi uz pomoć svoje ćerke i unuke, kao što su na primer jedinstveni setovi sa kovanim novcem koji je veoma popularan među strancima. <br>Stranci je naprosto obožavaju i mnogi od njih žele da se slikaju sa njom, pa tako se ona nalazi na slikama sa ljudima sa svih strana sveta, a vrlo često je i intervjuišu za različite vrste tv emisija. Njena posvećenost i energija vredni su svakog divljenja ako se uzme u obzir da je ona na poslu svaki dan od pola 8 do 8 leti, a nešto kraće zimi i da posao nastavlja kada dođe kući.",
    quotesh : "Želja da svaki turista iz Beograda ode sa osmehom, lepim utiscima i najlepšim i jedinstvenim suvenirima mi je glavna motivacija koja mi pruža novu energiju svaki dan." ,
    olga : "O Olgi",
    kalemegdan : "O Tvrđavi",
    /*Order page elements*/
    ordering : "Naručivanje se za sada vrši pouzećem ili ličnim preuzimanjem na Kalemegdanu.",
    toorder : "Naručivanje",

    /*Login page and registration page elements*/
    forgotpass : "Zaboravili ste lozinku?",
    logindata : "Unesite podatke",
    confirm : "Potvrdi",
    name : "Ime",
    surname : "Prezime",
    address : "Adresa",
    city : "Grad",
    country : "Država",
    tel : "Telefon",
    fieldctrl : "Obavezna polja",
    fieldctrl2 : "Polja koja možete popuniti pri naručivanju proizvoda",

    /*About the store page elements*/
    cause : "Svrha",
    abouttext : "Svrha ove prodavnice je da znatiželjnima i kupcima pruži uvid u proizvode koje nudimo. Proizvodi su razvrstani u više kategorija: stari novac, markice, proizvodi od papira i kartona,... kako bi bilo omogućeno da svako lako nađe ono što ga interesuje. ",
    prices : "Cene",
    abouttext1 : "Trudimo se da cene budu najniže u Beogradu. Osim toga moguć je dogovor oko popusta od 5% do 15% u zavisnosti od robe koju želite kao i od količine. :)",
    payment : "Plaćanje",
    abouttext2 : "Plaćanje je za sad moguće samo na dva načina : pouzećem i ličnim preuzimanjem. Jedno smo od malo mesta u gradu gde je moguće platiti u dinarima, evrima i američkim dolarima. Radimo na tome da online naručivanje bude omogućeno tako da se proizvodi mogu plaćati karticom.",
    horario : "Radno vreme",
    horariotext : "Možete nas naći na Kalemegdanu od 08 do 20 časova tokom leta, a zimi radimo nešto kraće od 9 do 17 časova. Na mejl odgovaramo u roku od 24 sata. ",
    aboutproduct : "Naši proizvodi",
    aboutproducttext : "Prodajemo proizvode visokog kvaliteta po najboljim cenama. Članovi smo Srpskog numizmatičkog društva i sve što prodajemo je ORIGINALNO. Kopiranje novca je ozbiljan prekršaj.",
    location : "Lokacija",
    locationtext : "Možete nas naći na najlepšoj lokaciji u gradu - u Kalemegdanskom parku. Kalemegdanski park je nezaobilazna destinacija svih turista koji dolaze u Beograd.",
    /*ADMIN STUFF*/

  }
  var en = {
    /*Skelleton page elements */
    title : "Olga's souvenir store",
    about : "About",
    history : "History",
    products : "Products",
    allproducts : "All products",
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

    /*Main page elements*/
    welcome : "Welcome to Olga's souvenir store",
    shortdesc : "In this shop you can find various kinds of classic souvenirs, collector souvenirs, stamps, souvenirs for people from the former Republic of Yugoslavia…",
    sh : "Short story",
    shorthistory : "Madam Olga was born in 1931 in Belgrade. She has been working on Kalemegdan her whole life (she has already spent 61 years here and we hope for many more), which is why some even call her the legend of Kalmegdan. Because of her love for tourists for over twenty years she has been making an effort to greet every tourist with a smile, kind words and souvenirs at the lowest prices in town. The array of items that she sells might not be the largest, but she makes a large number of items herself with the help of her daughter and granddaughter.",
    motivation : "Motivation",
    goal : "Main Goal",
    goaltext : "The main purpose of this store is to present the items Olga sells to a wider audience, considering that a great number of people showed interest in what we have to offer. Many of them are from Russia, China, Japan, USA and the countries of the former republic of Yugoslavia.",

    /*History page elements*/
    historytext : "Madam Olga, also known as the lady with the white hat, was born in 1931 in Belgrade. She has been working on Kalemegdan her whole life (she has already spent 61 years here and we hope for many more), which is why some even call her the legend of Kalmegdan. The lady, who is now 85, is the oldest employee on the Kalemegdan Fortress. </br> Ever since the distant 1955 she worked at first in the Museum of Forestry and Hunting (today more widely known as the Natural History Museum) until 1990, when she retired. </br> During her time at the museum she wrote the book “Beli zeka decu čeka” (The white bunny waits for the children), inspired by her own childhood and those of the children she used to see every day on Kalemegdan. The book was named after the statue of a white bunny which stood on the window of the museum and attracted lots of children in that way. After retiring she did not want to keep to her house, like most people today, but she decided to do business with who she loved the most – tourists. </br> Because of her love for tourists for over twenty years she has been making an effort to greet every tourist with a smile, kind words and souvenirs at the lowest prices in town. The array of items that she sells might not be the largest, but she makes a large number of items herself with the help of her daughter and granddaughter, like the unique sets of coins, which are very popular among foreigners. </br> Foreigners just adore her and many of them want to take a picture with her, and thus she can be seen in photos with people from all around the world, and she is very often interviewed for various kinds of TV shows.",
    quotesh : "The desire that every tourist leaves Belgrade with a smile, pleasant memories and the most beautiful and unique souvenirs is my main motivation that gives me new energy every day.",
    olga : "About Olga",
    kalemegdan : "About The Fortress",
    /*Order page elements*/
    ordering : "For now you can only purchase products at Kalemegdan fortress.",
    toorder : "Ordering of products",

    /*Login page and registration page */
    forgotpass : "Forgot your password?",
    logindata : "Enter your credentials",
    confirm : "Confirm",
    name : "Name",
    surname : "Surname",
    address : "Address",
    city : "City",
    country : "State",
    tel : "Telephone",
    fieldctrl : "Mandatory fields",
    fieldctrl2 : "Fields that you can fill on ordering product",
    /*About the store page elements*/
    cause : "Main Cause",
    abouttext : "Main cause of this store is to present to a wider audience and possible buyers insight into all the products we have to offer. All products are divided into various categories, such as : old money, stamps, postcards, etc. so anybody can find their cup of tea.",
    prices : "Prices",
    abouttext1 : "We are trying to maintain our prices lowest in Belgrade. At the top of that, we are sometimes offering discount from 5% to 15% depending on type of product and quantity. :)",
    payment : "Payment method",
    abouttext2 : "For now it is only possible to pay and take product in person at Kalemegdan. We are one of a very few places in Belgrade where it is possible to pay in dinars, euros and american dollars. We are currently working on providing credit card payment method support.",
    horario : "Working hours",
    horariotext : "You can find us at Kalemegdan from 8 am to 8 pm during the summer and from 9 am to 5 pm during the winter. We reply to your e-mail in 24h max. ",
    aboutproduct : "Our products",
    aboutproducttext : "We sell high quality products at best prices. We are members of the Serbian numismatic society and everything we sell is ORIGINAL. Money forgery is a serious crime.",
    location : "Location",
    locationtext : "You can find us on the best location in town - Kalemegdan park. Kalemegdan park is the most atractive destination which is visited by all the tourists that come to Belgrade.",
  }
})();

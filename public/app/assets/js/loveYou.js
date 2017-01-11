function loveYou() {
    setInterval(function(){
    var quotes = ["Wo ie ni - Kineski",
    "Jeg elsker dig - Danski",
    "I love you - Engleski",
    "Mi amas vin - Esperanto",
    "Mina rakastan sinua- Finski",
    "Je t'aime - Francuski",
    "S'agapo - Grcki",
    "Ich liebe dich - Nemacki",
    "Aloha Au Ia ʻOe - Havajski",
    "Szeretlek - Madjarski",
    "Ti amo - Italijanski",
    "Te sakam - Makedonski",
    "Eg elskar deg - Norveski",
    "Adoro-te - Portugalski",
    "Ja tebja ljublju - Ruski"];
      var quote = quotes[Math.floor(Math.random() * quotes.length)];
      document.getElementById("iLoveYou").innerHTML = quote; }, 3000);
}

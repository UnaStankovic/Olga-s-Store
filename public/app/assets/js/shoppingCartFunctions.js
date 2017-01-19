function addToCart() {

    //I was working on version with number of productes ordered
    var nameOfProduct = document.getElementById("nameOfProduct").innerHTML;
    //var numberOfProduct = document.getElementById("numberOfProduct").value;

    console.log(nameOfProduct);
    //console.log(numberOfProduct);

    sessionStorage.setItem(nameOfProduct, 1);
  }

function showCart() {
    var tabelBody = " ";
  //console.log() is used for testing
  //console.log("-----------------------------------------------");

    if (sessionStorage.length !== 0) {

      for (var i = sessionStorage.length - 1; i >= 0; i--) {
        //console.log(sessionStorage.key(i));
        //also for when we have number of products
        //console.log(sessionStorage.getItem(sessionStorage.key(i)));

        tabelBody+="<tr><td></td><td id='some-product' onclick='pop()'>"+sessionStorage.key(i)+
        "</td><td> <input id='kolicina' type = 'number' min = '1' value='1'></td><td><p data-placement='top' data-toggle='tooltip' title='Delete'><button class='btn btn-primary btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete' ><span class='glyphicon glyphicon-trash'></span></button></p></td></tr>";
        //Idk why he doesn't allow me to break it in new lines
      }

      document.getElementById("tabela").innerHTML = tabelBody;
    } else {
      document.getElementById("tabela").innerHTML = "<p> Nema proizvoda u korpi ! </p>";
    }
}


function deleteProduct(){

    var removeThis = document.getElementById("some-product").innerHTML;
    sessionStorage.removeItem(removeThis);

    showCart();
}

function pop(){

    var nameOfProduct = document.getElementById("some-product").innerHTML;
    alert("Hi! "+nameOfProduct);

}

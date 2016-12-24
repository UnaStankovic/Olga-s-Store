(function(){
	var app = angular.module('store', []); //in [] we can see list of pages that are dependant on our
	
	app.controller('StoreController', function(){
		this.products = postcards;
	});
	
	var postcards = [
	{
		name : 'Razglednica tvrđava',
		price : 30,
		description : 'Vise vrsta razglednica',
		canPurchase : true
	},
	
	{
		name : 'Razglednica hram',
		price : 30,
		description : 'Vise vrsta razglednica',
		canPurchase : true
	}
	];
})();
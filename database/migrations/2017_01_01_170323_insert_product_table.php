<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('Product')->insert([
        ['description' => 'Kovani novac koji se koristi i danas spakovan u vidu suvenira za turiste. Na poleđini se nalazi razglednica Beograda.', 'price_per_piece' => 250,
        'in_stock' => 1, 'name' => 'Kovanice Srbija', 'Category_id' => 1],
        ['description' => 'Kovani novac koji se koristio u periodu bivše Jugoslavije. Na poleđini se nalazi razglednica Jugoslavije.', 'price_per_piece' => 600,
        'in_stock' => 1, 'name' => 'Kovanice EX YU', 'Category_id' => 1],
        ['description' => 'Na razglednici se nalazi 42 različite fotografije mnogobrojnih znamenitosti Beograda.', 'price_per_piece' => 30,
        'in_stock' => 1, 'name' => 'Razglednica Beograd 42', 'Category_id' => 2],
        ['description' => 'Na razglednici se nalazi slika Zindan kapije na Kalemegdanu.', 'price_per_piece' => 30,
        'in_stock' => 1, 'name' => 'Razglednica Beograd Zindan', 'Category_id' => 2],
        ['description' => 'Na razglednici se nalazi Hram Svetog Save na Vračaru.', 'price_per_piece' => 30,
        'in_stock' => 1, 'name' => 'Razglednica Beograd Hram', 'Category_id' => 2],
        ['description' => 'Na razglednici se nalaze slike sa Kalemegdana.', 'price_per_piece' => 30,
        'in_stock' => 1, 'name' => 'Razglednica Beograd Kalemegdan', 'Category_id' => 2],
        ['description' => 'Na razglednici se nalazi slika Hrama Svetog Save i Karađorđevog parka.', 'price_per_piece' => 30,
        'in_stock' => 1, 'name' => 'Razglednica Beograd Hram i park', 'Category_id' => 2],
        ['description' => 'Na razglednici se nalazi mapa bivše Jugoslavije.', 'price_per_piece' => 30,
        'in_stock' => 1, 'name' => 'Razglednica Beograd YU', 'Category_id' => 2],
        ['description' => 'Na razglednici se nalaze fotografije Trga republike, Hrama Svetog Save i Kalemegdana.', 'price_per_piece' => 30,
        'in_stock' => 1, 'name' => 'Razglednica Beograd THK', 'Category_id' => 2],
        ['description' => 'Na razglednici se nalazi 14 fotografija znamenitosti Beograda.', 'price_per_piece' => 30,
        'in_stock' => 1, 'name' => 'Razglednica Beograd 14', 'Category_id' => 2],
        ['description' => 'Na razglednici se nalaze fotografije Kalemegdana noću.', 'price_per_piece' => 30,
        'in_stock' => 1, 'name' => 'Razglednica Beograd Kalemegdan noću', 'Category_id' => 2],
        ['description' => 'Novčanica od petsto milijardi iz 1993. godine. Novčanica je izdata za vreme inflacije i nalazi se u Ginisovoj knjizi rekorda kao najveća ikad štampana. Poznata je i po nazivu "Zmaj" jer se na njoj nalazi Jovan Jovanović Zmaj.', 'price_per_piece' => 300,'in_stock' => 1, 
        'name' => 'Novčanica petsto milijardi', 'Category_id' => 1],
        ['description' => 'Novčanica od petsto milijardi iz 1993. godine. Novčanica je izdata za vreme inflacije i nalazi se u Ginisovoj knjizi rekorda kao najveća ikad štampana. Poznata je i po nazivu "Zmaj" jer se na njoj nalazi Jovan Jovanović Zmaj.', 'price_per_piece' => 300,'in_stock' => 1, 
        'name' => 'Novčanica petsto milijardi', 'Category_id' => 1],
        ['description' => 'Edicija markica specijalnog izdanja 1979. godine povodom Olimpijskih igara.', 'price_per_piece' => 250,
        'in_stock' => 1, 'name' => 'Olimpijske igre 1979. godine', 'Category_id' => 3],
        ['description' => 'Edicija markica iz Jugoslavije sa avionima.', 'price_per_piece' => 250,
        'in_stock' => 1, 'name' => 'Jugoslavija - Avioni', 'Category_id' => 3],
        ['description' => 'Edicija markica portreti istorijskih ličnosti.', 'price_per_piece' => 250,
        'in_stock' => 1, 'name' => 'Umetnost portreti', 'Category_id' => 3],
        ['description' => 'Edicija markica - Kraljevina Srba, Hrvata i Slovenaca i Jugoslavija.', 'price_per_piece' => 250,
        'in_stock' => 1, 'name' => 'Kraljevina SHS i Jugoslavija', 'Category_id' => 3],
        ['description' => 'Edicija markica umetnosti Samoa I Sisifo.', 'price_per_piece' => 250,
        'in_stock' => 1, 'name' => 'Samoa i Sisifo umetnicke markice.', 'Category_id' => 3],
        ['description' => 'Specijalna edicija markica naše pošte.', 'price_per_piece' => 250,
        'in_stock' => 1, 'name' => 'OI, Vaskrs, Srbija', 'Category_id' => 3],
        ['description' => 'Kraljevina Crna gora - pet perpera.', 'price_per_piece' => 600,
        'in_stock' => 1, 'name' => 'Pet Perpera', 'Category_id' => 1],
        ['description' => 'Kraljevina Crna gora - pet perpera.', 'price_per_piece' => 600,
        'in_stock' => 1, 'name' => 'Pet Perpera', 'Category_id' => 1],
        ['description' => 'Sto ruskih rubalja sa Katarinom Velikom iz 1910. godine.', 'price_per_piece' => 3600,
        'in_stock' => 1, 'name' => 'Katarina Velika', 'Category_id' => 1],
        ['description' => 'Sto ruskih rubalja sa Katarinom Velikom iz 1910. godine.', 'price_per_piece' => 3600,
        'in_stock' => 1, 'name' => 'Katarina Velika', 'Category_id' => 1],
        ['description' => 'Petsto ruskih rubalja sa Petrom Velikim iz 1912. godine.', 'price_per_piece' => 3600,
        'in_stock' => 1, 'name' => 'Petar Veliki', 'Category_id' => 1],
        ['description' => 'Sto ruskih rubalja sa Petrom Velikim iz 1912. godine.', 'price_per_piece' => 3600,
        'in_stock' => 1, 'name' => 'Petar Veliki', 'Category_id' => 1],
        ['description' => 'Hiljadu dinara iz 1931. godine. Na novčanici se nalazi Kraljica Marija Karađorđević. Likovno rešenje: Paja Jovanović', 
        'price_per_piece' => 1200, 'in_stock' => 1, 'name' => 'Hiljadu dinara iz 1931. godine', 'Category_id' => 1],
        ['description' => 'Hiljadu dinara iz 1931. godine. Na novčanici se nalazi Kraljica Marija Karađorđević. Likovno rešenje: Paja Jovanović', 
        'price_per_piece' => 1200, 'in_stock' => 1, 'name' => 'Hiljadu dinara iz 1931. godine', 'Category_id' => 1],
        ['description' => 'Sto dinara iz 1929. godine Kraljevina Jugoslavija.', 'price_per_piece' => 600, 
        'in_stock' => 1, 'name' => 'Sto dinara iz 1929. godine', 'Category_id' => 1],
        ['description' => 'Sto dinara iz 1929. godine Kraljevina Jugoslavija.', 'price_per_piece' => 600, 
        'in_stock' => 1, 'name' => 'Sto dinara iz 1929. godine', 'Category_id' => 1],
        ['description' => 'Sto franaka iz 1940. godine.', 'price_per_piece' => 600, 
        'in_stock' => 1, 'name' => 'Francuska iz 1940. godine', 'Category_id' => 1],
        ['description' => 'Sto franaka iz 1940. godine.', 'price_per_piece' => 600, 
        'in_stock' => 1, 'name' => 'Francuska iz 1940. godine', 'Category_id' => 1],
        ['description' => 'Hiljadu srpskih dinara iz 1943. godine.', 'price_per_piece' => 600, 
        'in_stock' => 1, 'name' => 'Hiljadu srpskih dinara iz 1943. godine.', 'Category_id' => 1],
        ['description' => 'Hiljadu srpskih dinara iz 1943. godine.', 'price_per_piece' => 600, 
        'in_stock' => 1, 'name' => 'Hiljadu srpskih dinara iz 1943. godine.', 'Category_id' => 1],
        ['description' => 'Deset crnogorskih perpera iz 1914. godine.', 'price_per_piece' => 1000, 
        'in_stock' => 1, 'name' => 'Deset crnogorskih perpera iz 1914. godine.', 'Category_id' => 1],
        ['description' => 'Deset crnogorskih perpera iz 1914. godine.', 'price_per_piece' => 1000, 
        'in_stock' => 1, 'name' => 'Deset crnogorskih perpera iz 1914. godine.', 'Category_id' => 1],
        ['description' => 'Dva brazilska reala.', 'price_per_piece' => 600, 
        'in_stock' => 1, 'name' => 'Dva brazilska reala.', 'Category_id' => 1],
        ['description' => 'Dva brazilska reala.', 'price_per_piece' => 600, 
        'in_stock' => 1, 'name' => 'Dva brazilska reala.', 'Category_id' => 1],
        ['description' => 'Pedeset pezeta iz 1928. godine. Iz Španije.', 'price_per_piece' => 800, 
        'in_stock' => 1, 'name' => 'Pedeset pezeta iz 1928. godine.', 'Category_id' => 1]
        ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

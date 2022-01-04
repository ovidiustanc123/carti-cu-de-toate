<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'id' => 1,
            'name' => 'Micul prinț',
            'category_id' => 1,
            'author' => 'Antoine De Saint Exupery',
            'description' => 'Alegorie morala si autobiografie spirituala, Micul print, cea mai tradusa carte din literatura franceza, infatiseaza cu un farmec nepieritor povestea unui baietel care isi abandoneaza micuta planeta pentru a calatori prin univers. Odiseea sa, in care descopera ciudateniile adultilor printr-o serie de intalniri extraordinare, culmineaza cu aventurile pe planeta Pamant.',
            'picture' => 'micul_print.jpg',
            'copies' => 10,
            'pages' => 112
        ]);
        DB::table('books')->insert([
            'id' => 2,
            'name' => 'Băiatul cu pijamale în dungi',
            'category_id' => 2,
            'author' => 'John Boyne',
            'description' => 'Aceasta este povestea unui baietel german pe nume Bruno, al carui tata a primit o slujba foarte importanta, ceea ce inseamna ca toata familia trebuie sa se mute departe de oras, intr-un loc ciudat, unde casa lor e singura locuinta adevarata si unde in spatele unor garduri nesfarsite se afla sute, poate mii de oameni imbracati in pijamale in dungi. Bruno se straduieste sa inteleaga ce se intampla in jurul sau. Cititorul banuieste despre ce e vorba, dar bietul Bruno, nu. Porneste asadar sa exploreze imprejurimile si intrezareste un punct care devine o pata si pata, un baiat. Scrisa intr-un limbaj simplu, copilaresc, aceasta carte este mult mai mult decat o poveste pentru copii. Cititorul se va teme de momentul in care Bruno isi va pierde inocenta copilariei si va incepe sa intrezareasca adevarul, dar poate ca lucrurile vor evolua si mai rau si el nu va descoperi deloc adevarul. John Boyne este un scriitor irlandez, nascut la Dublin in 1971. A scris nenumarate carti si povestiri pentru copii. Cartea sa Baiatul cu pijamale in dungi s-a vandut in lumea intreaga in peste 2,5 milioane de exemplare si a fost ecranizata de curand de Miramax.',
            'picture' => 'baiatul_in_dungi.jpg',
            'copies' => 5,
            'pages' => 224
        ]);
    }
}

<?php

namespace Database\Seeders;
use App\Models\Film;
use App\Models\User;
use App\Models\TipFilma;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        TipFilma::truncate();
        User::truncate();
        Film::truncate();

        //Film::factory(5)->create();
        //$user=User::factory()->create(); 
        $user1=User::create(['name'=>"Pera Peric",'email'=>"peraperic@gmail.com",'password'=>"pera"]);
        $user2=User::create(['name'=>"Zika Zikic",'email'=>"zikazikic@gmail.com",'password'=>"zika"]);


        $tip1=TipFilma::create(['zanr'=>"fantastika"]);
        $tip2=TipFilma::create(['zanr'=>"drama"]);
        $tip3=TipFilma::create(['zanr'=>"akcija"]);

        $film1=Film::create([
            'naziv'=>'Gospodar prstenova',
            'budzet'=>'93000000',
            'opis'=>'Gospodar prstenova je roman epske fantastike koji je napisao engleski akademik i filolog Džon Ronald Rejel Tolkin',
            'godina'=>'2002',
            'user_id'=>$user1->id,
            'tipfilma_id'=>$tip1->id
        ]);

        $film2=Film::create([
            'naziv'=>'Paklene Ulice',
            'budzet'=>'1000000000',
            'opis'=>'Paklene ulice američka je franšiza koja uključuje niz akcionih filmova o ilegalnim uličnim auto-trkama i pljačkama kojima se bave glavni likovi.',
            'godina'=>'2001',
            'user_id'=>$user1->id,
            'tipfilma_id'=>$tip3->id
        ]);
        $film3=Film::create([
            'naziv'=>'Kum',
            'budzet'=>'1730000000',
            'opis'=>'Kum je američki dramski film režisera Fransisa Forda Kopole iz 1972. godine s Marlonom Brandom, Alom Pačinom, Džejmsom Kanom, Robertom Duvalom i Dajanom Kiton.',
            'godina'=>'1972',
            'user_id'=>$user2->id,
            'tipfilma_id'=>$tip2->id
        ]);
        $film4=Film::create([
            'naziv'=>'Spajdermen',
            'budzet'=>'200000000',
            'opis'=>'pajdermen: Put bez povratka (engl. Spider-Man: No Way Home) je američki superherojski film iz 2021. godine, baziran na Marvelovom liku, Spajdermenu.',
            'godina'=>'2021',
            'user_id'=>$user1->id,
            'tipfilma_id'=>$tip3->id
        ]);

    }
}

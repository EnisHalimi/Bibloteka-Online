<?php

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
        factory(App\Libri::class, 100)->create()->each(function ($libri)
            {
                $zhanri = factory(App\Zhanri::class)->make();
                $libri->zhanris()->save($zhanri);

                $autors = factory(App\Autor::class)->make();
                $libri->autors()->save($autors);

                $users = factory(App\User::class)->make();
                $libri->users()->save($users,['data_e_marrjes'=>date('Y-m-d'),'afati'=>date('Y-m-d'),'kthyer'=>false]);
            });

    }
}

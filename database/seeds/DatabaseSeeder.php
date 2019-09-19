<?php
    
    use App\Models\Question;
    use App\Models\User;
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
            factory(User::class, 3)->create()->each(function ($u) {
                $u->questions()->saveMany(factory(Question::class, rand(3, 5))->make());
            });
        }
    }

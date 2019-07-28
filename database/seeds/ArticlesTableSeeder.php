<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('articles')->delete();

		$user = App\User::first();

		factory(App\Article::class, 20)->create([
			'user_id' => $user->id,
		]);
    }
}

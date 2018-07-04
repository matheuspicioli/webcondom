<?php

use Illuminate\Database\Seeder;

class InquilinosSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$entidades = WebCondom\Models\Entidades\Entidade::all();

		factory(WebCondom\Models\Entidades\Inquilino::class, 2)
			->create()
			->each(function ($inquilino) use ($entidades) {
				$entidade = $entidades->random();

				$inquilino->entidade()->associate($entidade);
				$inquilino->save();
			});
	}
}

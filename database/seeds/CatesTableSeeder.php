<?php

use Illuminate\Database\Seeder;

class CatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cates')->insert
        (
        	[
	        	[
		            'name' => 'Miền Bắc',
		            'alias' => 'mien-bac',
		            'zoom'	=> 5,
		            'latitude'=>'21.03333',
		            'longitude'=>'105.85000'
	        	],
	        	[
	        		'name' => 'Miền Trung',
		            'alias' => 'mien-trung',
		            'zoom'	=> 5,
		            'latitude'=>'16.46278',
		            'longitude'=>'107.58472'
	        	],
	        	[
	        		'name' => 'Miền Nam',
		            'alias' => 'mien-nam',
		            'zoom'	=> 5,
		            'latitude'=>'10.83333',
		            'longitude'=>'106.63278'
	        	],
	        	
        ]);
    }
}

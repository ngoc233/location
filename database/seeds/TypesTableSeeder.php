<?php

use Illuminate\Database\Seeder;


class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert
        (
        	[
	        	[
	            'name' => 'Thành Phố',
	            'alias' => 'Thanh-Pho',
	        	],
	        	[
	        		'name' => 'Thủ Đô',
	            	'alias' => 'Thu-Do',
	        	],
	        	[
	        		'name' => 'Rừng Núi',
	            	'alias' => 'Rung-Nui',
	        	],
	        	[
	        		'name' => 'Biển',
	            	'alias' => 'Bien',
	        	],
	        	[
	        		'name' => 'Khác',
	            	'alias' => 'Khac',
	        	],
        ]);
    }
}

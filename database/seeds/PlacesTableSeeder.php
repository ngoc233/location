<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert
        (
        	[
	        	[
	        		'cate_id' => 1,
	        		'type_id' => 2,
		            'name' => 'Hà Nội',
		            'alias' => 'ha-noi',
		            'description'=>'Hà Nội là thủ đô của nước Cộng hoà xã hội chủ nghĩa Việt Nam và cũng là kinh đô của hầu hết các vương triều phong kiến Việt trước đây. Do đó, lịch sử Hà Nội gắn liền với sự thăng trầm của lịch sử Việt Nam qua các thời kỳ.',
		            'image'	=> 'img-demo-3.jpg',
		            'latitude'=>'21.03333',
		            'longitude'=>'105.85000'
	        	],
	        	[
	        		'cate_id' => 3,
	        		'type_id' => 1,
		            'name' => 'Hồ Chí Minh',
		            'alias' => 'ho-chi-minh',
		            'description'=>'Thành phố Hồ Chí Minh là thành phố lớn nhất Việt Nam, đồng thời cũng là một trong những trung tâm kinh tế và văn hóa, giáo dục quan trọng nhất của nước này.',
		            'image'	=> 'img-demo-4.jpg',
		            'latitude'=>'10.83333',
		            'longitude'=>'106.63278'
	        	],
	        	[
	        		'cate_id' => 2,
	        		'type_id' => 1,
		            'name' => 'Huế',
		            'alias' => 'hue',
		            'description'=>'Huế là thành phố lớn nhất Việt Nam, đồng thời cũng là một trong những trung tâm kinh tế và văn hóa, giáo dục quan trọng nhất của nước này.',
		            'image'	=> 'img-demo-6.jpg',
		            'latitude'=>'16.46278',
		            'longitude'=>'107.58472'
	        	],
	        	[
	        		'cate_id' => 1,
	        		'type_id' => 4,
		            'name' => 'Hạ Long',
		            'alias' => 'ha-long',
		            'description'=>'Vịnh Hạ Long là một vịnh nhỏ thuộc phần bờ tây vịnh Bắc Bộ tại khu vực biển Đông Bắc Việt Nam, bao gồm vùng biển đảo thuộc thành phố Hạ Long, thành phố Cẩm Phả và một phần huyện đảo Vân Đồn của tỉnh Quảng Ninh.',
		            'image'	=> 'xNDfI8QEM6-ha-long.jpg',
		            'latitude'=>'20.97194',
		            'longitude'=>'107.04528'
	        	],
	        	[
	        		'cate_id' => 3,
	        		'type_id' => 3,
		            'name' => 'Cà Mau',
		            'alias' => 'ca-mau',
		            'description'=>'Cà Mau là tỉnh ven biển ở cực nam của Việt Nam, nằm trong khu vực Đồng bằng sông Cửu Long. Cà Mau là một vùng đất trẻ, mới được khai phá khoảng trên 300 năm. Vùng đất Cà Mau ngày xưa được Mạc Cửu dẫn người Hoa đến khai phá.',
		            'image'	=> 'img-demo-8.jpg',
		            'latitude'=>'9.18361',
		            'longitude'=>'105.15000'
	        	],
	        	[
	        		'cate_id' => 1,
	        		'type_id' => 5,
		            'name' => 'Bạc Liêu',
		            'alias' => 'bac-lieu',
		            'description'=>'Bạc Liêu là một tỉnh thuộc duyên hải vùng bằng sông Cửu Long, nằm trên bán đảo Cà Mau, miền đất cực Nam của Việt Nam. Tỉnh Bạc Liêu được thành lập ngày 20 tháng 12 năm 1899 và chính thức hoạt động từ ngày 1 tháng 1 năm 1900.',
		            'image'	=> 'img-demo-6.jpg',
		            'latitude'=>'9.25889',
		            'longitude'=>'105.75194'
	        	],
	        	[
	        		'cate_id' => 3,
	        		'type_id' => 3,
		            'name' => 'Trà Vinh',
		            'alias' => 'bac-lieu',
		            'description'=>'Thành phố Trà Vinh, nằm bên bờ sông Tiền, là tỉnh lỵ tỉnh Trà Vinh. Thành phố Trà Vinh nằm trên Quốc lộ 53 cách Thành phố Hồ Chí Minh khoảng 202 km và cách thành phố Cần Thơ 100 km, cách bờ biển Đông 40 km, với hệ thống giao thông đường bộ và đường.',
		            'image'	=> 'img-demo-11.jpg',
		            'latitude'=>'9.95139',
		            'longitude'=>'106.33472'
	        	],
	        	[
	        		'cate_id' => 1,
	        		'type_id' => 3,
		            'name' => 'Sơn La',
		            'alias' => 'son-la',
		            'description'=>'Sơn La là tỉnh miền núi Tây Bắc Việt Nam, tỉnh có diện tích 14.125 km² chiếm 4,27% tổng diện tích Việt Nam, đứng thứ 3 trong số 63 tỉnh thành phố. Toạ độ địa lý: 20039’ - 22002’ vĩ độ Bắc và 103011’ - 105002’ kinh độ Đông.',
		            'image'	=> 'img-demo-16.jpg',
		            'latitude'=>'21.32722',
		            'longitude'=>'103.91417'
	        	],
	        	[
	        		'cate_id' => 2,
	        		'type_id' => 3,
		            'name' => 'Đảo Côn Lôn',
		            'alias' => 'dao-con-lon',
		            'description'=>'Côn Sơn, Côn Lôn hay Phú Hải là đảo lớn nhất trong quần đảo Côn Đảo, tỉnh Bà Rịa - Vũng Tàu, Việt Nam. Người phương Tây trước đây thường gọi đảo là Poulo Condor, xuất phát từ Pulo Condore. Đảo có diện tích 51,52 km²..',
		            'image'	=> 'img-demo-19.jpg',
		            'latitude'=>'8.69306',
		            'longitude'=>'106.60944'
	        	],
	        	[
	        		'cate_id' => 1,
	        		'type_id' => 5,
		            'name' => 'Yên Bái',
		            'alias' => 'yen-bai',
		            'description'=>'Yên Bái nằm ở vùng Tây Bắc tiếp giáp với Đông Bắc. Phía đông bắc giáp hai tỉnh Tuyên Quang và Hà Giang, phía đông nam giáp tỉnh Phú Thọ, phía tây nam giáp tỉnh Sơn La, phía tây bắc giáp hai tỉnh Lai Châu và Lào Cai. Trung tâm hành chính của tỉnh là thành phố Yên Bái, cách thủ đô Hà Nội 180 km.',
		            'image'	=> 'img-demo-2.jpg',
		            'latitude'=>'21.71667',
		            'longitude'=>'21.71667'
	        	],
	        	
	        	
        ]);
    }
}

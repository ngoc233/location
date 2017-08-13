<!DOCTYPE html>
<html>
<head>
	<title>location</title>
</head>
<body>

	<h1>Bài test php - danh lam thắng cảnh ( lấy đề tài ở Việt Nam)</h1>
	<img style="width: 100%" src="http://laraveldaily.com/wp-content/uploads/2015/06/laravel-logo-big.png">
	<h4>Đề tài</h4><span>Xây dựng website gồm 2 phần:
	Phần 1: Trang quản lý các địa danh, mỗi địa danh có thông tin về (tên, mô tả,
	1 ảnh, vĩ độ, kinh độ). Chức năng quản lý bao gồm: hiện danh sách, thêm,
	sửa, xoá.
	Phần 2: Bản đồ hiện các điểm ở phần 1 lên (sử dụng google map). Khi click
	vào 1 địa danh thì hiện ra cửa sổ (popup) cho phép xem tên và ảnh của địa
	danh. Có chức năng đóng cửa sổ lại.</span>
	<br>
	<h4>Yêu cầu:</h4><span>Sử dụng framework Laravel 5.3
	CSDL: MySQL
	Map: google map API (mới nhất)
	Design: Sử dụng bootstrap 3</span>
	<h4>Công nghệ:</h4><span>Sử dụng BootStrap 3</span>
	<br><span>Sử dụng Laravel5.4</span>
	<br><span>Sử google map API (mới nhất)</span>
	<br><span>Chuyển trang bằng ajax</span>
	<br><span>Isotope</span>
	<br>
	<h4>Cách cài đặt</h4>
	<span>Bước 1 : Chạy : <b>git clone https://github.com/ngoc233/location.git</b></span>
	<br>
	<span>Bước 2: Tạo DATABASE=location, USERNAME=root, PASSWORD= </span>
	<br>
	<span>Bước 3 :Chạy : <b>cp .env.example .env</b></span>
	<br>
	<span>Bước 4 :Chạy : <b>composer install</b></span>
	<br>
	<span>Bước 5 :Chạy :<b>php artisan migrate</b></span>
	<br>
	<span>Bước 6 :Chạy :<b>php artisan db:seed</b></span>
	<br>
	<span>Bước 7 :Chạy :<b>php artisan key:generate</b></span>
	<br>
	<span>Trang chủ <b>http://localhost/location</b></span>
	<br>
	<span>Đăng nhập với link <b>http://localhost/location/login</b> tài khoản :admin123@gmail.com ; mật khẩu :admin123456</span>
	<br>

</body>
</html>
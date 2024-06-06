<?php
	$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$act = explode('_',$act);
	if(count($act>1)){
		$act = $act[1];
	} else {
		$act = $act[0];
	}
	$site_seo = array(
		'san-pham'=>'Sản phẩm',
		'video'=>'Video',
		'giai-phap'=>'Giải pháp',
		'xuat-nhap-khau'=>'Xuất nhập khẩu',
		'tuyen-dung'=>'Tuyển dụng',
		'gioi-thieu'=>'Giới Thiêu',
		'video'=>'Video',
		'tin-tuc'=>'Tin tức',
		'lien-he'=>'Liên hệ',
	);
	switch($type){
		//-------------product-----------------
		case 'san-pham':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					$config_images = "false";
					$config_mota= "true";
					$config_noibat= "true";
					@define ( _width_thumb , 23);
					@define ( _height_thumb , 13 );
					@define ( _width_thumb1 , 455);
					@define ( _height_thumb1 , 430 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				case 'cat':
					$title_main = "Danh mục cấp 2";
					$config_images = "flase";
					$config_mota= "true";
					$config_noibat= "false";
					@define ( _width_thumb , 386);
					@define ( _height_thumb , 220);
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				default:
					$title_main = "Sản Phẩm";
					$config_images = "true";
					$config_img = "true";
					$config_mota= "true";
					$config_motatext= "false";
					$config_list = "true";
					$config_cat = "true";
					$config_item = "false";
					$config_sub = "false";
					$config_noibat= "true";
					$config_new= "true";
					$config_banchay= "false";
					$config_km= "flase";
					@define ( _width_thumb , 270);
					@define ( _height_thumb , 270);
					@define ( _style_thumb , 1 );
					$ratio_ = 2;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;

		case 'tin-tuc':
			switch($act){
				case 'list':
					$title_main = "Tin tức cấp 1";
					$config_images = "false";
					$config_mota= "false";
					$config_noibat= "false";
					@define ( _width_thumb , 338);
					@define ( _height_thumb , 214 );

					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				default:
					$title_main = "Tin tức";
					$config_images = "true";
					$config_img = "false";
					$config_file ="false";
					$config_mota= "true";	
					$config_list = "false";
					$config_noibat= "true";
					$config_noidung= "true";
					@define ( _width_thumb , 600);
					@define ( _height_thumb , 440);
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
		case 'tuyen-dung':
			switch($act){
				default:
					$title_main = "Tuyển dụng";
					$config_images = "true";
					$config_img = "false";
					$config_file ="false";
					$config_mota= "true";	
					$config_list = "false";
					$config_noibat= "true";
					$config_noidung= "true";
					@define ( _width_thumb , 600);
					@define ( _height_thumb , 440);
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
		case 'chinh-sach':
			switch($act){
				default:
					$title_main = "Chính sách";
					$config_images = "false";
					$config_img = "false";
					$config_file ="false";
					$config_mota= "false";	
					$config_list = "false";
					$config_noibat= "false";
					$config_noidung= "true";
					@define ( _width_thumb , 600);
					@define ( _height_thumb , 440);
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
		case 'du-an':
			switch($act){
				case 'list':
					$title_main = "Dự án cấp 1";
					$config_images = "false";
					$config_mota= "false";
					$config_noibat= "false";
					@define ( _width_thumb , 338);
					@define ( _height_thumb , 214 );

					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				default:
					$title_main = "Dự án";
					$config_images = "true";
					$config_img = "false";
					$config_file ="false";
					$config_mota= "true";	
					$config_list = "true";
					$config_noibat= "true";
					$config_noidung= "true";
					@define ( _width_thumb , 420);
					@define ( _height_thumb , 260);
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
		case 'giai-phap':
			switch($act){
				case 'list':
					$title_main = "Giải pháp cấp 1";
					$config_images = "false";
					$config_mota= "false";
					$config_noibat= "false";
					@define ( _width_thumb , 338);
					@define ( _height_thumb , 214 );

					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				default:
					$title_main = "Giải pháp";
					$config_images = "true";
					$config_img = "false";
					$config_file ="false";
					$config_mota= "true";	
					$config_list = "true";
					$config_noibat= "false";
					$config_noidung= "true";
					@define ( _width_thumb , 600);
					@define ( _height_thumb , 440);
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
		case 'xuat-nhap-khau':
			switch($act){
				case 'list':
					$title_main = "Xuất nhập khẩu cấp 1";
					$config_images = "false";
					$config_mota= "false";
					$config_noibat= "true";
					@define ( _width_thumb , 338);
					@define ( _height_thumb , 214 );

					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				default:
					$title_main = "Xuất nhập khẩu";
					$config_images = "true";
					$config_img = "false";
					$config_file ="false";
					$config_mota= "true";	
					$config_list = "true";
					$config_noibat= "false";
					$config_noidung= "true";
					@define ( _width_thumb , 600);
					@define ( _height_thumb , 440);
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;


		case 'bai-viet':
			switch($act){
				default:
					$title_main = "Bài viết";
					$config_images = "true";					
					$config_mota= "false";	
					$config_noibat= "true";
					$config_noidung= "true";
					@define ( _width_thumb , 52);
					@define ( _height_thumb , 46);
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;

		case 'album':
			switch($act){
					case 'list':
						$title_main = "Danh mục cấp 1";
						$config_images = "false";
						$config_noibat = "false";
						@define ( _width_thumb , 340 );
						@define ( _height_thumb , 264 );
						@define ( _style_thumb , 1 );
						@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
						$ratio_ = 1;
						break;
					default:
						$title_main = "Thư viện ảnh";
						$config_images = "true";
						$config_img = "true";
						$config_list = "false";
						$config_mota= "false";
						$config_truongkhac= "false";
						$config_noibat = "false";
						$config_noidung = "false";
						@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
						@define ( _width_thumb , 300 );
						@define ( _height_thumb , 250 );
						@define ( _style_thumb , 1 );
						$ratio_ = 2;
						break;
					}
					@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );		
			break;

		//-------------info------------------
		case 'gioi-thieu':
			$title_main = 'Giới thiệu';
			$config_images = "true";
			$config_ten = 'true';
			$config_mota = "true";
			$config_motatext = "false";
			$config_khac = "false";
			$config_noidung="true";
			$config_seo="true";
			@define ( _width_thumb , 485 );
			@define ( _height_thumb , 330 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;


		case 'lienhe':
			$title_main = 'Liên hệ';
			$config_ten = 'true';
			break;

		case 'bg_gt':
			$title_main = 'Ảnh nền giới thiệu';
			$links_ = "false";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 403 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			break;

		case 'bg_ft':
			$title_main = 'Ảnh nền footer';
			$links_ = "false";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 430);
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			break;

		case 'bg_header':
			$title_main = 'Ảnh nền header';
			$links_ = "false";
			@define ( _width_thumb , 1366);
			@define ( _height_thumb , 144);
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			break;

		case 'bocongthuong':
			$title_main = 'Bộ công thương';
			@define ( _width_thumb , 182);
			@define ( _height_thumb , 75);
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = 'true';
			break;

		case 'logo_debug':
			$title_main = 'logo_debug';
			@define ( _width_thumb , 200);
			@define ( _height_thumb , 115);
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'logo':
			$title_main = 'Logo';
			@define ( _width_thumb , 200);
			@define ( _height_thumb , 115);
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'banner':
			$title_main = 'Banner';
			@define ( _width_thumb , 570);
			@define ( _height_thumb , 100);
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			break;


		case 'banner_adv':
			$title_main = 'Banner';
			@define ( _width_thumb , 1366);
			@define ( _height_thumb , 240);
			@define ( _style_thumb , 1);
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			$links_ = "true";
			break;

		case 'popup':
			$title_main = 'Popup';
			$links_ = 'true';
			$config_hienthi = 'true';
			$config_noidung = "true";
			@define ( _width_thumb , 700 );
			@define ( _height_thumb , 500 );
			@define ( _style_thumb , 2);
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'favicon':
			$title_main = 'Favicon';
			@define ( _width_thumb , 40 );
			@define ( _height_thumb , 40 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		//-------------photo------------------
		case 'slider':
			$title_main = "Hình ảnh slider";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 636 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$config_ten = 'true';
			$links_ = "true";
			$mota_ = "false";
			break;
		case 'slider_mb':
			$title_main = "Hình ảnh slider moblie";
			@define ( _width_thumb , 980 );
			@define ( _height_thumb , 580 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$config_ten = 'true';
			$links_ = "true";
			$mota_ = "false";
			break;

		case 'video':
		    $title_main = "Video clip";
		    $config_noibat= "false";
		    $config_images='true';
		    $config_video='false';
		    @define ( _width_thumb , 300 );
			@define ( _height_thumb , 220 );
			@define ( _style_thumb , 1);
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'doitac':
		    $title_main = "Đối tác";
			@define ( _width_thumb , 170 );
			@define ( _height_thumb , 92 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$config_ten = 'true';
			$links_ = "true";
			break;

		case 'lkweb':
		    $title_main = "Liên kết mạng xã hội header";
		    $config_images='true';
			@define ( _width_thumb , 21 );
			@define ( _height_thumb , 21 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
			
		case 'lkweb_ft':
			$config_images='true';
		    $title_main = "Liên kết mạng xã hội footer";
			@define ( _width_thumb , 21 );
			@define ( _height_thumb , 21 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		case 'yahoo':
			$title_main = 'Hỗ trợ trực tuyến';
			$config_images = "false";
			@define ( _width_thumb , 82 );
			@define ( _height_thumb , 82 );
			@define ( _width_thumb1 , 150 );
			@define ( _height_thumb1 , 150 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		
		case 'breadcrumb-bg':
			$title_main = 'Banner trang trong';
			@define ( _width_thumb , 1366);
			@define ( _height_thumb , 200);
			@define ( _style_thumb , 1);
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		//--------------defaut---------------
		default: 
			$source = "";
			$template = "index";
			break;
	}

?>
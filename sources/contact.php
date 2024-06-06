<?php if(!defined('_source')) die("Error");
		
#=============seo==========
$d->reset();
$sql = "select title,keywords,description,photo,thumb from #_seo where type='seo_".$type_bar."' limit 0,1 ";
$d->query($sql);
$row_detail = $d->fetch_array();

$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
$share_facebook .= '<meta property="og:type" content="'.$type_og.'" />';
$share_facebook .= '<meta property="og:title" content="'.$row_detail['title'].'" />';
$share_facebook .= '<meta property="og:description" content="'.$row_detail['description'].'" />';
$share_facebook .= '<meta property="og:image" content="'.$http.$config_url.'/'._upload_hinhanh_l.$row_detail['photo'].'" />';

$title_bar = $row_detail['title'];
$keyword_bar = $row_detail['keywords'];
$description_bar = $row_detail['description'];

		$d->reset();
		$sql = "select noidung_$lang,title,keywords,description from #_company where type='lienhe' ";
		$d->query($sql);
		$row_detail = $d->fetch_array();
		
		if(!empty($_POST)){

			if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

			    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
			    $recaptcha_secret = $config_secretkey;
			    $recaptcha_response = $_POST['recaptcha_response'];

			    // Make and decode POST request:
			    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
			    $recaptcha = json_decode($recaptcha);

			    // Take action based on the score returned:
			    if ($recaptcha->score >= 0.5) {
			        // Verified - send email
			
					$file_name = images_name($_FILES['file']['name']);
					if($file_att = upload_image("file", 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|xlsx|jpg|png|gif|JPG|PNG|GIF', _upload_hinhanh_l,$file_name)){
						$data1['photo'] = $file_att;
						
					}

					$ten=htmlspecialchars($_POST['ten']);
					$diachi=htmlspecialchars($_POST['diachi']);
					$dienthoai=htmlspecialchars($_POST['dienthoai']);
					$email=htmlspecialchars($_POST['email']);
					$tieude=htmlspecialchars($_POST['tieude']);
					$noidung=htmlspecialchars($_POST['noidung']);


					include_once "phpMailer/class.phpmailer.php";	
					$mail = new PHPMailer();
					$mail->IsSMTP(); // Gọi đến class xử lý SMTP
					$mail->Host       = $config_ip; // tên SMTP server
					$mail->SMTPAuth   = true;   
					if($config_gmail == true){
						$mail->Port = $config_port;
						$mail->SMTPSecure = $config_smtp;
					}
					$mail->Username   = $config_email; // SMTP account username
					$mail->Password   = $config_pass;  

					//Thiet lap thong tin nguoi gui va email nguoi gui
					$mail->SetFrom($config_email,$row_setting['ten_'.$lang]);
					
					$mail->AddAddress($row_setting['email'],$row_setting['ten_'.$lang]);
					$mail->AddAddress($_POST['email'],$ten);
					
					/*=====================================
					 * THIET LAP NOI DUNG EMAIL
			 		*=====================================*/

					//Thiết lập tiêu đề
					$mail->Subject    = '['.$ten.']';
					$mail->IsHTML(true);
					//Thiết lập định dạng font chữ
					$mail->CharSet = "utf-8";	
						$body = '<table>';
						$body .= '
							<tr> 
								<th colspan="2">&nbsp;</th>
							</tr>

							<tr>
								<th colspan="2">Thư liên hệ từ website <a href="'.$http.$config_url.'">www.'.$config_url.'</a></th>
							</tr>

							<tr>
								<th colspan="2">&nbsp;</th>
							</tr>

							<tr>
								<th>Họ tên :</th><td>'.$ten.'</td>
							</tr>

							<tr>
								<th>Email :</th><td>'.$email.'</td>
							</tr>

							<tr>
								<th>Địa chỉ :</th><td>'.$diachi.'</td>
							</tr>

							<tr>
								<th>Điện thoại :</th><td>'.$dienthoai.'</td>
							</tr>
							<tr>
								<th>Tiêu đề :</th><td>'.$tieude.'</td>
							</tr>';
							
						$body .= '<tr>
								<th>Nội dung :</th><td>'.$noidung.'</td>
							</tr>';
						$body .= '</table>';


						
						$data1['ten'] = $ten;
						$data1['diachi'] = $diachi;
						$data1['dienthoai'] = $dienthoai;
						$data1['email'] = $email;
						$data1['tieude'] = $tieude;
						$data1['noidung'] = $noidung;
						$data1['stt'] = 1;
						$data1['view'] = 0;

						$data1['ngaytao'] = time();
						$d->setTable('contact');
						$d->insert($data1);

							
						$mail->Body = $body;

						if($data1['photo']){
							$mail->AddAttachment(_upload_hinhanh_l.$data1['photo']);
						}
				
						
						if($mail->Send())
						{	
							transfer(_guibinhluanthanhcong,  $http.$config_url);
						} else {
							transfer(_hethongloi,  $http.$config_url);
						}

			    } else {
			        transfer(_loicaptcha,  $http.$config_url);
			    }

			}else{transfer(_loicaptcha,  $http.$config_url);}

		}
				
	
?>
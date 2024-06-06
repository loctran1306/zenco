<?php  if(!defined('_source')) die("Error");
	
if(isAjaxRequest()){
	include _template."giohang_tpl.php";
	die;
}else{

	if(count($_SESSION['cart'])>0)
	{
	$d->reset();
	$sql_thanhpho = "select id,ten from #_tinh where hienthi=1 order by stt,id asc";
	$d->query($sql_thanhpho);
	$thanhpho = $d->result_array();	
	
	$d->reset();
	$sql_thongtin_user = "select * from #_user where id='".$_SESSION['login']['id']."'";
	$d->query($sql_thongtin_user);
	$thongtin_user = $d->fetch_array();

	if(!empty($_POST)){	
	
		$giaphi=$_POST['phigiaohang'];
		$ngaygiao=$_POST['ngaynhan'];
		$hoten=$_POST['hoten'];
		$dienthoai=$_POST['dienthoai'];
		$diachi=$_POST['diachi'];
		$email=$_POST['email'];
		$noidung=$_POST['noidung'];
		$thanhpho=$_POST['thanhpho'];
		$quan=$_POST['quan'];
		$httt=$_POST['httt'];
		$phuong=$_POST['phuong'];
		$ip = 0;
		$id_user = $_SESSION['login']['id'];
		$tinh_ht=get_tinh($thanhpho);
		$quan_ht=get_quan($quan);	

		//validate dữ liệu
		$hoten = htmlspecialchars($hoten);
		$dienthoai = htmlspecialchars($dienthoai);	
		$diachi = htmlspecialchars($diachi);	
		$email = htmlspecialchars($email);	
		$noidung = htmlspecialchars($noidung);	
		$httt=htmlspecialchars($httt);



		$tonggia = get_order_total();					

		$ngaydangky = time();
		$ngaycapnhat = time();
		$nguongoc = '0';
		
		
		$coloi=false;		
		if ($hoten == NULL) { 
			$coloi=true; $error_hoten = "Nhập họ tên<br>";
		} 
		if ($dienthoai == NULL) { 
			$coloi=true; $error_dienthoai = "Nhập số điện thoại<br>";
		}
		if ($thanhpho == NULL) { 
			$coloi=true; $error_thanhpho = "Chọn tỉnh thành phố<br>";
		}
		if ($quan == NULL) { 
			$coloi=true; $error_quan = "Chọn quận huyện<br>";
		}
		if ($diachi == NULL) { 
			$coloi=true; $error_diachi = "Nhập địa chỉ<br>";
		}			
		
		if ($coloi==FALSE) 
		{
			#Mẫu mã đơn hàng VD:05032016NN101
			$donhangmau = date('dmY').'NN';
			
			#Kiểm tra mã đơn hàng lớn nhất trong ngày
			$d->reset();
			$sql = "select id,madonhang from #_donhang where madonhang like '$donhangmau%' order by id desc limit 0,1";
			$d->query($sql);
			$max_order = $d->fetch_array();
			
			#Nếu không tồn tại đơn hàng nào trong ngày hôm nay
			if(empty($max_order['id']))
			{
				$songaunhien = 101;
			}
			else
			{
				(int)$songaunhien =  substr($max_order['madonhang'],10)+1;
			}
			$mahoadon = date('dmY').'NN'.$songaunhien;
			

			$data['madonhang'] = $mahoadon;
			$data['hoten'] = $hoten;
			$data['dienthoai'] = $dienthoai;
			$data['diachi'] = $diachi;
			$data['email'] = $email;
			$data['httt'] = $httt;
			$data['tonggia'] = $tonggia;
			$data['thanhpho'] = $thanhpho;
			$data['quan'] = $quan;
			$data['phuong'] = $phuong;
			$data['noidung'] = $noidung;
			$data['ngaytao'] = $ngaydangky;
			$data['tinhtrang'] = 1;
			$data['nguongoc'] = $nguongoc;

			$data['ngaycapnhat'] = $ngaycapnhat;

			$data['htgh'] = $htgh;
			$data['ip'] = $ip;
			$data['export'] = 1;
			$data['id_user'] = $id_user;
			$data['phivanchuyen'] = $giaphi;

			
		}		
		$d->setTable('donhang');	
		if($d->insert($data))
		{
			
			if(is_array($_SESSION['cart']))
			{
				$max = count($_SESSION['cart']);
				$co = true;
				foreach($_SESSION['cart'] as $k=>$v){
					
					$pid=$v['productid'];
					$q=$v['qty'];
					$size=$v['size'];
					$mausac=$v['color'];
					$pmasp=get_code($pid);					
					$pname=get_product_name($pid,$lang);
					$info=getProductInfo($pid);
					$pphoto=get_product_photo($pid);
					$pgia = $info['gia']; 
					$pgiakm = $info['giakm']; 
					$image =$info['photo'];
					$ptonggia = get_price($pid)*$q;
					$pgiamua=get_price($pid);
					
					if($q==0) continue;
					$data2['madonhang'] = $mahoadon;
					$data2['masp'] = $pmasp;
					$data2['ten'] = $pname;
					$data2['gia'] = $pgiamua;
					$data2['soluong'] = $q;
					$data2['tonggia'] = $ptonggia;
					$data2['photo'] = $image;
					$data2['ngaytao'] = $ngaydangky;
					$data2['id_sanpham'] = $pid;
					$data2['size'] = $size;
					$data2['mausac'] = $mausac;


					$d->setTable('chitietdonhang');	
					if($d->insert($data2))
					{
						$co = true;
					}	
					else
					{
						
						transfer(_chuaduocgui."<br>"._dienthongtin."<br>"._camon, "thanh-toan.html");
					}
				}
				if($co == true)
				{
					#Thông tin công ty
					$sql_company = "select * from #_setting limit 0,1";
					$d->query($sql_company);
					$row_setting = $d->fetch_array();	

					$d->reset();
				    $sql_banner_top= "select thumb_$lang from #_photo where type='logo'";
				    $d->query($sql_banner_top);
				    $banner_top = $d->fetch_array();
									
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
			
					//Thiết lập thông tin người gửi và email người gửi
					$mail->SetFrom($config_email,$row_setting['ten_'.$lang]);
					
					//Thiết lập thông tin người nhận
					$mail->AddAddress($email,$hoten);
					$mail->AddAddress($row_setting['email'],$row_setting['ten_'.$lang]);
					
					
					//Thiết lập email nhận email hồi đáp
					//nếu người nhận nhấn nút Reply
					$mail->AddReplyTo($email,'Đơn hàng từ '.$row_setting['ten_'.$lang]);
					/*=====================================
					 * THIET LAP NOI DUNG EMAIL
					*=====================================*/
					//Thiết lập tiêu đề
					$mail->Subject    = "Đơn hàng từ ".$hoten;
					$mail->IsHTML(true);
					//Thiết lập định dạng font chữ
					$mail->CharSet = "utf-8";
					$header.='<table width="100%" border="0" style="border-collapse: collapse;"><tr><td colspan="6"><table style="width:100%;background: #a5a2a2; color: #FFF"><tr>';
			$header.='<td style="padding:7px; text-align:left;width:50%;">';
			$header.='<img src="'.$http.$config_url.'/'._upload_hinhanh_l.$banner_top['thumb_'.$lang].'" alt="'.$row_setting['ten_'.$lang].'" style="margin-left:10px;max-width:100px;" />';
			$header.='</td>';
			$header.='<td style="padding:7px; text-align:right;">';
			//$header.='<p><img src="http://nina.net.vn/phone_2_icon.png" style="margin-right:10px;" />';
			$header.='<strong style="">Hotline:</strong>';
			$header.='<strong style="color:#FF0;display:block;">'.$row_setting['hotline'].'</strong>';
			$header.='</p>';
			$header.='</td>';
			$header.='</tr></table></td></tr>';
            //END Header mail
            $footer = '';
            ///Footer mail
            $footer.='<tr><td colspan="6"><table style="width:100%;border-top:1px solid #CCC; background: #a5a2a2; color: #FFF"><tr>';
			$footer.='<td style="padding:7px; text-align:center;width:20%;">';
			$footer.='<img style="width:100px;" src="'.$http.$config_url.'/'._upload_hinhanh_l.$banner_top['thumb_'.$lang].'" alt="'.$row_setting['ten_'.$lang].'"/>';
			$footer.='</td>';
			$footer.='<td style="padding:7px; text-align:left;width:80%"><p class="alviss_footer"><b>'.$row_setting['ten_'.$lang].'</b><br>
			Địa chỉ: '.$row_setting['diachi_'.$lang].'<br/>			
			Điện thoại: '.$row_setting['hotline'].'<br/>			
			Email: '.$row_setting['email'].'<br/>
			Website: '.$row_setting['website'].'<br/>
			<br></p>';
			$footer.='</td>';
			$footer.='</tr></table></td></tr></table>';
            //END footer mail
			$body = '<tr><td colspan="5">
				<p>Cảm ơn quý khách đã đặt hàng dưới đây là thông tin đơn hàng của quý khách:</p></td></tr>
							 
				  <tr style="height:40px; padding:10px;">
					<td colspan="2" style="line-height:40px;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;">Mã đơn hàng: <b>' .$mahoadon. '</b></td>
					<td colspan="3" style="border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;line-height:25px;">
						<table>
						<tr><td>Ngày đặt hàng: <b>' . date('d/m/Y', time()) . '</b><td></tr>
						<tr><td>Trạng thái đơn hàng: Mới đặt<td></tr>
						</table>
					</td>
				  </tr>
				  <tr>
					<td colspan="5" style="line-height:25px;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;">
						<table><tr><td><b>THÔNG TIN KHÁCH HÀNG</b></td></tr>
						<tr><td>Họ tên: ' . $hoten. '</td></tr>
						<tr><td>Địa chỉ: ' .$diachi.'-'.$quan_ht.'-'.$tinh_ht.'</td></tr>
						<tr><td>Điện thoại: ' . $dienthoai. '</td></tr>
						<tr><td>Email: ' . $email. '</td></tr></table>
					</td>					
				  </tr>				 				 
						<tr>
							<td style="text-align:center;width:10%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;"><b>Hình ảnh</b></td>
							<td style="text-align:center;width:30%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;"><b>Tên sản phẩm</b></td>							
							<td style="text-align:center;width:15%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;"><b>Giá</b></td>
							<td style="text-align:center;width:15%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;"><b>Số lượng</b></td>
							<td style="text-align:center; width:20%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;"><b>Thành tiền</b></td>
						</tr>';
			## Tao du lieu don hang				
				$max=count($_SESSION['cart']);
					foreach($_SESSION['cart'] as $k=>$v){
							$pid=$v['productid'];
							$q=$v['qty'];
							$s=$v['size'];
							$info=getProductInfo($pid);
							$mausac=$v['color'];					
							$pname=get_product_name($pid,$lang);	
							if($q==0) continue;
							
							 $body.='<tr>
									<td style="width:10%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;"><img src="'. $http.$config_url.'/'._upload_product_l.$info['photo'].'" height="100"/></td>
									<td style="width:30%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;">
										<table>
											<tr><td>' . $info['ten_'.$lang] . '</td></tr>';
											// if($s!=''){
											// 	$body.='<tr><td> Màu :' .getColorById($mausac). '</td></tr>';}
											// if($mausac!=''){
											// 	$body.='<tr><td> Kích thước :' . getSizeById($size). '</td></tr>';}
										$body.='</table>
									</td>							
									<td style="text-align:center;width:15%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;">' . number_format(get_price($pid), 0, ',', '.') . '&nbsp;VNĐ</td>
									<td style="text-align:center;width:15%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;">' . $q . '</td>
									<td style="text-align:center; width:20%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;">' . number_format(get_price($pid) * $q, 0, ',', '.') . '&nbsp;VNĐ</td>
								</tr>';

				}


				$body.='<tr><td colspan="5" style="text-align:right; border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;" >Tổng cộng: <b>' . number_format(get_order_total(), 0, ',', '.') . '&nbsp;VNĐ</b></td></tr>';   

			    $body.='<tr><td colspan="5" style="text-align:right; border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;" >Tổng thanh toán: <b>' . number_format(get_order_total(),0, ',', '.') . '&nbsp;VNĐ</b></td></tr>';

				$body1 = '<tr><td colspan="5"><table>';
				$body1 .= '<tr><th>Nội dung:</th><td>'.$noidung.'</td></tr>';
				$body1 .= '</table></td></tr>';

				$body2 = $header.$body.$body1.$footer;

			   #------------Chi tiết đơn hàng---------------------
					$mail->Body = $body2;
					if($mail->Send())
					{
						unset($_SESSION['cart']);
						transfer(_danghangthanhcong, $http.$config_url);
					}
					else
						transfer(_xinloiquykhach."<br>"._hethongloi,  $http.$config_url);
					}
            }
			else{
				transfer(_donhangchuacosanpham."<br>"._chonsanphamdemuahang."<br>"._camon,  $http.$config_url);
			}
		}
		else
			transfer(_xinloiquykhach."<br>"._hethongloi,  $http.$config_url);	
		}
	}

	else
	{
		transfer(_chuamuasanpham."<br/>"._camon."!!!.",  $http.$config_url);
	}
}
	
?>
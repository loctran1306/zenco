<?php if(!defined('_lib')) die("Error");
function isAjaxRequest(){
	if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') 
		return true;
	return false;
}
function get_tinh($pid){
		global $d, $row;
		$sql = "select ten from table_tinh where id=$pid";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row['ten'];
}
function get_quan($pid){
		global $d, $row;
		$sql = "select ten from table_quan where id=$pid ";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row['ten'];
}
function get_huyen($pid){
		global $d, $row;
		$sql = "select ten from table_place_ward where id=$pid ";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row['ten'];
}

function get_code($pid){
	global $d, $row;
	$sql = "select masp from table_product where id=66";
	$d->query($sql);
	$row = $d->fetch_array();
	return $row['masp'];
}

		
function get_product_name($pid,$lang){
	global $d, $row,$lang;
	$sql = "select ten_$lang as ten from #_product where id=$pid";
	$d->query($sql);
	$row = $d->fetch_array();
	return $row['ten'];
}
function get_product_size($pid){
	global $d, $row;
	$sql = "select size from #_product where id=$pid";
	$d->query($sql);
	$row = $d->fetch_array();
	return $row['size'];
}
function get_product_color($pid){
	global $d, $row;
	$sql = "select mausac from #_product where id=$pid";
	$d->query($sql);
	$row = $d->fetch_array();
	return $row['mausac'];
}
function getProductInfo($pid){
	global $d, $row,$lang;
	$sql = "select * from #_product where id=$pid";
	$d->query($sql);
	return $d->fetch_array();
	
}

function get_thumb($pid){
	global $d, $row;
	$sql = "select thumb from table_product where id='".$pid."' ";
	$d->query($sql);
	$row = $d->fetch_array();
	return $row['thumb'];
}

function get_tong_tien($madonhang=0){
	global $d;
	
	if($madonhang>0){
		$d->reset();

		$sql="select * from #_chitietdonhang where madonhang='".$madonhang."'";
		$d->query($sql);
		$result=$d->result_array();
		$tongtien=0;
		for($i=0,$count=count($result);$i<$count;$i++) { 
			if($result[$i]['giakm']!=0){
				$tongtien+=	$result[$i]['giakm']*$result[$i]['soluong'];	
			}	
			else
			{
				$tongtien+=	$result[$i]['gia']*$result[$i]['soluong'];	
			}
		}
		return $tongtien;
	}else return 0;
}

function get_product_photo($pid){
	global $d, $row;
	$sql = "select thumb from #_product where id=$pid";
	$d->query($sql);
	$row = $d->fetch_array();
	return $row['thumb'];
}

function get_price($pid){
	global $d, $row;
	$sql = "select * from table_product where id=$pid";
	$d->query($sql);
	$row = $d->fetch_array();
	if($row['giacu']!=0){$price=$row['giaban'];}else{$price=$row['giaban'];}
	return $price;
}

function remove_product($pid,$size,$mausac){
	$pid=intval($pid);
	$max=count($_SESSION['cart']);
	
	for($i=0;$i<$max;$i++){
		if($pid==$_SESSION['cart'][$i]['productid'] and $size==$_SESSION['cart'][$i]['size'] and $mausac==$_SESSION['cart'][$i]['mausac']){
			unset($_SESSION['cart'][$i]);
			break;
		}
	}
	$_SESSION['cart']=array_values($_SESSION['cart']);
}

function get_order_total(){
	
	$sum=0;
	
	foreach($_SESSION['cart'] as $k=>$v){
		$pid=$v['productid'];
		$q=$v['qty'];
		$price=get_price($pid);
		$sum+=$price*$q;
		
	}
	return $sum;

}

function get_total(){
	$num = 0;
	if(isset($_SESSION['cart'])){
		
		foreach($_SESSION['cart'] as $k=>$v){
			$num+=$v['qty'];
		}
	}
	return $num;
}
	
function addtocart($pid,$q,$color,$size){

	if($pid<1 or $q<1) return;
	$code = md5($pid.$color.$size);
	if(is_array(@$_SESSION['cart'])){
		if(isset($_SESSION['cart'][$code])){
			$_SESSION['cart'][$code]['qty'] = $_SESSION['cart'][$code]['qty']+$q;
		}else{
			
			$_SESSION['cart'][$code]['productid']=$pid;
			$_SESSION['cart'][$code]['qty']=$q;
			$_SESSION['cart'][$code]['color']=$color;
			$_SESSION['cart'][$code]['size']=$size;
		}
	}
	else{
		$_SESSION['cart'] = array();
		$_SESSION['cart'][$code]['productid']=$pid;
		$_SESSION['cart'][$code]['qty']=$q;
		$_SESSION['cart'][$code]['color']=$color;
		$_SESSION['cart'][$code]['size']=$size;
	}
}

function product_exists($pid,$size,$mausac){
	$pid=intval($pid);
	$max=count($_SESSION['cart']);
	$flag=0;
	for($i=0;$i<$max;$i++){
		if($pid==$_SESSION['cart'][$i]['productid'] and $size==$_SESSION['cart'][$i]['size'] and $mausac==$_SESSION['cart'][$i]['mausac']){
			$flag=1;
			break;
		}
	}
	return $flag;
}
if(!function_exists("myformat")){
   function myformat($num,$ext='VNĐ',$default = false){
       if($num==0){
         if(!$default){
             return 0;
         }else{
             return myconfig("default_price");
         }
       }else{
           return @number_format($num, 0,'', '.')." ".$ext;
       }
    }
}
?>
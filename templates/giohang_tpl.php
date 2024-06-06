<?php

	if(!isAjaxRequest()){

		if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
			remove_product($_REQUEST['pid']);
		}
		else if($_REQUEST['command']=='clear'){
			unset($_SESSION['cart']);
		}
		else if($_REQUEST['command']=='update'){
			$max=count($_SESSION['cart']);
			for($i=0;$i<$max;$i++){
				$pid=$_SESSION['cart'][$i]['productid'];
				$q=intval($_REQUEST['product'.$pid]);
				if($q>0 && $q<=99999){
					$_SESSION['cart'][$i]['qty']=$q;
				}
				else{
					$msg='Some proudcts not updated!, quantity must be a number between 1 and 99999';
				}
			}
		}
	}
?>
<script language="javascript">
	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}
	function quaylai()
	{
		history.go(-1);
	}

</script>

<?php if(!isAjaxRequest()){?>
<div class="wrap_background_aside mgt-20 mgb-30 clearfix">
    <div class="margin-auto">
		<div class="shop">
			<div class="box_containerlienhe"> 
				<div class="content" id="box-shopcart" style="width:100%"><?php } ?>
				<div class="left_giohang">
					<div class="thanh_gh"><h3><?=_giohang?></h3></div>
					<form name="form1" method="post">
						<input type="hidden" name="pid" />
						<input type="hidden" name="command" /> 
						<table id="giohang" class="table table-bordered " style="margin-top:10px;background:rgba(255, 255, 255, 1);">
					    	<?php if(is_array($_SESSION['cart'])){
					            	echo '<thead style="background:rgba(255, 255, 255, 1);"><th align="center" class="hidden-xs"></th><th>'._pname.'</th><th align="center">'._price.'</th><th align="center">'._quantity.'</th><th align="center" class="hidden-xs">'._total_price.'</th><th align="center">'._congcu.'</th></thead>';
								foreach($_SESSION['cart'] as $k=>$v){
									$pid=$v['productid'];
									$code  =$k;
									$color = $v['color'];
				                    $size = $v['size'];
									$q=$v['qty'];
									$pmasp=get_code($pid);					
									$pname=get_product_name($pid,$lang);
									$info= getProductInfo($pid);
									 //dump($info);
									$image = _upload_product_l.$info['photo'];
									$image_thumb = _upload_product_l.'100x70x2/'.$info['photo'];
									if($q==0) continue;
								?>

					            <tr>
						            <td width="10%" align="center" class="hidden-xs"><a target="_blank"  href="<?= $info['tenkhongdau'] ?>"><img src="<?= $image_thumb ?>" class='img-responsive' /></a></td>
						           	<td width="20%"><a class="name" target="_blank" href="<?= $info['tenkhongdau'] ?>"><?= $pname ?></a>
						            <?php
										if ($color) {
											$colors = getColorByProductId($pid);
											echo '<div class="product-option"><label>'._mausac.': </label>&nbsp;';
											echo '<select onchange="updateCart();" name="color[' . $code . ']">';
											foreach ($colors as $k2 => $v2) {
												echo '<option '.(($v2['id_color'] == $color) ? 'selected' : '').' value="' . $v2['id_color'] . '">' . $v2['ten'] . '</option>';
											}
											echo '</select>';
										
											echo '<div class="clear"></div></div>';
										}
										if ($size) {
											$sizes = getSizeByProductId($pid);
											echo '<div class="product-option"><label>'.Size.': </label>&nbsp;';
											echo '<select onchange="updateCart();" name="size[' . $code . ']">';
											foreach ($sizes as $k2 => $v2) {
												echo '<option '.(($v2['id_size'] == $size) ? 'selected' : '').' value="' . $v2['id_size'] . '">' . $v2['ten'] . '</option>';
											}
											echo '</select>';
										
											echo '<div class="clear"></div></div>';
										}
									?>

						            </td>

						            <td width="10%" align="center">
			                            <?php
				                          /* if ($info['giaban'] > 0) {
				                                echo '<div class="price-old">' . number_format($info['giaban'],0, ',', '.').'</div>';
												echo '<div class="price-real">' .number_format($info['giakm'],0, ',', '.').' </div>';
				                            }else{
				                           		 echo '<div class="price-real">' .number_format($info['giaban'],0, ',', '.').'</div>';
											}*/
											 echo '<div class="price-real">' . number_format($info['giaban'],0, ',', '.').'</div>';
			                            ?>
						            </td>

						            <td width="10%" align="center"><input onchange="updateCart();" type="number" name="product[<?=$code?>]" value="<?=$q?>" maxlength="3" min="1" max="999" size="2" style="text-align:center; border:1px solid #F0F0F0" />&nbsp;
						                <p class="visible-xs" style="display:none;font-size:15px;"><?= number_format(get_price($pid) * $q, 0, ',', '.') ?></p>
						            </td>  

						            <td width="18%" align="center" class="price-total hidden-xs"><?= number_format(get_price($pid) * $q, 0, ',', '.') ?></td>  

						            <td width="10%" align="center">
			                           <a href="javascript:updateCart()" data-toggle="tooltip" title="Cập nhật"><i class='glyphicon glyphicon-refresh'></i></a>
			                            &nbsp;&nbsp;
			                           <a href="javascript:deleteCart('<?= $k ?>')" data-toggle="tooltip" title="Xóa"><i class="glyphicon glyphicon-trash"></i></a>

						            </td>
					           </tr> 

					    	<?php } ?>

					            <tr>
					            	<td colspan="6" style="padding:0">
					                    <h3 class="all-cart-price"><?=_total_price?>: <span id="all_hoadon"><?= number_format(get_order_total(), 0, ',', '.') ?>&nbsp;VNĐ</span></h3>
					                </td>
					            </tr>
					           <?/* <tr>
					                <td colspan="6" style="padding:0">
					                    <h3 class="all-cart-price">Phí vận chuyển: <span id="all_ship"> <?= number_format($_SESSION['phivanchuyen'], 0, ',', '.') ?>&nbsp;VNĐ</span></h3>
					                </td>
					            </tr>
					            <tr>
					                 <td colspan="6" style="padding:0">
					                    <h3 class="all-cart-price"><?=_total_price?>: <span id="all_thanhtoan"> <?= number_format(get_order_total()+$_SESSION['phivanchuyen'], 0, ',', '.') ?>&nbsp;VNĐ</span></h3>
					                </td>
					            </tr>*/?>

					           <?/* <tr>
					            	<td colspan="6" align="right">
					                    <button class="btn button" type="button" onclick="window.history.back();"><i class="fa fa-shopping-bag"></i>&nbsp;<?=_muatiep?></button>      
					                     <button class="btn button" type="button" onclick="clearCart()"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;<?= _xoatatca ?></button>
					                </td>
					            </tr>*/?>

					            <td colspan="6" align="right">
					            	<button class="btn button button-button" type="button" onclick="clearCart()"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;<?= _xoatatca ?></button>
				                    <button class="btn button " type="button" onclick="window.history.back();"><i class="fa fa-shopping-bag"></i>&nbsp;<?=_muatiep?></button>      
				                     
				                     <a class="btn button" href="thanh-toan"><i class="fa fa-money"></i> <?=_thanhtoan?></a>
				                </td>
									
							<?php }else{
								echo "<tr bgColor='#FFFFFF'><td>Không có sản phẩm!</td>";
							} ?>

					    </table>		
				    </form>
			  		<?php if(!isAjaxRequest()){?>
			    </div>
				</div>
			</div>
		</div>
		<?/*
		<div class="right_giohang">
			<div class="box_containerlienhe shop">
				<div class="content ">
					<div class="cus-info">
					    <form method="post" name="frm_order" id="frm_order" class="form-horizontal from-thanhtoan" action="" enctype="multipart/form-data" role="form">        
							<div class="">
								<div class="bill_form">
						         	<div class="thanh_gh"><h3><?=_thongtinthanhtoan?></h3></div>
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-12 control-label hidden"><?=_fullname?><span>*</span></label>
										<div>
											<div class="col-sm-12">
												<input class="t form-control" name="hoten" id="hoten" type="text" value="" placeholder="Họ tên" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-12 control-label hidden"><?=_dienthoai?><span>*</span></label>
										<div class="col-sm-12">
											<input class="t form-control" name="dienthoai" id="dienthoai" type="text" value="" placeholder="Điện thoại" />
										
										</div>
									</div>
									<div class="form-group">
						            	<label for="inputEmail3" class="col-sm-12 control-label hidden"><?=_tinhthanhpho?><span>*</span></label>

						                <div class="col-sm-12">
							                <select name="thanhpho" id="thanhpho" class="sl form-control">
							                	<option value=""><?=_tinhthanhpho?></option>
							                    <?php foreach($thanhpho as $k){ ?>
							                    	<option value="<?=$k['id']?>"><?=$k['ten']?></option>
							                    <?php }?>
							                </select>
						                </div>
						            </div>

						            <div class="form-group">
						            	<label for="inputEmail3" class="col-sm-12 control-label hidden"><?=_quanhuyen?><span>*</span></label>
						                <div class="col-sm-12">
							                <select name="quan" id="quan" class="sl form-control">
							                	<option value=""><?=_quanhuyen?></option> 
							                </select>
						                </div>
						            </div>


									<div class="form-group">
										<label for="inputEmail3" class="col-sm-12 control-label hidden" ><?=_address?><span>*</span></label>
										<div class="col-sm-12">
											<input class="t form-control" name="diachi"  id="diachi" type="text" value="" placeholder="Địa chỉ" />
										
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-12 control-label hidden">E-Mail<span>*</span></label>
										<div class="col-sm-12">
											<input class="t form-control" name="email" id="email" type="email" value="" placeholder="Email" />
										
										</div>
									</div>
						            <div class="form-group">
										<label class="col-sm-12 control-label hidden"><?=_ghichu?><span></span></label>
										<div class="col-sm-12">
											<textarea name="noidung"  class="form-control ax" style="resize:none" cols="50" rows="4" placeholder="Nội dung" ></textarea>
										
										</div>
									</div>
								</div>
								<div class='clearfix'></div>
							</div>
							<hr />
							<div class="clear"></div>
							<div class="clearfix"></div>
						    <div style="text-align: right;">	
						        <button title='tiếp tục' class="btn xbtn" type="button" onclick="check();"  value="" style="cursor:pointer;"/><?=_xacnhanthanhtoan?> <i class="fa fa-sign-in"></i>
						    </div>
						</form>
				 	</div>  
			 	</div>
		  	</div>
		 	<div class="clear"></div> 
		</div>*/?>
	</div>
</div>
  

<?php }?>

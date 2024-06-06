<?php 
	include_once "ajax_config.php";
	$id = (int)$_POST['id'];
	$qty = (int)$_POST['qty'];
	$color = (string)$_POST['color'];
	$size = (string)$_POST['size'];
	$info_cart=getProductInfo($id);
?>
<div class="popup_overlay"></div>
<div class="modal-dialog">
  <div class="modal-content">
     <button type="button" class="close" data-dismiss="modal" data-backdrop="false" aria-label="Close" style="position: relative; z-index: 9;"><span aria-hidden="true">×</span></button>
     <div class="row row-noGutter">
        <div class="modal-left col-sm-12 col-lg-12 col-md-12">
           <h3 class="title"><i class="fa fa-check"></i> <?=_sanphamvuaduocthem?> <span class="hidden-xs"><?=_vaogiohang?></span></h3>
           <div class="modal-body">
              <div class="media">
                 <div class="media-left thumb_img">
                    <div class="thumb-1x1"><img src="<?=_upload_product_l?><?=$info_cart['photo']?>" alt="<?=$info_cart['ten_'.$lang]?>"></div>
                 </div>
                 <div class="media-body body_content">
                    <div class="product-title"><?=$info_cart['ten_'.$lang]?></div>
                    <div class="product-new-price"><span><?php if($info_cart['giaban']==0) echo _lienhe; else echo number_format ($info_cart['giaban'],0,",",".")."đ";?></span></div>
                    <?/*<div class="variant_title"><span>38</span></div>*/?>
                 </div>
              </div>
           </div>
        </div>
        <div class="modal-right col-sm-12 col-lg-12 col-md-12">
           <h4 class="title right_title"><a href="gio-hang"><i class="fa fa-caret-right"></i> <?=_giohanghienco?> (<span class="cart-popup-count"><?=get_total()?></span>) <?=_sanpham?> </a></h4>
           <a href="thanh-toan" class="btn btn-primary checkout_button btn-full"><?=_tienhanhthanhtoan?> <i class="fa fa-arrow-right"></i></a>
        </div>
     </div>
  </div>
</div>

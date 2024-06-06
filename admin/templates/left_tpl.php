<div class="logo">
  <span class="close">
      <i class="fa fa-minus-square" aria-hidden="true"></i> Close
  </span> 
</div>
<div class="sidebarSep mt0"></div>
<!-- Left navigation -->
<ul id="menu" class="nav">
  <li class="dash" id="menu1"><a class=" active" title="" href="index.php"><span>Trang chủ</span></a></li>
  <?/* <li class="categories_li <?php if($_GET['com']=='tinhthanh' || $_GET['com']=='gia' || $_GET['com']=='tinhthanh') echo ' activemenu' ?>" id="menu_th"><a href="" title="" class="exp"><span>Thành phố / Quận Huyện</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['com']=='tinhthanh'&&$_GET['act']=='man_cat') echo ' class="this"' ?>><a href="index.php?com=tinhthanh&act=man_cat">Quản lý Tỉnh / Thành phố</a></li>
      <li<?php if($_GET['com']=='tinhthanh'&&$_GET['act']=='man') echo ' class="this"' ?>><a href="index.php?com=tinhthanh&act=man">Quản lý Quận / Huyện</a></li>
    </ul>
  </li>*/?>
  <?php /*|| $_GET['com']=='order' || $_GET['com']=='excel'*/?>
  <?/*
  <li class="categories_li <?php if($_GET['com']=='tags') echo ' activemenu' ?>" id="menu_tg"><a href="" title="" class="exp"><span>Tags</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['com']=='tags') echo ' class="this"' ?>><a href="index.php?com=tags&act=man&type=product">Quản lý tags</a></li>
    </ul>
  </li>*/?>

  <li class="product_li <?php if(($_GET['com']=='product' && $_GET['type']=='san-pham') || $_GET['com']=='order') echo ' activemenu' ?>" id="menu2"><a href="" title="" class="exp"><span>Sản phẩm</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['act']=='man_list' && $_GET['type']=='san-pham') echo ' class="this"' ?>><a href="index.php?com=product&act=man_list&type=san-pham">Quản lý danh mục cấp 1</a></li>
      <li<?php if($_GET['act']=='man_cat' && $_GET['type']=='san-pham') echo ' class="this"' ?>><a href="index.php?com=product&act=man_cat&type=san-pham">Quản lý danh mục cấp 2</a></li>
      <!-- <li<?php if($_GET['act']=='man_item' && $_GET['type']=='san-pham') echo ' class="this"' ?>><a href="index.php?com=product&act=man_item&type=san-pham">Quản lý danh mục cấp 3</a></li> -->
      <li<?php if($_GET['act']=='man' && $_GET['type']=='san-pham') echo ' class="this"' ?>><a href="index.php?com=product&act=man&type=san-pham">Quản lý sản phẩm</a></li>
      <!-- <li<?php if($_GET['com']=='order') echo ' class="this"' ?> ><a href="index.php?com=order&act=man">Quản lý đơn hàng</a></li> -->
    </ul>
  </li>

  <li class="article_li <?php if($_GET['com']=='baiviet'  && $_GET['type']=='du-an') echo ' activemenu' ?>" id="menu_cs"><a href="" title="" class="exp"><span>Dự án</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['act']=='man_list') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man_list&type=du-an">Quản lý cấp 1</a></li>
      <li<?php if($_GET['act']=='man') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=du-an">Quản lý Dự án</a></li>
    </ul>
  </li>

  <li class="article_li <?php if($_GET['com']=='baiviet'  && $_GET['type']=='giai-phap') echo ' activemenu' ?>" id="menu_cs"><a href="" title="" class="exp"><span>Giải pháp</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['act']=='man_list') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man_list&type=giai-phap">Quản lý cấp 1</a></li>
      <li<?php if($_GET['act']=='man') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=giai-phap">Quản lý Giải pháp</a></li>
    </ul>
  </li>

  <li class="article_li <?php if($_GET['com']=='baiviet'  && $_GET['type']=='xuat-nhap-khau') echo ' activemenu' ?>" id="menu_cs"><a href="" title="" class="exp"><span>Xuất nhập khẩu</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['act']=='man_list') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man_list&type=xuat-nhap-khau">Quản lý cấp 1</a></li>
      <li<?php if($_GET['act']=='man') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=xuat-nhap-khau">Quản lý Xuất nhập khẩu</a></li>
    </ul>
  </li>

  
  <li class="article_li <?php if($_GET['com']=='baiviet' && $_GET['type']=='tin-tuc' || $_GET['type']=='chinh-sach' ||  $_GET['type']=='gioi-thieu' ||  $_GET['type']=='tuyen-dung') echo ' activemenu' ?>" id="menu_bv"><a href="" title="" class="exp"><span>Bài viết</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['type']=='tin-tuc') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=tin-tuc">Quản lý tin tức</a></li>
      <li<?php if($_GET['type']=='chinh-sach') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=chinh-sach">Quản lý Chính sách</a></li>

      <li<?php if($_GET['type']=='gioi-thieu') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=gioi-thieu">Quản lý giới thiệu</a></li>
      <li<?php if($_GET['type']=='tuyen-dung') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=tuyen-dung">Quản lý tuyển dụng</a></li>

    </ul>
  </li>

 <?/*
 <!--  <li class="article_li <?php if($_GET['com']=='info') echo ' activemenu' ?>" id="menu_tt"><a href="" title="" class="exp"><span>Trang tĩnh</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['type']=='gioi-thieu') echo ' class="this"' ?>><a href="index.php?com=info&act=capnhat&type=gioi-thieu">Quản lý giới thiệu</a></li>
    </ul>
  </li> -->
  */?>

  <li class="template_li<?php if($_GET['com']=='setting' || $_GET['com']=='newsletter' || $_GET['com']=='bannerqc'  || $_GET['com']=='company') echo ' activemenu' ?>" id="menu5"><a href="#" title="" class="exp"><span>Thông tin công ty</span><strong></strong></a>
    <ul class="sub">
      <?php if($config['banner']=='true'){?>
        <li<?php if($_GET['type']=='breadcrumb-bg') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=breadcrumb-bg" title="">Banner trang trong</a></li>
      <?php } ?>
      <li<?php if($_GET['type']=='bocongthuong') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=bocongthuong" title="">Bộ công thương</a></li>
      <li<?php if($_GET['type']=='logo_debug') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=logo_debug" title="">Hình chia sẻ Zalo,Face</a></li>
      <li<?php if($_GET['type']=='favicon') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=favicon" title="">Favicon</a></li>
      <li<?php if($_GET['type']=='logo') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=logo" title="">Cập nhật logo</a></li>
      <li<?php if($_GET['type']=='banner') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=banner" title="">Cập nhật banner</a></li>
      <!-- <li<?php if($_GET['type']=='bg_header') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=bg_header" title="">Ảnh nền header</a></li> -->
      <li<?php if($_GET['type']=='banner_adv') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=banner_adv" title="">Banner quảng cáo</a></li>
      <li<?php if($_GET['type']=='bg_ft') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=bg_ft" title="">Ảnh nền footer</a></li>
      <!-- <li<?php if($_GET['type']=='popup') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=popup" title="">popup</a></li> -->

      <li<?php if($_GET['type']=='lienhe') echo ' class="this"' ?>><a href="index.php?com=company&act=capnhat&type=lienhe" title="">Liên hệ</a></li>
      <li<?php if($_GET['type']=='footer') echo ' class="this"' ?>><a href="index.php?com=company&act=capnhat&type=footer" title="">Footer</a></li>
      <li<?php if($_GET['com']=='setting') echo ' class="this"' ?>><a href="index.php?com=setting&act=capnhat" title="">Cấu hình chung</a></li>
      <li<?php if($_GET['com']=='newsletter') echo ' class="this"' ?>><a href="index.php?com=newsletter&act=man" title="">Email đăng ký nhận tin</a></li>
    </ul>
  </li>
  <?php if($site_seo!=''){?>
  <li class="charts<?php if($_GET['com']=='seo') echo ' activemenu' ?>" id="menu_so"><a href="#" title="" class="exp"><span>Seo</span><strong></strong></a>
    <ul class="sub">
      <?php foreach($site_seo as $key=>$value) {?>
      <li <?php if($_GET['type']=="seo_".$key."") echo 'class="this"' ?>><a href="index.php?com=seo&act=capnhat&type=seo_<?=$key?>" title="">Seo <?=$value?></a></li>
      <?php } ?>
    </ul>
  </li>
  <?php }?>

  <li class="marketing_li<?php if($_GET['com']=='yahoo' || $_GET['com']=='lkweb') echo ' activemenu' ?>" id="menu6"><a href="#" title="" class="exp"><span>Hổ Trợ Online</span><strong></strong></a>
    <ul class="sub">
      <li <?php if($_GET['com']=='lkweb') echo ' class="this"' ?>><a href="index.php?com=lkweb&act=man&type=lkweb" title="">Liên kết mạng xã hội Header</a></li>
      <li <?php if($_GET['com']=='lkweb_ft') echo ' class="this"' ?>><a href="index.php?com=lkweb&act=man&type=lkweb_ft" title="">Liên kết mạng xã hội footer</a></li>
      <li <?php if($_GET['com']=='yahoo') echo ' class="this"' ?>><a href="index.php?com=yahoo&act=man&type=yahoo" title="">Quản lý hỗ trợ tư vấn</a></li>
    </ul>
  </li>
  <li class="gallery_li<?php if($_GET['com']=='photo') echo ' activemenu' ?>" id="menu7"><a href="#" title="" class="exp"><span>Hình Ảnh - Slider</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['type']=='slider') echo ' class="this"' ?>><a href="index.php?com=photo&act=man_photo&type=slider" title="">Hình ảnh slider</a></li>
      <li<?php if($_GET['type']=='slider_mb') echo ' class="this"' ?>><a href="index.php?com=photo&act=man_photo&type=slider_mb" title="">Hình ảnh slider moblie</a></li>
      <li<?php if($_GET['type']=='doitac') echo ' class="this"' ?>><a href="index.php?com=photo&act=man_photo&type=doitac" title="">Hình ảnh đối tác</a></li>
    </ul>
  </li>

  <li class="video_li<?php if($_GET['com']=='video') echo ' activemenu' ?>" id="menu_v"><a href="#" title="" class="exp"><span>Video</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['com']=='video' && $_GET['type']=='video') echo ' class="this"' ?>><a href="index.php?com=video&act=man&type=video" title="">Video clip</a></li>
    </ul>
  </li>

  <?/*
  <!-- <li class="album_li<?php if($_GET['com']=='album' || $_GET['com']=='background') echo ' activemenu' ?>" id="menu_abs"><a href="#" title="" class="exp"><span>Hình ảnh</span><strong></strong></a>
      <ul class="sub">
        <li<?php if($_GET['act']=='man') echo ' class="this"' ?>><a href="index.php?com=album&act=man&type=album" title="">Quản lý hình ảnh</a></li>
      </ul>
  </li> -->
  */?>

  <li class="setting_li<?php if($_GET['com']=='database' || $_GET['com']=='background' || $_GET['com']=='user') echo ' activemenu' ?>" id="menu8"><a href="#" title="" class="exp"><span>Cấu hình website</span><strong></strong></a>
    <ul class="sub">
      <li <?php if($_GET['com']=='user' && $_GET['act']=='admin_edit') echo ' class="this"' ?>><a href="index.php?com=user&act=admin_edit">Thông tin Tài khoản</a></li>
     <!--  <li<?php if($_GET['com']=='background' && $_GET['type']=='bgweb') echo ' class="this"' ?>><a href="index.php?com=background&act=capnhat&type=bgweb">Background web</a></li> -->
    </ul>
</li>

</ul>
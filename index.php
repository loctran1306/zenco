<?php
	session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './libraries/');

	if(!isset($_SESSION['lang']))
	{
	 $_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
  include_once _lib."AntiSQLInjection.php";
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."functions_share.php";
	include_once _lib."class.database.php";
	include_once _source."lang_$lang.php";
	include_once _lib."functions_giohang.php";
  include_once _lib."breadcrumb.php";
	include_once _lib."file_requick.php";
  include_once _lib."counter.php"; 
  if($config['minify']=='true'){
    ob_start("minify_output");
  }
	
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1" />
<?php include _template."layout/seoweb.php";?>
<?php include _template."layout/css.php";?>
<?php include _template."layout/background.php";?>
<?=$row_setting['codehead']?>
</head>
<body ondragstart="return false;" ondrop="return false;">
<?php if($source=='index'){?><h1 class="visit_hidden fn"><?=$row_setting['ten_'.$lang]?></h1><?php } ?>
<div id="container">
    
    
    <div id="menu" class="transi06">
        <div class="them_menu p-relative">
          <?php include _template."layout/menu_top.php";?>
        </div>
    </div>
   
    <div id="menu_mobi" class="fix_menumb"> 
        <?php include _template."layout/menu_mb.php";?>
    </div>
    <?php if($source=="index"){?>
        <?php include _template."layout/slider.php";?> 
    <?php } ?>
    <section id="full-page">
        <?php if($config['banner']=="true" && $breadcrumb_bg && $source!='index'){?>
          <section id="banner-inner" <?=$style_breadcrumb?>></section>
        <?php } ?>
        <?php if($source!='index'){?>
          <section id="title-breadcrumbs"><?php include _template."layout/breadcrumb.php";?></section>
        <?php } ?>
        <section id="content-page"><?php include _template.$template."_tpl.php";?></section>
    </section>
    <footer id="footer">
        <?php include _template."layout/footer.php"; ?>
    </footer>
</div>

<?php include _lib."json_strucdata.php"; ?>
<?=$row_setting['codebody']?>
<?php include _template."layout/js.php";?> 
<?php //include _template."layout/face_zalo.php";?>

<?php include _template."layout/phone.php";?>
<?php include _template."layout/dk_nhantin2.php";?>
</body>
</html>
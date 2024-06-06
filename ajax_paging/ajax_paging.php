<?php
	session_start();
	@define ( '_template' , '../templates/');
	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');	
	
	if(!isset($_SESSION['lang']))
	{
	$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _source."lang_$lang.php";
	include_once _lib."class.database.php";
	include_once "class_paging_ajax.php";

	$d = new database($config['database']);

	
	if(isset($_POST["page"]))
    {
	$paging = new paging_ajax();
	
	$paging->class_pagination = "pagination_ajax";
	$paging->class_active = "active";
	$paging->class_inactive = "inactive";
	$paging->class_go_button = "go_button";
	$paging->class_text_total = "total";
	$paging->class_txt_goto = "txt_go_button";

	$paging->per_page =8;

	$paging->page = (int)$_POST["page"];
	$paging->text_sql = "select ten_$lang,tenkhongdau,thumb,giaban from table_product where hienthi=1 and noibat!=0 and type='san-pham' order by stt,id";
	$sql= "select id from table_product where hienthi=1 and noibat!=0 and type='san-pham' order by stt,id";


	$result_pag_data = $paging->GetResult();

	$message = '';
	$paging->data = "" . $message . "";
	}
	
	$d->reset();
	$d->query($sql);
	$product = $d->result_array();
	

?>
<div class="div_css">
	<?php
	$i=0;
	while ($row = mysql_fetch_array($result_pag_data)) {?> 
        <div class="item pa_rp">
          	<div class="product_images">
                <div class="hidden_img">
                	<a href="<?=$row['tenkhongdau']?>">
                      <img src="<?=_upload_product_l?><?=$row['thumb']?>" alt="<?=$row['ten_'.$lang]?>" />
                    </a>
                </div>
         	 </div>
         	<div class="ten_item">
              <h3><a href="<?=$row['tenkhongdau']?>"><?=$row['ten_'.$lang]?></a></h3> 
              <p class="giaban">
              Giá: 
              <span><?php if($row['giaban']==0) echo _lienhe; else echo number_format ($row['giaban'],0,",",".")."đ";?></span>
              </p>
          </div>
        </div> 
	<?php $i++;} ?>
</div>
<?php 
  if(count($product) >8){
	  echo '<div class="clear"></div>';
	  echo $paging->Load();
  }
  
?>
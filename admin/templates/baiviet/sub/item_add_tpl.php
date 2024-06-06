
<script type="text/javascript">		

	$(document).ready(function() {
		$('.chonngonngu li a').click(function(event) {
			var lang = $(this).attr('href');
			$('.chonngonngu li a').removeClass('active');
			$(this).addClass('active');
			$('.lang_hidden').removeClass('active');
			$('.lang_'+lang).addClass('active');
			return false;
		});
	});

	function select_list()
	{
		var a=document.getElementById("id_list");
		window.location ="index.php?com=baiviet&act=<?php if($_REQUEST['act']=='edit_sub') echo 'edit_sub'; else echo 'add_sub';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?><?php if($_REQUEST['type']!='') echo"&type=".$_REQUEST['type']; ?>&id_list="+a.value;	
		return true;
	}	

	function select_cat()
	{
		var a=document.getElementById("id_list");
		var b=document.getElementById("id_cat");
		window.location ="index.php?com=baiviet&act=<?php if($_REQUEST['act']=='edit_sub') echo 'edit_sub'; else echo 'add_sub';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?><?php if($_REQUEST['type']!='') echo"&type=".$_REQUEST['type']; ?>&id_list="+a.value+"&id_cat="+b.value;	
		return true;
	}
function select_item()
	{
		var a=document.getElementById("id_list");
		var b=document.getElementById("id_cat");
		var c=document.getElementById("id_item");
		window.location ="index.php?com=baiviet&act=<?php if($_REQUEST['act']=='edit_sub') echo 'edit_sub'; else echo 'add_sub';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?><?php if($_REQUEST['type']!='') echo"&type=".$_REQUEST['type']; ?>&id_list="+a.value+"&id_cat="+b.value+"&id_item="+c.value;	
		return true;
	}
</script>
<?php

  function get_main_list()
  {
    $sql="select * from table_baiviet_list where type='".$_GET['type']."' order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_list" name="id_list" onchange="select_list()" class="main_select">
      <option value="">Chọn danh mục 1</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$_REQUEST["id_list"])
        $selected="selected";
      else 
        $selected="";
      $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
    }
    $str.='</select>';
    return $str;
  }

  function get_main_cat()
  {
    $sql="select * from table_baiviet_cat where id_list='".$_GET['id_list']."' and type='".$_GET['type']."' order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_cat" name="id_cat" onchange="select_cat()" class="main_select">
      <option value="">Chọn danh mục 2</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$_REQUEST["id_cat"])
        $selected="selected";
      else 
        $selected="";
      $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
    }
    $str.='</select>';
    return $str;
  }
function get_main_item()
  {
    $sql="select * from table_baiviet_item where id_cat='".$_GET['id_cat']."' and type='".$_GET['type']."' order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_item" name="id_item" class="main_select">
      <option value="">Chọn danh mục 2</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$_REQUEST["id_item"])
        $selected="selected";
      else 
        $selected="";
      $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      
    }
    $str.='</select>';
    return $str;
  }
?>

<div class="wrapper">

	<div class="control_frm" style="margin-top:25px;">
	    <div class="bc">
	        <ul id="breadcrumbs" class="breadcrumbs">
	        	<li><a href="index.php?com=baiviet&act=add_sub<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm Danh mục cấp 3</span></a></li>
	            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
	        </ul>
	        <div class="clear"></div>
	    </div>
	</div>

	<form name="supplier" id="validate" class="form" action="index.php?com=baiviet&act=save_sub<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
		<div class="widget">

			<div class="title chonngonngu">
			<ul>
				<li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
				<li><a href="en" class="tipS validate[required]" title="Chọn tiếng anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
			</ul>
			</div>	

			<div class="formRow">
				<label>Chọn danh mục 1</label>
				<div class="formRight">
				<?=get_main_list()?>
				</div>
				<div class="clear"></div>
			</div>

			<div class="formRow">
				<label>Chọn danh mục 2</label>
				<div class="formRight">
				<?=get_main_cat()?>
				</div>
				<div class="clear"></div>
			</div>	
			<div class="formRow">
				<label>Chọn danh mục 3</label>
				<div class="formRight">
				<?=get_main_item()?>
				</div>
				<div class="clear"></div>
			</div>	

			<div class="formRow">
				<label>Tải hình ảnh:</label>
				<div class="formRight">
	            	<input type="file" id="file" name="file" />
					<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				</div>
				<div class="clear"></div>
			</div>
	        <?php if($_GET['act']=='edit_sub'){?>
			<div class="formRow">
				<label>Hình Hiện Tại :</label>
				<div class="formRight">
				
				<div class="mt10"><img src="<?=_upload_baiviet.$item['thumb']?>"  alt="NO PHOTO"  /></div>
				</div>
				<div class="clear"></div>
			</div>
			<?php } ?>	

	        <div class="formRow lang_hidden lang_vi active">
				<label>Tiêu đề</label>
				<div class="formRight">
	                <input type="text" name="ten_vi" title="Nhập tên danh mục" id="ten_vi" class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
				</div>
				<div class="clear"></div>
			</div>

			<div class="formRow lang_hidden lang_en">
				<label>Tiêu đề (Tiếng anh)</label>
				<div class="formRight">
	                <input type="text" name="ten_en" title="Nhập tên danh mục" id="ten_en" class="tipS validate[required]" value="<?=@$item['ten_en']?>" />
				</div>
				<div class="clear"></div>
			</div>

			<div class="formRow formGroup <?php if($config_sult=='false') echo 'none';?>">
			    <label>Alias</label>
			    <div class="formRight">
	        		<div class="input-group">
						<div class="input-group-prepend">
						    <span class="input-group-text"><?=$config_url?></span>
						</div>
						<input type="text" name="tenkhongdau" title="Nhập tên không dấu" id="tenkhongdau" class="tipS validate[required] form-control" value="<?=@$item['tenkhongdau']?>" />
						<div class="input-group-append">
						    <span class="input-group-text"><input type="checkbox" name="checkurl" id="checkurl" value="0" <?=($checkurl==1)?'checked="checked"':''?> /></span>
						</div>
					</div>
				</div>
			   	<div class="clear"></div>
			</div>

	        <div class="formRow">
	          <label>Hiển thị : <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
	          <div class="formRight">
	         
	            <input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
	             <label>Số thứ tự: </label>
	              <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
	          </div>
	          <div class="clear"></div>
	        </div>
			
		</div>  
		<div class="widget">
			<div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
				<h6>Nội dung seo</h6>
			</div>
			
			<div class="formRow">
				<label>Title</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['title']?>" name="title" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="formRow">
				<label>Từ khóa</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho danh mục" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="formRow">
				<label>Description:</label>
				<div class="formRight">
					<textarea rows="4" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS" name="description"  onkeyup="countChar('description')" id="description"><?=@$item['description']?></textarea>
				    <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;"  value="<?=mb_strlen(@$item['description'])?>" id="count_description" /> ký tự <b>(Tốt nhất là 160 - 300 ký tự)</b>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="formRow">
				<div class="formRight">
	                <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
	                <input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
	            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
	            	<a href="index.php?com=baiviet&act=man_sub<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
				</div>
				<div class="clear"></div>
			</div>

		</div>
	</form>        
</div>

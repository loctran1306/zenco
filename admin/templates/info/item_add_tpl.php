
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
</script>

<form name="supplier" id="validate" class="form" action="index.php?com=info&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">

	<div class="control_frm" style="margin-top:25px;">
	    <div class="bc">
	        <ul id="breadcrumbs" class="breadcrumbs">
	        	<li><a href="index.php?com=info&act=capnhat<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Cập nhật <?=$title_main?></span></a></li>
	        </ul>
	        <div class="clear"></div>
	    </div>
	</div>

	<div class="widget">
		<div class="title chonngonngu">
		<ul>
			<li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
			<li><a href="en" class="tipS validate[required]" title="Chọn tiếng anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
		</ul>
	</div>	
	<?php if($config_images=='true'){ ?>
		<div class="formRow">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            	<input type="file" id="file" name="file" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> width : <?php echo _width_thumb*$ratio_;?> px , Height : <?php echo _height_thumb*$ratio_;?> px </div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Hình Hiện Tại :</label>
			<div class="formRight">
			
			<div class="mt10"><img src="<?=_upload_hinhanh.$item['thumb']?>"  alt="NO PHOTO" width="100" /></div>
			</div>
			<div class="clear"></div>
		</div>
	<?php } ?>


	<?php if($config_images2=='true'){ ?>
		<div class="formRow">
			<label>Tải hình ảnh 2:</label>
			<div class="formRight">
            	<input type="file" id="file2" name="file2" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> width : <?php echo _width_thumb2*$ratio_;?> px , Height : <?php echo _height_thumb2*$ratio_;?> px </div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Hình Hiện Tại 2:</label>
			<div class="formRight">
			
			<div class="mt10"><img src="<?=_upload_hinhanh.$item['thumb2']?>"  alt="NO PHOTO" width="100" /></div>
			</div>
			<div class="clear"></div>
		</div>
	<?php } ?>

<?php if($config_khac=='true'){ ?>

	<!-- <div class="formRow lang_hidden lang_vi active">
		<label>Links ( Youtobe )</label>
		<div class="formRight">
            <input type="text" name="linkvideo" title="Nhập link video" id="linkvideo" class="tipS" value="<?=@$item['linkvideo']?>" />
		</div>
		<div class="clear"></div>
	</div> -->
<?php } ?>

<?php if($config_ten=='true'){ ?>
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
<?php } ?>


 <?php if($config_mota!="false"){?>
 		
		<div class="formRow lang_hidden lang_vi active">
			<label>Mô tả</label>
			<div class="formRight">
                <textarea rows="8" cols="" title="Nhập mô tả . " class="tipS" name="mota_vi"><?=@$item['mota_vi']?></textarea>
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow lang_hidden lang_en">
			<label>Mô tả (Tiếng anh)</label>
			<div class="formRight">
                <textarea rows="8" cols="" title="Nhập mô tả . " class="tipS" name="mota_en"><?=@$item['mota_en']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		
<?php } ?>
<?php if($config_motatext!="false"){?>
		<div class="formRow lang_hidden lang_vi active">
			<label>Mô tả</label>
			<div class="ck_editor">
                <textarea id="mota_vi" name="mota_vi"><?=@$item['mota_vi']?></textarea>
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow lang_hidden lang_en">
			<label>Mô tả (Tiếng anh)</label>
			<div class="ck_editor">
                <textarea id="mota_en" name="mota_en"><?=@$item['mota_en']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
<?php } ?>

     <?php if($config_noidung!='false') {?>
	<div class="formRow lang_hidden lang_vi active">
			<label>Nội Dung</label>
			<div class="ck_editor">
                <textarea id="noidung_vi" name="noidung_vi"><?=@$item['noidung_vi']?></textarea>
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow lang_hidden lang_en">
			<label>Nội Dung (Tiếng anh)</label>
			<div class="ck_editor">
                <textarea id="noidung_en" name="noidung_en"><?=@$item['noidung_en']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
	<?php }?>
   
	<div class="widget">
		<?php if($config_seo=='true'){ ?>
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
				<input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho sản phẩm" class="tipS" />
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
		<?php } ?>
		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="id_cat" id="id_this_product" value="<?=@$item['id_cat']?>" />
            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>   
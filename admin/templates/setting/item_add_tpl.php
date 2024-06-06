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
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=setting&act=capnhat"><span>Thiết lập hệ thống</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Cấu hình website</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=setting&act=save&curPage=<?=$_REQUEST['curPage']?>" method="post" enctype="multipart/form-data">
	
    
    <div class="widget">

		<div class="title chonngonngu">
			<ul>
				<li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
				<li><a href="en" class="tipS validate[required]" title="Chọn tiếng anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
			</ul>
		</div>	

		<div class="formRow lang_hidden lang_vi active">
			<label>Tên Công Ty</label>
			<div class="formRight">
                <input type="text" name="ten_vi" title="Nhập tên công ty" id="ten_vi" class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow lang_hidden lang_en">
			<label>Tên Công Ty (Tiếng anh)</label>
			<div class="formRight">
                <input type="text" name="ten_en" title="Nhập tên công ty" id="ten_en" class="tipS validate[required]" value="<?=@$item['ten_en']?>" />
			</div>
			<div class="clear"></div>
		</div>

		
		<div class="formRow">
			<label>Email</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['email']?>" name="email" title="Nhập địa chỉ email" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        
        <div class="formRow">
			<label>Điện thoại</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['dienthoai']?>" name="dienthoai" title="Nhập số điện thoại" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<label>Hotline</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['hotline']?>" name="hotline" title="Nhập hotline" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<!-- <div class="formRow">
			<label>Hotline 2</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['hotline2']?>" name="hotline2" title="Nhập hotline" class="tipS" />
			</div>
			<div class="clear"></div>
		</div> 
		<div class="formRow">
			<label>Hotline 3</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['hotline3']?>" name="hotline3" title="Nhập hotline" class="tipS" />
			</div>
			<div class="clear"></div>
		</div> -->
		
        <div class="formRow lang_hidden lang_vi active">
			<label>Địa chỉ</label>
			<div class="formRight">
                <input type="text" name="diachi_vi" title="Nhập địa chỉ công ty" id="diachi_vi" class="tipS validate[required]" value="<?=@$item['diachi_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow lang_hidden lang_en">
			<label>Địa chỉ(Tiếng anh)</label>
			<div class="formRight">
                <input type="text" name="diachi_en" title="Nhập địa chỉ công ty" id="diachi_en" class="tipS validate[required]" value="<?=@$item['diachi_en']?>" />
			</div>
			<div class="clear"></div>
		</div>


		<div class="formRow">
			<label>Website</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['website']?>" name="website" title="Nhập địa chỉ website" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>	

		<!-- <div class="formRow">
			<label>Fanpage facebook</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['facebook']?>" name="facebook" title="Nhập link fanfacebook" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
 -->
		 <div class="formRow">
			<label>Zalo</label>
			<div class="formRight">
                <input type="text" name="zalo" title="Nhập số điện thoại zalo" id="zalo" class="tipS validate[required]" value="<?=@$item['zalo']?>" />
			</div>
			<div class="clear"></div>
		</div>


		<!-- <div class="formRow lang_hidden lang_vi active">
			<label>Slogan</label>
			<div class="formRight">
                <input type="text" name="slogan_vi" title="Nhập slogan" id="slogan_vi" class="tipS" value="<?=@$item['slogan_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow lang_hidden lang_en">
			<label>Slogan</label>
			<div class="formRight">
                <input type="text" name="slogan_en" title="Nhập slogan" id="slogan_en" class="tipS" value="<?=@$item['slogan_en']?>" />
			</div>
			<div class="clear"></div>
		</div> -->
		
		<div class="formRow">
			<label>Chỉ đường</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['chiduong']?>" name="chiduong" title="Nhập link chỉ đường" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>	

		<div class="formRow">
			<label>iframe Bản đồ</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Code iframe" class="tipS" name="iframe"><?=@$item['iframe']?></textarea>
			</div>
			<div class="clear"></div>
		</div>

		<!-- <div class="formRow">
			<label>Background website</label>
			<div class="formRight">
				<input type="color" name="bgweb" title="Nhập màu" id="bgweb" class="tipS"  <?php if(@$item['bgweb']!='') {?>value="<?=@$item['bgweb']?>" <?php }else{?>value="#ffffff" <?php } ?>/>
			</div>
			<div class="clear"></div>
		</div> -->
	
		<?php if($config['watermark']['status']==true){?>
	 		<div class="formRow">
				<label>Đóng dấu ảnh:</label>
				<div class="formRight">
	            	<input type="file" id="watermark" name="watermark" />
					<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
					<div class="note"><?=$config['watermark']['width']?>x<?=$config['watermark']['height']?></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Con dấu :</label>
				<div class="formRight">
				<div class="mt10"><img src="<?=_upload_hinhanh?>/watermark.png?time=<?=time()?>"  alt="NO PHOTO" width="100" /></div>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
     

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
				<input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho website" class="tipS" />
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
			<label>code thêm heade :</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Code head" class="tipS" name="codehead"><?=@$item['codehead']?></textarea>
			</div>
			<div class="clear"></div>
		</div>


		<div class="formRow">
			<label>Code thêm body</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Code body" class="tipS" name="codebody"><?=@$item['codebody']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<?/*
		<div class="formRow">
			<label>Version facebook</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="version " class="tipS" name="version_face"><?=@$item['version_face']?></textarea>
			</div>
			<div class="clear"></div>
		</div>


		<div class="formRow">
			<label>App id facebook</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Appid" class="tipS" name="appid_face"><?=@$item['appid_face']?></textarea>
			</div>
			<div class="clear"></div>
		</div>	
		*/?>
        <div class="formRow">
			<div class="formRight">
                <input type="hidden" name="id" id="id_this_setting" value="<?=@$item['id']?>" />
            	<input type="submit" class="blueB"  value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div> 			
	</div>
    
      
</form>   
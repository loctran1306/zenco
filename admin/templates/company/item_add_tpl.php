
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

<form name="supplier" id="validate" class="form" action="index.php?com=company&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">

	<div class="control_frm" style="margin-top:25px;">
	    <div class="bc">
	        <ul id="breadcrumbs" class="breadcrumbs">
	        	<li><a href="index.php?com=company&act=capnhat<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Cập nhật <?=$title_main?></span></a></li>
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
   
	
		<div class="formRow">
            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Cập nhật" />
			<div class="clear"></div>
		</div>
	</form>   
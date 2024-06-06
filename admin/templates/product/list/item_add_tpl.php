
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
		$(function(){
				 $("#states").select2();
		        ///
		        $("#states").change(function(){
		        	$tags = $(this).val();
		        	
		        	if($tags>0){
		        	$("#tags_name").append("<p class='delete_tags'>"+$("#states option:selected").text()+"<input name='tags[]' value='"+$tags+"'  type='hidden' /> <span></span> </p>");
		        	}

			       	$(".delete_tags span").click(function(){
			        	$(this).parent().remove();
			        });
		        });
		        //
		        $(".delete_tags span").click(function(){
		        	$(this).parent().remove();
		        });
		});

	});
</script>
<?php 
	//------------ tags-------------------------
  if($item['tags']!=''){
		$tags = explode(",", $item['tags']) ;
		$sql = "select id,ten_vi from #_photo where type='doitac'";
		if($tags[0]!=''){
			$sql .=" and id<> ".$tags[0];
		}
		for ($i=1,$count = count($tags); $i < $count ; $i++) { 
			if($tags[$i]!=''){
				$sql .=" and id<> ".$tags[$i];
			}
		}
	}else{
		$sql = "select id,ten_vi from #_photo where type='doitac'";
	}
		$d->query($sql);
	    $tags_arr = $d->result_array();

  //------------end tags---------------	
?>
<div class="wrapper">

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=product&act=add_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm Danh mục cấp 1</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="supplier" id="validate" class="form" action="index.php?com=product&act=save_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">

		<div class="title chonngonngu">
		<ul>
			<li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
			<li><a href="en" class="tipS validate[required]" title="Chọn tiếng anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
		</ul>
		</div>	
		<?php if($config_images=='true') {?>
			<div class="formRow">
				<label>Hình đại diện :</label>
				<div class="formRight">
	            	<input type="file" id="file" name="file" />
					<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
					<div class="note">width : <?php echo _width_thumb*$ratio_;?> px , Height : <?php echo _height_thumb*$ratio_;?> px </div>
				</div>
				<div class="clear"></div>
			</div>
	        <?php if($_GET['act']=='edit_list'){?>
			<div class="formRow">
				<label>Hình hiện Tại :</label>
				<div class="formRight">
				
				<div class="mt10"><img src="<?=_upload_product.$item['thumb']?>"  alt="NO PHOTO" width="27" /></div>

				</div>
				<div class="clear"></div>
			</div>
			<?php } ?>
		<?php } ?>


		<?php if($config_images2=='true') {?>
			<div class="formRow">
				<label>Hình đại diện 2:</label>
				<div class="formRight">
	            	<input type="file" id="file2" name="file2" />
					<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
					<div class="note">width : <?php echo _width_thumb2*$ratio_;?> px , Height : <?php echo _height_thumb2*$ratio_;?> px </div>
				</div>
				<div class="clear"></div>
			</div>
	        <?php if($_GET['act']=='edit_list'){?>
			<div class="formRow">
				<label>Hình hiện Tại 2:</label>
				<div class="formRight">
				
				<div class="mt10"><img src="<?=_upload_product.$item['thumb2']?>"  alt="NO PHOTO" width="27" /></div>

				</div>
				<div class="clear"></div>
			</div>
			<?php } ?>
		<?php } ?>
		
		<?php if($config_link=='true') {?>
			<div class="formRow">
				<label>Link</label>
				<div class="formRight">
	                <input type="text" name="link" title="Nhập link quảng cáo" id="link" class="" value="<?=@$item['link']?>" />
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
		<?php if($config_mota=='true') {?>
			
			<div class="formRow lang_hidden lang_vi active">
				<label>Mô tả</label>
				<div class="ck_editor">
	                <textarea id="mota_vi" name="mota_vi"><?=@$item['mota_vi']?></textarea>
				</div>
				<div class="clear"></div>
			</div>

			<div class="formRow  lang_hidden lang_en">
				<label>Mô tả (Tiếng Anh)</label>
				<div class="ck_editor">
	                <textarea id="mota_en" name="mota_en"><?=@$item['mota_en']?></textarea>
				</div>
				<div class="clear"></div>
			</div>


		<?php } ?>
		<?php if($config_tags=='true') {?>
		<div class="formRow lang_hidden lang_vi active">
			<label>Đối tác </label>
			<div class="formRight">
            	<select style="width:300px" id="states">
            		<option value="0">
            			Thêm đối tác 
            		</option>
            		<?php for ($i=0,$countt = count($tags_arr); $i < $countt ; $i++) { ?>
            			<option value="<?=$tags_arr[$i]["id"]?>"><?=$tags_arr[$i]["ten_vi"]?></option>
            		<?php }?>
            	</select>
            	<div class="clear"></div>
            	<div id="tags_name">
            	<?php  for ($i=0,$count = count($tags); $i < $count ; $i++) { 
            		if($tags[$i]!=''){
	        			$d->query("select id,ten_vi from #_photo where type='doitac' and id=".$tags[$i]);
	        			$tags_name = $d->fetch_array();
        			}
        			?>
        			<?php if($tags_name) {?>
        				<p value="<?=$tags_name["id"]?>" class="delete_tags"><?=$tags_name["ten_vi"]?> <span ></span> 
        					<input name="tags[]" value="<?=$tags_name["id"]?>"  type="hidden" />
        				</p>
        			<?php } ?>
        		<?php }?>
        		</div>
            </div>
			<div class="clear"></div>
		</div>
		<?php } ?>
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
            	<a href="index.php?com=product&act=man_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>

			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>        </div>

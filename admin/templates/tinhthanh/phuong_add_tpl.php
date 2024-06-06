<script language="javascript">
	function select_onchange()
	{
		var a=document.getElementById("id_cat");
		window.location ="index.php?com=tinhthanh&act=<?php if($_REQUEST['act']=='edit_phuong') echo 'edit_phuong'; else echo 'add_phuong';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_cat="+a.value;	
		return true;
	}
</script>
<?php
function get_main_category()
	{
		$sql="select * from table_tinh order by ten asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat" onchange="select_onchange()" class="main_font">
			<option value="">Chọn Tỉnh/TP</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	function get_main_quan()
	{
		$sql="select * from table_quan  where id_cat = '".$_GET['id_cat']."' order by ten";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_quan" name="id_quan" onchange="select_quan()" class="main_font">
			<option value="">Chọn Quận/Huyện</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_quan"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
?>
<div class="wrapper">

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=tinhthanh&act=add_phuong"><span>Thêm Phường xã</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<form name="supplier" id="validate" class="form" action="index.php?com=tinhthanh&act=save_phuong&id_cat=<?=$_GET['id_cat']?>&id_quan=<?=$_GET['id_quan']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
    	<div class="formRow">
			<label>Chọn Tỉnh/TP</label>
			<div class="formRight">
			<?=get_main_category()?>
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
			<label>Quận/Huyện</label>
			<div class="formRight">
			<?=get_main_quan()?>
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
			<label>Phường/Xã</label>
			<div class="formRight">
                <input type="text" name="ten" title="Nhập tên " id="ten" class="tipS validate[required]" value="<?=@$item['ten']?>" />
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
    
 <div class="formRow">
			<div class="formRight">
                <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
                <input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
            	<a href="index.php?com=tinhthanh&act=man_phuong" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
			</div>
			<div class="clear"></div>
		</div>
    </form> 
    </div>






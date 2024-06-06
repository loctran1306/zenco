<?php
	$d->reset();
	$sql = "select ten,id,ten_com,type,danhmuc,act from #_com order by id asc";
	$d->query($sql);
	$com = $d->result_array();

    $d->reset();
    $sql = "select id,ten_vi from #_product_list order by id desc";
    $d->query($sql);
    $row_list = $d->result_array();
?>
<style>
.chon_danhmuc select{ padding:5px; width:300px;}
</style>

<script type="text/javascript">
    $(document).ready(function(){

        $('#id_list').change(function(){
            var id_list = $(this).val();
            $.ajax ({
                type: "POST", 
                url: "ajax/load_cat.php",
                data: {id_list:id_list},
                success: function(result) { 
                    $('#id_cat').html(result);
                    $('#id_item').html('<option value="">Chọn danh mục</option>');
                    $('#id_cat').change(function(){
                        var id_cat = $(this).val();
                        $.ajax ({
                            type: "POST",
                            url: "ajax/load_item.php",
                            data: {id_cat:id_cat},
                            success: function(result) { 
                                $('#id_item').html(result);
                            }
                        });
                    })
                }
            });
        })

      
        <?php if($item['id_list']!=''){?>
            var id_list = <?=$item['id_list']?>;
        <?php } else { ?>
            var id_list = '';
        <?php } ?>

        <?php if($item['id_cat']!=''){?>
            var id_cat = <?=$item['id_cat']?>;
        <?php } else { ?>
            var id_cat = '';
        <?php } ?>

        <?php if($item['id_item']!=''){?>
            var id_item = <?=$item['id_item']?>;
        <?php } else { ?>
            var id_item = '';
        <?php } ?>

      

        $.ajax ({
            type: "POST",
            url: "ajax/load_cat.php",
            data: {id_list:id_list,id_cat:id_cat},
            success: function(result) { 
                $('#id_cat').html(result);
            }
        });

        $.ajax ({
            type: "POST",
            url: "ajax/load_item.php",
            data: {id_cat:id_cat,id_item:id_item},
            success: function(result) { 
                $('#id_item').html(result);
            }
        });

        $('#id_cat').change(function(){
            var id_cat = $(this).val();
            $.ajax ({
                type: "POST",
                url: "ajax/load_item.php",
                data: {id_cat:id_cat},
                success: function(result) { 
                    $('#id_item').html(result);
                }
            });
        })


    })
</script>


<div class="wrapper">

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
            <li><a href="index.php?com=phanquyen&act=add<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm com</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>



<form name="frm"  class="form"  method="post" action="index.php?com=phanquyen&act=save" enctype="multipart/form-data" class="nhaplieu">
<div class="widget">
    <div class="formRow">
        <label>Quyền :</label>
        <div class="formRight">
            <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" />
        </div>
        <div class="clear"></div>
    </div>

    <div class="formRow">
        <label>Màu Thành Viên :</label>
        <div class="formRight">
             <input type="color" name="mausac" value="<?=@$item['mausac']?>"  />
        </div>
        <div class="clear"></div>
    </div>

    

    <div class="formRow">
        <div class="formRight">
            <?php 

    $xem_item = json_decode($item['xem']);
    $them_item = json_decode($item['them']);
    $xoa_item = json_decode($item['xoa']);
    $sua_item = json_decode($item['sua']);
    $com_item = json_decode($item['com']);
    
    for($i=0;$i<count($com);$i++){?>
    <p class="phanvung">
        <label style="width:250px; display:inline-block; font-weight:bold; font-weight:bold;">( Quản lý ) : <?=$com[$i]['ten']?></label>
        <label style="color:rgba(0,153,204,1)">Xem</label>
        <input type="checkbox" name="xem[]" value="<?=$com[$i]['id']?>|1" <?php if($xem_item!=''){if(in_array($com[$i]['id'].'|1',$xem_item)){?> checked="checked"<?php } } ?> />
        <label style="color:rgba(204,0,153,1)">Thêm</label>
        <input type="checkbox" name="them[]" value="<?=$com[$i]['id']?>|1" <?php if($them_item!=''){if(in_array($com[$i]['id'].'|1',$them_item)){?> checked="checked"<?php } } ?>/>
        <label style="color:rgba(0,0,0,1)">Xóa</label>
        <input type="checkbox" name="xoa[]" value="<?=$com[$i]['id']?>|1" <?php if($xoa_item!=''){if(in_array($com[$i]['id'].'|1',$xoa_item)){?> checked="checked"<?php } } ?>/>
        <label style="color:rgba(255,153,0,1)">Sửa</label>
        <input type="checkbox" name="sua[]" value="<?=$com[$i]['id']?>|1" <?php if($sua_item!=''){if(in_array($com[$i]['id'].'|1',$sua_item)){?> checked="checked"<?php } } ?>/>
    </p>
    <div class="clear"></div>
    <?php } ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="formRow">
        <label>Phân quyền  :</label>
        <div class="formRight">
            <div class="chon_danhmuc">
            <label>Chọn Danh mục 1 : </label> 
            <select id="id_list" name="id_list[]" class="main_font" multiple="multiple">
                    <?php 
                    $row_list1 = json_decode($item['id_list']);
                    for($i=0;$i<count($row_list);$i++){ ?>   
                    <option value="<?=$row_list[$i]['id']?>" <?php if($row_list1!=''){if(in_array($row_list[$i]['id'],$row_list1)){?> selected="selected"<?php } } ?>> - <?=$row_list[$i]['ten_vi']?></option>
                    <?php } ?>
            </select><br /><br />

            <label>Chọn Danh mục 2 : </label> 
            <select id="id_cat" name="id_cat[]" class="main_font" multiple="multiple">
            </select><br /><br />

            <label>Chọn Danh mục 3 : </label> 
            <select id="id_item" name="id_item[]" class="main_font" multiple="multiple">
            </select><br /><br />
            </div>

        </div>
        <div class="clear"></div>
    </div>
  
    <div class="formRow">
        <label>Số thứ tự :</label>
        <div class="formRight">
            <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px">
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        <label>Hiển thị :</label>
        <div class="formRight">
            <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>>
        </div>
        <div class="clear"></div>
    </div>
        
    <div class="formRow">
    <label></label>
    <div class="formRight">
        <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
        <input type="submit" value="Lưu"  class="button blueB" />
        <input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=phanquyen&act=man'" class="button blueB" />
    </div>
    <div class="clear"></div>
    </div>
</div>
</form>
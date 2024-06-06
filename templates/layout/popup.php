<?php 
	$d->reset();
    $sql = "select thumb_$lang as thumb,link,hienthi,photo_$lang from #_photo where type='popup' and hienthi!=0";
    $d->query($sql);
    $popup = $d->fetch_array();
    
?>
<style type="text/css">
#popup .modal.in .modal-dialog{z-index: 9999999999!important;top: 70px;}
#popup button.close {position: absolute; right: 0px; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; font-size: 22px; border-radius: 50%; background: #e15555; color: #fff; outline: none; border: none; } 
</style>
<link href="js/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
	$().ready(function(){
    if($('body').width() > 992){
      $('#popup').modal('show');
    }   
})
</script>
<?php if($_SESSION['popup']!='true'){?><?php if(!empty($popup)) {?>

	<div id="popup" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
			    <div class="modal-body">
			    	<button type="button" class="close" data-dismiss="modal">&times;</button>
					<a href="<?=$popup['link']?>" >
						<img src="<?=_upload_hinhanh_l.$popup['photo_'.$lang]?>" alt="POPUP" class="img-responsive" />
					</a>
				</div>      
			</div>
	    </div>
	</div>

<?php $_SESSION['popup']='true';} }?>

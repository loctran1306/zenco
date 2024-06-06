<div id="goidien">
	
	<div class="toolbar">
	    <ul class="flex">
	        <li><a class="blink_me" href="tel:<?=str_replace(' ','',str_replace('.','',$row_setting['hotline']))?>"><i class="fa fa-phone" aria-hidden="true"></i><br><?=$row_setting['hotline']?></a></li>
	        <li><a href="<?=$row_setting['chiduong']?>"><i class="fa fa-map-marker" aria-hidden="true"></i><br><?=_chiduong?></a></li>
	        <li><a href="https://zalo.me/<?=str_replace(' ','',str_replace('.','',$row_setting['zalo']))?>"><img src="images/icon-t3.png" alt="images"><br>Chat Zalo</a></li>
	        <li><a href="<?=$row_setting['facebook']?>"><img src="images/icon-t4.png" alt="images"><br>Facebook</a></li>
	    </ul>
	</div>
</div>
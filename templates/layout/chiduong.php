<div class="widget-mobile">
  <div id="my-menu">
    <div class="wcircle-icon"><i class="fa fa-mobile-phone shake-anim"></i></div>
    <div class="wcircle-menu">
      <div class="wcircle-menu-item">
        <a href="tel:<?=str_replace(' ','',str_replace('.','',$row_setting['hotline']))?>"><i class="fa fa-whatsapp"></i></a>
      </div>
      <div class="wcircle-menu-item">
        <a href="sms:<?=str_replace(' ','',str_replace('.','',$row_setting['hotline']))?>"><i class="fa fa-comments"></i></a>
      </div>
      <div class="wcircle-menu-item">
        <a href="<?=$row_setting['chiduong']?>"><i class="fa fa-map-marker"></i></a>
      </div>
      <div class="wcircle-menu-item">
        <a href="<?=$row_setting['facebook']?>"><i class="fa fa-facebook"></i></a>
      </div>
      <div class="wcircle-menu-item">
        <a href="https://zalo.me/<?=str_replace(' ','',str_replace('.','',$row_setting['zalo']))?>"><img src="images/zalo.png" alt="Zalo"></a>
      </div>
    </div>
  </div>
</div>
<style>
  div.widget-mobile { position: fixed; left: 50%; transform: translateX(-50%); bottom: 10px; z-index: 9999999; display: none; }
  div#my-menu { position: relative; width: 50px!important; height: 50px!important; }
  div.wcircle-open .wcircle-icon i:before { content: '\f00d'; }
  div.wcircle-icon { background: #1282fc;  border-radius: 50%; display: flex!important; display: -ms-flex!important; align-items: center; -ms-flex-align: center; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; position: relative!important; }
  div.wcircle-icon:before { position: absolute; content: ''; width: 60px; height: 60px; background: rgba(18,130,252,.5); border: 1px solid #fff; border-radius: 50%; left: -5px; top: -5px; -webkit-animation: pulse 1s infinite ease-in-out; -moz-animation: pulse 1s infinite ease-in-out; -ms-animation: pulse 1s infinite ease-in-out; -o-animation: pulse 1s infinite ease-in-out; animation: pulse 1s infinite ease-in-out; }
  div.wcircle-icon:after { position: absolute; content: ''; width: 80px; height: 80px; background: rgba(18,130,252,.5); border-radius: 50%; left: -15px; top: -15px; -webkit-animation: zoomIn 2s infinite ease-in-out; -moz-animation: zoomIn 2s infinite ease-in-out; -ms-animation: zoomIn 2s infinite ease-in-out; -o-animation: zoomIn 2s infinite ease-in-out; animation: zoomIn 2s infinite ease-in-out; }
  div.wcircle-menu { position: absolute!important; left: 0; top: 0; display: none; }
  div.wcircle-menu-item { width: 50px; height: 50px; background: #1282fc; border-radius: 50%; display: flex; display: -ms-flex; align-items: center; -ms-flex-align: center; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; }
  div.wcircle-menu-item img { width: 50px; height: 50px; display: block; border-radius: 50%; }
  div.wcircle-menu-item i, div.wcircle-icon i { font-size: 25px; color: #fff; position: relative; z-index: 9999; }
  @media screen and (max-width:768px) {
  div.widget-mobile{
    display: block;
    }
  }
</style>
<script src="js/jQuery.WCircleMenu-min.js"></script>
<script>
  $(document).ready(function(){
    $('#my-menu').WCircleMenu({
      angle_start : -Math.PI,
      delay: 50,
      distance: 80,
      angle_interval: Math.PI/4,
      easingFuncShow:"easeOutBack",
      easingFuncHide:"easeInBack",
      step:5,
      openCallback:false,
      closeCallback:false,
      itemRotation:180,
      iconRotation:180,
    });
  })
</script>
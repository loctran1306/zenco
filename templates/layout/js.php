<script type="text/javascript"> var com = '<?=$_GET['com']?>'; config_phi = '<?=$config['phi']?>'; source ='<?=$source?>'; nhaptukhoatimkiem = '<?=_nhaptukhoatimkiem?>'; xinnhaphoten='<?=_xinnhaphoten?>'; xinnhapdiachi='<?=_xinnhapdiachi?>'; xinnhapdienthoai='<?=_xinnhapdienthoai?>'; checkdienthoai='<?=_checkdienthoai?>'; xinnhapemail='<?=_xinnhapemail?>'; xinnhaptieude='<?=_xinnhaptieude?>'; xinnhapnoidung='<?=_xinnhapnoidung?>'; checkemail='<?=_checkemail?>'; nhapdiachiemail='<?=_nhapdiachiemail?>'; dangkythanhcong='<?=_dangkythanhcong?>'; dangkykhongthanhcong='<?=_dangkykhongthanhcong?>'; emaildaduocdangky='<?=_emaildaduocdangky?>'; goidien='<?=_goidien?>'; chiduong='<?=_chiduong?>'; diachi='<?=$row_setting['diachi_'.$lang]?>'; dienthoai='<?=$row_setting['dienthoai']?>'; email='<?=$row_setting['email']?>'; tencongty='<?=$row_setting['ten_'.$lang]?>'; zalo='https://zalo.me/<?=str_replace(' ','',str_replace('.','',$row_setting['zalo']))?>'; hotline='tel:<?=str_replace(' ','',str_replace('.','',$row_setting['hotline']))?>'; chiduong='<?=$row_setting['chiduong']?>'; facebook='<?=$row_setting['facebook']?>'; tongxem ='<?php $count=count_online();echo $tong_xem=$count['dangxem'];?>'; tong='<?php $count=count_online();echo $tong_xem=$count['daxem'];?>'; themsanpham ='<?=_themsanpham ?>'; vaogiohangthanhcong = '<?=_vaogiohangthanhcong?>'; bancochacchanxoasp  = '<?=_bancochacchanxoasp?>'; xinchonthanhpho = '<?=_xinchonthanhpho?>'; xinchonquanhuyen = '<?=_xinchonquanhuyen?>'; bancomuonxoatoanbogiohang = '<?=_bancomuonxoatoanbogiohang?>'; </script>
<script>var isIE = false || !!document.documentMode;if(isIE==true){window.top.location = 'detect.html';}</script>
<script type="text/javascript"> var _DOCTOR = _DOCTOR || {}; var _BASE = '<?=$config_url?>'; var _LANG = '<?=$lang?>'; </script>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js" ></script>
<script src="js/placeholderTypewriter.js"></script> 
<script src="js/slick.min.js"></script> 
<script type="text/javascript" src="js/fancybox3/jquery.fancybox.min.js?v=2.1.5"></script>
<script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
<?php if($source=='album'){?>
<script src='js/photobox/photobox/jquery.photobox.js'></script>
<?php } ?>
<script src="custom.js"></script> 
<script src="main.js"></script> 
<script src="my_script.js"></script> 
<?php if(($source=='giohang' || $source=='product') &&  $config['cart']=='true'){?>
<script src="js/nprogress.js"></script> 
<script src="js/lobibox.min.js"></script>
<script src="js/giohang.js"></script>
<script src="js/thanhtoan.js"></script>
<div id="popupCartModal" class="modal fade" role="dialog"></div>
<?php } ?>
<?php if($source=='product') {?>
<link href="js/magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="js/magiczoomplus/magiczoomplus.js" ></script>
<?php } ?>
<?php if(!isGoogleSpeed()){?>
  <script src="https://sp.zalo.me/plugins/sdk.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dedf3674cea437b"></script>
<script type="text/javascript">
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.async=true;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11";
  fjs.parentNode.insertBefore(js, fjs); 
}(document, 'script', 'facebook-jssdk'));
</script>
<!-- captcha -->
<script src="https://www.google.com/recaptcha/api.js?render=<?=$config_recaptcha?>"></script>
<script>
grecaptcha.ready(function () {
    grecaptcha.execute('<?=$config_recaptcha?>', { action: 'contact' }).then(function (token) {
        var recaptchaResponse = document.getElementById('recaptchaResponse');
        if(recaptchaResponse){recaptchaResponse.value = token;}
        var recaptchaResponse_dk = document.getElementById('recaptchaResponse_dk');
        if(recaptchaResponse_dk){recaptchaResponse_dk.value = token;}

        var recaptchaResponse_dk2 = document.getElementById('recaptchaResponse_dk2');
        if(recaptchaResponse_dk2){recaptchaResponse_dk2.value = token;}
    });
});
</script>
<?php } ?>


<script type="text/javascript">
function GTranslateFireEvent(a, b) {
    try {
        if (document.createEvent) {
            var c = document.createEvent("HTMLEvents");
            c.initEvent(b, true, true);
            a.dispatchEvent(c)
        } else {
            var c = document.createEventObject();
            a.fireEvent('on' + b, c)
        }
    } catch(e) {}
}
function doGoogleLanguageTranslator(a) {
    if (a.value) a = a.value;
    if (a == '') return;
    var b = a.split('|')[1];
    var c;
    var d = document.getElementsByTagName('select');
    for (var i = 0; i < d.length; i++) if (d[i].className == 'goog-te-combo') c = d[i];
    if (document.getElementById('google_language_translator') == null || document.getElementById('google_language_translator').innerHTML.length == 0 || c.length == 0 || c.innerHTML.length == 0) {
        setTimeout(function () {
            doGoogleLanguageTranslator(a)
        },
        100)
    } else {
        c.value = b;
        GTranslateFireEvent(c, 'change');
        GTranslateFireEvent(c, 'change')
    }
} 
  
function GoogleLanguageTranslatorInit() { 
    new google.translate.TranslateElement({pageLanguage: 'vi', autoDisplay: false }, 'google_language_translator');}
</script>
<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=GoogleLanguageTranslatorInit"></script>


<script type="text/javascript" src="js/wow.min.js"></script> 
<script type="text/javascript">
new WOW().init();
</script>
<?/*
<div class="item pa-rp10  wow fadeInUp animate" data-wow-delay="0.<?=($key+1)?>s">
*/?>
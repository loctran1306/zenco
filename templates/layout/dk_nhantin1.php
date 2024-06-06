<div class="dangkymail_ft clearfix">
    <p class="title_nhantin">Tiêu đề nhận tin</p>
    <form action="index.php" method="POST" name="frm_nhantin" id="frm_nhantin">
    	<input name="hotendk" id="hotendk" type="text" class="input hotendk" placeholder="<?=_hoten?>">

    	<input name="emaildk" id="emaildk" type="text" class="input emaildk" placeholder="<?=_email?>">
		
		<input name="dienthoaidk" id="dienthoaidk" type="text" class="input dienthoaidk" placeholder="<?=_dienthoai?>">

    	<input name="diachidk" id="diachidk" type="text" class="input diachidk" placeholder="<?=_diachi?>">

		<textarea rows="4" name="noidungdk" id="noidungdk" type="text" class="input noidungdk" placeholder="<?=_noidung?>"></textarea>
		<button type="button" onclick="js_nhantin();">Gửi</button>
        <input type="hidden" name="recaptcha_response_dk" id="recaptchaResponse_dk"> 
	</form>
</div>
<style type="text/css">
.title_nhantin{display:block;}
#frm_nhantin input{height:33px; float:left; background:#fff; width: calc(100% - 70px); color: #000; font-size: 14px; outline:none; padding-left: 10px; border:none; font-family: "UTMAvo"; }
#frm_nhantin input::-webkit-input-placeholder{font-size: 12px; font-family: 'UTMAvo'; color: #000; }
#frm_nhantin button{height:33px; width: 70px; cursor:pointer; outline:none; font-family: "UTMAvo"; color: #fff; border: none; background: #373737; font-size: 14px; }
</style>

///my_script.js
<script type="text/javascript">
function js_nhantin(evt) { 
    if(isEmpty(document.getElementById('hotendk'),xinnhaphoten)){
        $('#hotendk').focus();
        return false;
    }

    if(isEmpty(document.getElementById('emaildk'), xinnhapemail)){
       $('#emaildk').focus();
        return false;
    }
    if(!check_email($('#emaildk').val())){
        alert(checkemail);
        $('#emaildk').focus();
        return false;
    }

    if(isEmpty(document.getElementById('dienthoaidk'), xinnhapdienthoai)){
       $('#dienthoaidk').focus();
        return false;
    }
    
    if(!isPhone(($('#dienthoaidk').val()), checkdienthoai)){
        $('#dienthoaidk').focus();
        return false;
    }
    
    if(isEmpty(document.getElementById('diachidk'), xinnhapdiachi)){
        $('#diachidk').focus();
        return false;
    }
    
    if(isEmpty(document.getElementById('noidungdk'), xinnhapnoidung)){
        $('#noidungdk').focus();
        return false;
    }
    $('#frm_nhantin').submit();
} 
</script>
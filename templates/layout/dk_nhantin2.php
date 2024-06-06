<div id="dangkyhoc" style="display: none;">
    <div class="title_nhantin">
        <p><?=_datlichhen?></p>
        <span><?=_dienn?></span>
    </div>
    <div class="div_dknhantin">
        <form action="index.php" method="POST" name="frm_nhantin" id="frm_nhantin2">
            <input name="hotendk" id="hotendk2" type="text" class="input hotendk" placeholder="<?=_hoten?>">
            <input name="dienthoaidk" id="dienthoaidk2" type="text" class="input dienthoaidk" placeholder="<?=_dienthoai?>">
            <input name="emaildk" id="emaildk2" type="text" class="input emaildk" placeholder="<?=_email?>">
            <input name="diachidk" id="diachidk2" type="text" class="input diachidk" placeholder="<?=_diachi?>">
            <textarea rows="4" name="noidungdk" id="noidungdk2" type="text" class="input noidungdk" placeholder="<?=_noidung?>"></textarea>
            <div class="button-click">
                <div class="center">                
                    <button type="button" onclick="js_nhantin2();"><?=_dangkyngay?></button>
                </div>
            </div>
            <input type="hidden" name="recaptcha_response_dk" id="recaptchaResponse_dk2"> 
        </form>
    </div>
</div>

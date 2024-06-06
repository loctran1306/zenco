<h1 class="visit_hidden fn"><?=$title_detail?></h1>
<div class="wrap_background_aside mgt-20 mgb-30">
    <div class="margin-auto">
        <div class="conts d-flex jus-center tpl-full">
            <div class="row-contact d-flex flex-between flex-wrap">
                <div class="title_main_page item-contact">
                    <div class="main-contact"><?=$row_detail['noidung_'.$lang]?></div>
                </div>
                <div class="desc_main_page item-contact">
                    <form class="form-contact" method="post" action="" enctype="multipart/form-data">
                        <div class="d-flex flex-between flex-wrap row-coljn">
                            <div class="input-contact coljn-6 mb-20">
                                <input type="text" class="form-control" id="ten" name="ten" placeholder="<?=_hoten?>" required />
                            </div>
                            <div class="input-contact coljn-6 mb-20">
                                <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?=_dienthoai?>" required />
                            </div>         
                        </div>
                        <div class="d-flex flex-between flex-wrap row-coljn">
                            <div class="input-contact coljn-6 mb-20">
                                <input type="text" class="form-control" id="diachi" name="diachi" placeholder="<?=_diachi?>" required />
                            </div>
                            <div class="input-contact coljn-6 mb-20">
                                <input type="email" class="form-control" id="email" name="email" placeholder="<?=_email?>" required />
                            </div>
                        </div>
                        <div class="input-contact mb-20">
                            <input type="text" class="form-control" id="tieude" name="tieude" placeholder="<?=_chude?>" required />
                        </div>
                        <div class="input-contact mb-20">
                            <textarea class="form-control" id="noidung" name="noidung" placeholder="<?=_noidung?>" required /></textarea>
                        </div>
                        <input type="submit" class="btn btn-success" name="submit-contact" value="<?=_guithongtinlienhe?>" />
                        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                    </form>
                </div>
            </div>
            <div class="wa_contacts">
              <?=$row_setting['iframe']?>
          </div>
        </div>
    </div> 
   
</div>
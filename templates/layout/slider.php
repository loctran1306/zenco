<?php 
    $d->reset();
    $sql_slider = "select link,ten_$lang as ten,mota_$lang as mota,photo_$lang as photo,thumb_$lang as thumb from #_photo where hienthi=1 and type='slider' order by stt,id desc";
    $d->query($sql_slider);
    $result_slider = $d->result_array();  


    $d->reset();
    $sql_slider = "select link,ten_$lang as ten,mota_$lang as mota,photo_$lang as photo,thumb_$lang as thumb from #_photo where hienthi=1 and type='slider_mb' order by stt,id desc";
    $d->query($sql_slider);
    $result_slider_mb = $d->result_array();  


    $d->reset();
    $sql = "select id,ten_$lang,tenkhongdau,thumb,photo,mota_$lang from #_product_list where hienthi=1 and type='san-pham' and noibat!=0 order by stt,id limit 0,12";
    $d->query($sql);
    $list_hla = $d->result_array();
?>

<?php if(isGoogleSpeed()){?>
        <section id="slider" class="slider-one slider_deptop">
            <div class="home-slider owl-carousel owl-theme owl-carousel-loop in-home"  data-dot="0" data-nav='1' data-loop='1' data-play='1' data-lg-items='1' data-md-items='1' data-sm-items='1' data-xs-items="1" data-margin='0'>
                <div>
                    <div class="inner-img">
                        <img src="<?=_upload_hinhanh_l.'1366x620x1/'.$result_slider[0]['photo']?>" alt="<?=$result_slider[0]['ten']?>">
                        <div class="postion" style="display: none;">
                            <h5 class="slide-caption__title"><?=$result_slider[0]['name']?></h5>
                            <p class="slide-caption__desc"><?=$result_slider[0]['descs']?></p>
                            <p class="slide-caption__btn"><a href="<?=$result_slider[0]['link']?>">Xem thêm</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php }else{?>
    <section id="slider" class="slider-one slider_deptop">
        <div class="home-slider owl-carousel owl-theme owl-carousel-loop in-home"  data-dot="0" data-nav='1' data-loop='1' data-play='1' data-lg-items='1' data-md-items='1' data-sm-items='1' data-xs-items="1" data-margin='0'>
            <?php foreach ($result_slider as $k => $v){ ?>
            <div onclick="window.location.href='<?=$v['link']?>'" style="cursor: pointer;" target="_blank">
                <div class="inner-img">
                    <img src="<?=_upload_hinhanh_l.'1366x620x1/'.$v['photo']?>" alt="<?=$v['ten']?>">
                    <div class="postion" style="display: none;">
                        <h5 class="slide-caption__title"><?=$v['name']?></h5>
                        <p class="slide-caption__desc"><?=$v['descs']?></p>
                        <p class="slide-caption__btn"><a href="<?=$v['link']?>">Xem thêm</a></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <section id="slider" class="slider-one slider_moblie">
        <div class="home-slider owl-carousel owl-theme owl-carousel-loop in-home"  data-dot="0" data-nav='1' data-loop='1' data-play='1' data-lg-items='1' data-md-items='1' data-sm-items='1' data-xs-items="1" data-margin='0'>
            <?php foreach ($result_slider_mb as $k => $v){ ?>
            <div onclick="window.location.href='<?=$v['link']?>'" style="cursor: pointer;" target="_blank">
                <div class="inner-img">
                    <img src="<?=_upload_hinhanh_l.'980x580x1/'.$v['photo']?>" alt="<?=$v['ten']?>">
                    <div class="postion" style="display: none;">
                        <h5 class="slide-caption__title"><?=$v['name']?></h5>
                        <p class="slide-caption__desc"><?=$v['descs']?></p>
                        <p class="slide-caption__btn"><a href="<?=$v['link']?>">Xem thêm</a></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

<?php }?>
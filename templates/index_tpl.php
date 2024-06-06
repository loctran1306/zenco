
<div class="pro_index pad-50">
  <div class="margin-auto d-flex flex-between">
    <div class="left_pro wow slideInLeft animate" data-wow-delay="0.4s">
      <?php include _template."layout/left.php";?>
    </div>
    <div class="right_pro wow slideInRight animate">
      <div class="til_product"><h2 class="p-relative"><?=_sanphammoi?></h2></div>
      <div class="ma-rp10 d-flex">
        <?php foreach ($product_spm as $key => $v) {?>
          <div class="item-3 pa-rp10 p-relative wow fadeInDown animate" data-wow-delay="0.<?=($key+2)?>s">
              <div class="item-inner">
                  <div class="item-thumb">
                      <div class="hidden__img zoom">
                          <a class="ig_spmoi" href="<?=$v['tenkhongdau']?>">
                              <img src="<?=_upload_product_l?>270x270x1/<?=$v['photo']?>" alt="<?=$v['ten_'.$lang]?>" />
                          </a>
                          <?php if($v['new']!=0){?>
                            <span class="sp_hot">New</span>
                          <?php } ?>
                      </div>
                      <div class="them_spm"><a href="<?=$v['tenkhongdau']?> "><?=_xemthem?></a></div>
                  </div>
                  <div class="item-info">
                      <h3><a href="<?=$v['tenkhongdau']?>"><?=$v['ten_'.$lang]?></a></h3>
                  </div>
              </div>
          </div>
        <?php }?>
      </div>

      <div class="php_duan">
        <div class="til_product">
          <h2 class="p-relative"><?=_duannoibat?></h2>
          <a class="cls_aduan" href="du-an"><?=_xemtatca?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div>
        <div class="sli_project">
          <?php foreach ($duan as $key => $v) {?>
             <div class="item_proj wow fadeInUp animate p-relative" data-wow-delay="0.<?=($key+1)?>s">
                <a class="ig_project p-relative" href="<?=$v['tenkhongdau']?>">
                  <img src="<?=_upload_baiviet_l?>420x260x1/<?=$v['photo']?>" alt="<?=$v['ten_'.$lang]?>" />
                  <div class="them_da"><?=_xemthem?> <i class="fa fa-angle-right" aria-hidden="true"></i></div>
                </a>
                <div class="info_project">
                  <div class="date_project">
                    <span class="day_proj"><?=date('d/m/Y',$v['ngaytao'])?></span>
                    <span class="news_pro"> / NEWS</span>
                  </div>
                  <a class="name_project" href="<?=$v['tenkhongdau']?>"><?=$v['ten_'.$lang]?> </a>
                </div>
             </div>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="php_doitac pad-60">
  <div class="margin-auto">
      <div class="chaydoitac ma-rp10">
          <?php if($doitac) {?>
            <?php foreach ($doitac as $k) { ?>
              <div class="item_doitac wow zoomIn animate pa-rp10">
                  <a class="ig_doitac" href="<?=$k['link']?>" target="_bank"  title="<?=$k['ten_'.$lang]?>">
                      <img src="<?=_upload_hinhanh_l?>170x90x2/<?=$k['photo_vi']?>" alt="<?=$k['ten_'.$lang]?>" />
                  </a>
              </div>
            <?php } ?>
          <?php } ?>
      </div>
  </div>
</div>
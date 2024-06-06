<?php
    $d->reset();
    $sql = "select * from #_yahoo where hienthi=1 order by stt";
    $d->query($sql);
    $row_yahoo = $d->result_array();

    $d->reset();
    $sql = "select ten_$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and type='san-pham' order by stt,id";
    $d->query($sql);
    $row_list = $d->result_array();

    $d->reset();
    $sql = "select id,links,ten_vi , photo from #_video where hienthi=1 and type='video' order by stt";
    $d->query($sql);
    $result_video = $d->result_array(); 

    $d->reset();
    $sql = "select ten,thumb,url from #_lkweb where hienthi=1 and type='lkweb' order by stt,id";
    $d->query($sql);
    $lienket = $d->result_array();
  
?>

  <div class="khung_danhmuc">
        <div class="thanh clearfix"><p><?=_danhmucsanpham?></p></div>
        <div id="danhmuc" class="danhmuc danhmuc1">
          <?php if($row_list) {?>
              <ul>
                <?php foreach($row_list as $k=>$v){?>
                <?php
                  $d->reset();
                  $sql = "select ten_$lang as ten,tenkhongdau,id from #_product_cat where hienthi=1 and id_list='".$v['id']."' and type='san-pham' order by stt,id";
                  $d->query($sql);
                  $row_cat = $d->result_array();
                ?>
                  <li>
                    <a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a>
                    <span class="btn_click"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                      <?php if($row_cat) {?>
                          <ul>
                              <?php foreach($row_cat as $h =>$j){?>
                                <li><a href="<?=$j['tenkhongdau']?>" title="<?=$j['ten']?>"><?=$j['ten']?></a>
                                   </li>
                              <?php } ?>
                          </ul>
                        <?php } ?>
                   </li>
                <?php } ?>
              </ul>
          <?php } ?>
        </div>
  </div>



<div class="khung_danhmuc">
      <div class="thanh clearfix"><p>Hotline <?=_tuvan?></p></div>
      <div id="danhmuc" class="danhmuc">
        <div class="top_yahoo ">
          <?php if($row_yahoo) {?>
              <?php foreach ($row_yahoo as $key => $v) {?>
                <div class="item_yaho">
                  <a class="yaho1" href=""><img src="images/user.png"><?=$v['ten_'.$lang]?></a>
                  <p class="yaho2"><img src="images/dthoai.png">Tel: <?=$v['dienthoai']?>  <?=$v['viber']?> </p>
                  <p class="yaho3"><img src="images/email1.png"><?=$v['email']?> </p>
                </div>
              <?php }?>
          <?php } ?>
        </div>
        <div class="lienket">
            <?php foreach($lienket as $k){?>
              <a href="<?=$k['url']?>" target="_blank"><img src="<?=_upload_hinhanh_l?><?=$k['thumb']?>" alt="<?=$k['ten']?>" /></a>
            <?php } ?>
        </div>
      </div>
</div>

<div class="khung_danhmuc">
      <div class="thanh clearfix"><p>Video <?=_noibat?></p></div>
      <div id="danhmuc" class="danhmuc">
        

        <div class="slic-vds">
          <?php foreach($result_video as $k){?> 
              <div class="box_vds">
                    <div class="img_vds">
                        <div class="hidden__img play_vds">
                            <a href="<?=$k['links']?>" data-fancybox>
                              <img src="<?=_upload_hinhanh_l?>243x137x1/<?=$k['photo']?>" alt="<?=$k['ten_'.$lang]?>" onerror="this.src='//placehold.it/243x137';" />
                            </a>
                        </div>
                    </div>
                    <h3 class="info_vds"><a class="ten_vds" href="<?=$k['links']?>" data-fancybox><?=$k['ten_'.$lang]?></a></h3>
                </div> 
          <?php } ?>
        </div>  


      </div>
</div>




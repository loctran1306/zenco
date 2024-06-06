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
    $sql = "select ten_$lang as ten,tenkhongdau,id from #_baiviet_list where hienthi=1 and type='".$type_bar."' order by stt,id";
    $d->query($sql);
    $row_list_news = $d->result_array();

    
    $d->reset();
    $sql = "select ten_$lang as ten ,tenkhongdau,id,ngaytao,photo from #_baiviet where hienthi=1 and type='du-an' order by ngaytao,id";
    $d->query($sql);
    $news_latest_da = $d->result_array();

    $d->reset();
    $sql = "select ten_$lang as ten,tenkhongdau,id,ngaytao,photo from #_baiviet where hienthi=1 and type='xuat-nhap-khau' order by ngaytao,id";
    $d->query($sql);
    $news_latest_snk= $d->result_array();

    $d->reset();
    $sql = "select ten_$lang as ten ,tenkhongdau,id,ngaytao,photo from #_baiviet where hienthi=1 and type='giai-phap' order by ngaytao,id";
    $d->query($sql);
    $news_latest_gp = $d->result_array(); 


    $d->reset();
    $sql = "select ten_$lang as ten,tenkhongdau,id from #_baiviet where hienthi=1 and type='gioi-thieu' order by stt,id";
    $d->query($sql);
    $row_list_gt = $d->result_array();

    $d->reset();
    $sql = "select id,links,ten_vi , photo from #_video where hienthi=1 and type='video' order by stt";
    $d->query($sql);
    $result_video = $d->result_array(); 
  
?>

<?php if ($source=='product') {?>
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
<?php }elseif ($source=='new' || $com=='du-an') {?>
    <div class="khung_danhmuc">
      <div class="thanh clearfix"><p><?=_duancuachungtoi?></p></div>
      <div id="danhmuc" class="danhmuc danhmuc1">
        <?php if($news_latest_da) {?>
            <ul>
              <?php foreach($news_latest_da as $k=>$v){?>
              
                <li>
                  <a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a>
                  
                 </li>
              <?php } ?>
            </ul>
        <?php } ?>
      </div>
  </div>
<?php }elseif($source=='new' || $com=='xuat-nhap-khau'){?>
  <div class="khung_danhmuc">
      <div class="thanh clearfix"><p><?=_xuatnhapkhau?></p></div>
      <div id="danhmuc" class="danhmuc danhmuc1">
        <?php if($news_latest_snk) {?>
            <ul>
              <?php foreach($news_latest_snk as $k=>$v){?>
              
                <li>
                  <a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a>
                  
                 </li>
              <?php } ?>
            </ul>
        <?php } ?>
      </div>
  </div>
<?php }elseif($source=='new' || $com=='giai-phap'){?>

    <div class="khung_danhmuc">
      <div class="thanh clearfix"><p><?=_giaiphapnoibat?></p></div>
      <div id="danhmuc" class="danhmuc danhmuc1">
        <?php if($news_latest_gp) {?>
            <ul>
              <?php foreach($news_latest_gp as $k=>$v){?>
              
                <li>
                  <a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a>
                  
                 </li>
              <?php } ?>
            </ul>
        <?php } ?>
      </div>
  </div>
<?php }elseif($source=='new' || $com=='tuyen-dung'){?>

    <div class="khung_danhmuc">
      <div class="thanh clearfix"><p><?=_giaiphapnoibat?></p></div>
      <div id="danhmuc" class="danhmuc danhmuc1">
        <?php if($news_latest_gp) {?>
            <ul>
              <?php foreach($news_latest_gp as $k=>$v){?>
              
                <li>
                  <a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a>
                  
                 </li>
              <?php } ?>
            </ul>
        <?php } ?>
      </div>
  </div>
<?php }elseif($source=='new' || $com=='tin-tuc'){?>

    <div class="khung_danhmuc">
      <div class="thanh clearfix"><p><?=_giaiphapnoibat?></p></div>
      <div id="danhmuc" class="danhmuc danhmuc1">
        <?php if($news_latest_gp) {?>
            <ul>
              <?php foreach($news_latest_gp as $k=>$v){?>
              
                <li>
                  <a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a>
                  
                 </li>
              <?php } ?>
            </ul>
        <?php } ?>
      </div>
  </div>

<?php }elseif ($com=='gioi-thieu') {?>
    <div class="khung_danhmuc">
  
    <div id="danhmuc" class="danhmuc danhmuc1">
      <?php if($row_list_gt) {?>
          <ul>
            <?php foreach($row_list_gt as $k=>$v){?>
            
              <li>
                <a href="<?=$v['tenkhongdau']?>" title="<?=$v['ten']?>"><?=$v['ten']?></a>
                <span class="btn_click"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                  
               </li>
            <?php } ?>
          </ul>
      <?php } ?>
    </div>
</div>
<?php }?>




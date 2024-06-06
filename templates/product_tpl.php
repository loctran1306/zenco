<div class="wrap_background_aside mgt-20 mgb-30">
    <div class="margin-auto">
        <div class="d-flex flex-between tpl-product ">
            <div class="right-content sidebar-site">
                <?php include _template."layout/sidebar.php";?>
            </div>
            <div class="left-content">
                <div class="title_main_page">
                    <h1 class="title-head"><?=$title_detail?></h1>
                    <?php if ($motal_detail) {?>
                      <div class="motal_dtail"><?=$motal_detail?></div>
                    <?php }?>
                </div>
                <?php if(count($product)!=0){?>
                    <div class="list-product d-flex ma-rp10">
                        <?php foreach($product as $v){?> 
                            <div class="item-3 pa-rp10 p-relative">
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
                        <?php } ?>
                    </div>  
                    <div class="paging paging-site"><?=$paging?></div>
                <?php } else { ?>
                    <div class="update_content"><?=_noidungdangcapnhat?></div> 
                <?php }?>
            </div>

        </div>
    </div> 
</div>
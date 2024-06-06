<div class="wrap_background_aside mgt-20 mgb-30">
    <div class="margin-auto">
        <div class="d-flex flex-between tpl-product tpl-full">
            <div class="left-content">
                <div class="title_main_page">
                    <h1 class="title-head"><?=$title_detail?> <?=_voitukhoa?><span> '<?=$_GET['keywords']?>'</span></h1>
                </div>
                <?php if(count($product)!=0){?>
                    <div class="list-product d-flex ma-rp10">
                        <?php foreach($product as $v){?> 
                            <div class="item pa-rp10 p-relative">
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
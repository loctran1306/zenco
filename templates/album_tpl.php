<div class="wrap_background_aside mgt-20 mgb-30">
    <div class="margin-auto">
        <div class="d-flex flex-between tpl-product tpl-full">
            <div class="left-content">
                <div class="title_main_page">
                    <h1 class="title-head"><?=$title_detail?></h1>
                </div>
                <?php if(count($album)!=0){?>
                    <div class="list-album d-flex ma-rp15">
                        <?php foreach($album as $k){?> 
                            <div class="box-album pa-rp15">
                                  <div class="img-album">
                                      <div class="hidden_img">
                                          <a href="<?=$k['tenkhongdau']?>">
                                            <img src="<?=_upload_album_l?>300x250x1/<?=$k['photo']?>" alt="<?=$k['ten_'.$lang]?>" onerror="this.src='//placehold.it/300x250';" />
                                          </a>
                                      </div>
                                  </div>
                                  <h3><a href="<?=$k['tenkhongdau']?>"><?=$k['ten_'.$lang]?></a></h3>
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
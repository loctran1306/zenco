<div class="wrap_background_aside mgt-20 mgb-30">
    <div class="margin-auto">
        <div class="d-flex flex-between tpl-full">
            <div class="left-content">
                <div class="article-main">
                    <div class="title_main_page">
                        <h1 class="title-head"><?=$title_detail?></h1>
                    </div>
                    <?php if(count($album_images)!=0){?>
                        <div class="list-album d-flex ma-rp5" id="photobox">
                            <?php foreach($album_images as $k){?> 
                                <div class="box-album pa-rp5">
                                      <div class="img-album">
                                          <div class="hidden_img">
                                              <a href="<?=_upload_album_l?><?=$k['photo']?>">
                                                <img src="<?=_upload_album_l?>300x250x1/<?=$k['photo']?>" alt="<?=$k['ten_'.$lang]?>" onerror="this.src='//placehold.it/300x250';" />
                                              </a>
                                          </div>
                                      </div>
                                  </div> 
                            <?php } ?>
                        </div> 
                        <div class="content-album mgt-20"><?=$album_detail['noidung_'.$lang]?></div>
                    <?php } else { ?>
                        <div class="update_content"><?=_noidungdangcapnhat?></div> 
                    <?php }?>
                    <div class="related-album mgt-20">
                        <h3 class="title-related-album"><?=$title_detail?> <?=_lienquan?></h3>
                        <?php if(count($album)!=0){?>
                                <div class="d-flex ma-rp5">
                                    <?php foreach($album as $k){?>
                                        <div class="list-album box-album pa-rp5">
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
                        <?php } else { ?>
                        <div class="update_content"><?=_noidungdangcapnhat?></div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
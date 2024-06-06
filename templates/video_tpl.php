<div class="wrap_background_aside mgt-20 mgb-30">
    <div class="margin-auto">
        <div class="d-flex flex-between tpl-full">
            <div class="left-content">
                <div class="title_main_page">
                    <h1 class="title-head"><?=$title_detail?></h1>
                </div>
                <?php if(count($video)!=0){?>
                    <div class="list-video d-flex ma-rp15">
                        <?php foreach($video as $k){?> 
                            <div class="box-video pa-rp15">
                                  <div class="img-video">
                                      <div class="hidden__img play-video">
                                          <a href="<?=$k['links']?>" data-fancybox>
                                            <img src="https://img.youtube.com/vi/<?=getYoutubeIdFromUrl($k['links'])?>/sddefault.jpg" border="0" align="left" />
                                          </a>
                                      </div>
                                  </div>
                                  <h3><a href="<?=$k['links']?>" data-fancybox><?=$k['ten_'.$lang]?></a></h3>
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
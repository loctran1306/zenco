<div class="wrap_background_aside mgt-20 mgb-30">
    <div class="margin-auto">
        <div class="title_main_page">
            <h1 class="title-head"><?=$title_detail?></h1>
        </div>
        <div class="d-flex flex-between">
            <div class="right-content sidebar-site">
                <?php include _template."layout/sidebar.php";?>
            </div>
            <div class="left-content list-blog-page">
                <?php if(count($tintuc)!=0){?>
                    <div class="list-blogs blog-main">
                        <?php foreach($tintuc as $k){?> 
                            <div class="blog-item">
                                <div class="blog-item-thumbnail zoom-thumbnail">
                                    <a href="<?=$k['tenkhongdau']?>">
                                        <img src="<?=_upload_baiviet_l?>300x200x1/<?=$k['photo']?>" alt="<?=$k['ten_'.$lang]?>">
                                    </a>
                                </div>
                                <div class="blog-item-mains">
                                    <h3 class="blog-item-name"><a href="<?=$k['tenkhongdau']?>"><?=$k['ten_'.$lang]?></a></h3>
                                    <div class="post-time">
                                        <span class="time"><?=date('h:i',$k['ngaytao'])?> -</span>
                                        <span class="date"><?=date('d/m/Y',$k['ngaytao'])?></span>
                                    </div>
                                    <div class="blog-item-summary"><?=$k['mota_'.$lang]?></div>
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
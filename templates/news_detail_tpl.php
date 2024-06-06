<div class="wrap_background_aside mgt-20 mgb-30">
    <div class="margin-auto">
        <div class="d-flex flex-between">
            <div class="right-content sidebar-site">
                <?php include _template."layout/sidebar.php";?>
            </div>
            <div class="left-content">
                <div class="article-main">
                    <h1 class="title-head"><?=$row_detail['ten_'.$lang]?></h1>
                    <div class="postby">
                        <span><?=_dangboi?><b> Admin</b> <?=_vaoluc?> <?=date('H:i - d/m/Y',$row_detail['ngaytao']);?></span>
                    </div>
                    <?php if($row_detail['mota_'.$lang]) {?>
                    <div class="blog_related content-descblog">
                         <?=catchuoi(strip_tags($row_detail['mota_'.$lang]),600)?>
                    </div>
                    <?php } ?>
                    <div class="content-blog">
                        <div><?=$row_detail['noidung_'.$lang]?></div>
                        <div class="wrap-shareblog">
                            <div class="zalo-share-button" data-href="<?=getCurrentPageURL()?>" data-oaid="579745863508352884" data-layout="1" data-color="blue" data-customize=false></div>
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>
                    </div>
                    <?php if($tintuc){?>
                        <h3 class="title-blog_related"><?=_tinlienquan?></h3>
                        <div class="blog_related">
                            <?php foreach($tintuc as $k){?>
                                <h3 class="blog_entry-title"><a href="<?=$k['tenkhongdau']?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?=$k['ten_'.$lang]?></a></h3>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            
        </div>
    </div> 
</div>
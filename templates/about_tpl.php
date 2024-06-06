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
                        <span><?=_dangboi?><b> Admin</b> <?=_vaoluc?> <?=date('H:i - d/m/Y',$row_detail['ngaysua']);?></span>
                    </div>
                    <div class="content-blog">
                        <div><?=$row_detail['noidung_'.$lang]?></div>
                        <div class="wrap-shareblog">
                            <div class="zalo-share-button" data-href="<?=getCurrentPageURL()?>" data-oaid="579745863508352884" data-layout="1" data-color="blue" data-customize=false></div>
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div> 
</div>
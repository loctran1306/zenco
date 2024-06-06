<div class="wrap_background_aside mgt-20 mgb-30">
    <div class="margin-auto">
        <div class="d-flex flex-between tpl-product">
            <div class="left-content-pro">
                <div class="details-product d-flex flex-between">
                    <div class="product-image-block">
                        <div class="large-image" >
                            <div class="slick-large_produc">
                                <a id="Zoom-1" class="item-imagepro MagicZoom" href="<?=_upload_product_l.'420x420x1/'.$row_detail['photo']?>">
                                    <img src="<?=_upload_product_l.'420x420x1/'.$row_detail['photo']?>" alt="<?=$row_detail['ten_'.$lang]?>"/>
                                </a>
                            </div>
                        </div>
                        <div class="thumb_produc">
                            <div class="slick-thumb_produc selectors nav">
                                <a class="item-imagepro mz-thumb-selected" data-zoom-id="Zoom-1" href="<?=_upload_product_l.'420x420x1/'.$row_detail['photo']?>">
                                    <img src="<?=_upload_product_l.'420x420x1/'.$row_detail['photo']?>" alt="<?=$row_detail['ten_'.$lang]?>"/>
                                </a>
                                <?php foreach($product_photos as $k=>$v){?>
                                  <a class="item-imagepro" data-zoom-id="Zoom-1" href="<?=_upload_product_l.'420x420x1/'.$v['photo']?>">
                                    <img src="<?=_upload_product_l.'420x420x1/'.$v['photo']?>" alt="<?=$row_detail['ten_'.$lang]?>"/>
                                  </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="details-pro">
                        <h1 class="title-head loading-skeleton"><?=$row_detail['ten_'.$lang]?></h1>
                       <?php if($row_detail['masp']){?>
                           <div class="group-status">
                               <span class="first_status"><?=_ma?>: <span class="status_name"><?=$row_detail['masp']?></span></span>
                           </div>
                       <?php } ?>
                        <div class="special-price">
                            <span class="price-detail">
                                <?php if($row_detail['giaban']==0) echo _lienhe; else echo number_format ($row_detail['giaban'],0,",",".")."đ";?>
                                    
                            </span>
                            <?php if($row_detail['giacu']>0) {?><span class="price-detail-old"><del><?=number_format ($row_detail['giacu'],0,",",".")."đ";?></del></span><?php } ?>
                        </div>
                        <?php if($config['cart']=='true'){?>
                        <div class="item_des_detail block-border-botom">
                            <div class="product-qty">
                                <div class="show tit-desc-detail"><?=_dathang?>:</div>
                                <div class="row-add-cart">
                                    <div class="controls">
                                        <button class="">-</button>
                                        <input type="text" value="1" readonly id="qty" />
                                        <button class="is-up">+</button>
                                    </div>
                                    <div class="cart">
                                      <button class="add-cart" id="add-cart" data-id="<?=$row_detail['id']?>" data-name="<?=$row_detail['ten_'.$lang]?>" data-status="addCart"><?=_themvaogiohang?></button>
                                      <button class="add-cart" id="buynow" data-id="<?=$row_detail['id']?>" data-name="<?=$row_detail['ten_'.$lang]?>" data-status="buynow"><?=_muangay?></button>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <?/*
                        <?php if($row_detail['mota_'.$lang]!='') {?>
                        <div class="item_des_detail block-border-botom">
                            <?=nl2br($row_detail['mota_'.$lang])?>                      
                        </div>
                        <?php } ?>
                        */?> 

                        <div class="item_des_detail">
                            <span><?=_luotxem?>: <?=$row_detail['luotxem']?></span>                       
                        </div>

                        <div class="item_des_detail item_des_social" style="border:none;display: flex;">
                              <div class="zalo-share-button" data-href="<?=getCurrentPageURL()?>" data-oaid="579745863508352884" data-layout="1" data-color="blue" data-customize=false></div><div class="addthis_inline_share_toolbox"></div>
                        </div> 
                    </div>
                </div>

                <div id="container_product" class="mgt-20">
                    <div id="tabs" class="clearfix">
                        <ul>
                            <li class="active"><a href="tab-1"><?=_thongtinchitiet?></a></li>
                            
                        </ul>
                        <div class="content_tabdetail">
                            <div id="tab-1" class="tab_detail_product active">
                                <div class="content-detail">
                                      <?=$row_detail['noidung_'.$lang]?> 
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>

                <div class="related-product mgt-30">
                    <h3 class="title-related-product"><?=_sanphamlienquan?></h3>
                    <?php if(count($product)!=0){?>
                            <div class="slick-related-product nav list-product d-flex ma-rp10">
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
                                                  <div class="them_spm"><a href="<?=$v['tenkhongdau']?> "><?=_xemthem?></a></div>
                                              </div>
                                              <div class="item-info">
                                                  <h3><a href="<?=$v['tenkhongdau']?>"><?=$v['ten_'.$lang]?></a></h3>
                                              </div>
                                          </div>
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
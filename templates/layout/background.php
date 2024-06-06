<?php
    if($config['banner']=='true'){
    $d->reset();
    $sql= "select thumb_$lang,photo_$lang from #_photo where type='breadcrumb-bg'";
    $d->query($sql);
    $breadcrumb_bg = $d->fetch_array();
    $style_breadcrumb = "style=background-image:url("._upload_hinhanh_l.$breadcrumb_bg['photo_'.$lang].");background-size:cover;background-repeat:no-repeat";
    }

    $d->reset();
    $sql_banner_top= "select thumb_$lang from #_photo where type='bg_ft'";
    $d->query($sql_banner_top);
    $bg_ft = $d->fetch_array();

    $d->reset();
    $sql_banner_top= "select thumb_$lang from #_photo where type='logo'";
    $d->query($sql_banner_top);
    $logo_top = $d->fetch_array();

    $d->reset();
    $sql_banner_top= "select thumb_$lang from #_photo where type='banner'";
    $d->query($sql_banner_top);
    $banner_top = $d->fetch_array();
?>

<div id="loader-wrapper"><img src="<?=_upload_hinhanh_l.$logo_top['thumb_'.$lang]?>" alt="Logo"></div>

<style type="text/css">
body{background: #f9f9f9;height: 100%;margin: 0 auto;position: relative;}
</style>

<!-- bg_header -->


<?php if($bg_ft) { ?>
    <style type="text/css">
    #footer{
        background: var(--color-r) url(<?=_upload_hinhanh_l.$bg_ft['thumb_'.$lang]?>) top center no-repeat;
        background-size: cover;
    }
    </style>
<?php } else{?>
    <style type="text/css">#footer{background-color: #fff;} </style>
<?php } ?>

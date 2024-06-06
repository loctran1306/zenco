<?php  if(!defined('_source')) die("Error");

    $d->reset(); 
    $sql_banner_top= "select thumb_$lang from #_photo where type='logo_debug'";
    $d->query($sql_banner_top);
    $images_facebook = $d->fetch_array();
    if($images_facebook['thumb_'.$lang]=='')
    { 
      $d->reset(); 
      $sql_banner_top= "select thumb_$lang from #_photo where type='logo'";
      $d->query($sql_banner_top);
      $images_facebook = $d->fetch_array();
    }

    $d->reset();
    $sql = "select id,ten_$lang,tenkhongdau,giaban,thumb,photo, new from #_product where hienthi=1 and type='san-pham' and new!=0 order by stt,id";
    $d->query($sql);
    $product_spm = $d->result_array();

    $d->reset();
    $sql = "select ten_$lang,tenkhongdau,thumb,mota_$lang,ngaytao, photo from #_baiviet where hienthi=1 and type='du-an' and noibat!=0 order by stt,ngaysua desc";
    $d->query($sql);
    $duan = $d->result_array();

    $d->reset();
    $sql_duan = "select ten_vi,thumb_vi,photo_vi,link from #_photo where hienthi=1 and type = 'doitac' order by stt";
    $d->query($sql_duan);
    $doitac = $d->result_array();
    
    $share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
    $share_facebook .= '<meta property="og:type" content="'.$type_og.'" />';
    $share_facebook .= '<meta property="og:title" content="'.$row_setting['ten_'.$lang].'" />';
    $share_facebook .= '<meta property="og:description" content="'.$row_setting['description'].'" />';
    $share_facebook .= '<meta property="og:image" content="'.$http.$config_url.'/'._upload_hinhanh_l.$images_facebook['thumb_'.$lang].'" />';

    $title_bar = $row_setting['title'];
    $keyword_bar = $row_setting['keywords'];
    $description_bar = $row_setting['description'];
    $title_detail=$row_setting['ten_'.$lang];
    
    if(!empty($_POST)){

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response_dk'])) {
          $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
          $recaptcha_secret = $config_secretkey;
          $recaptcha_response = $_POST['recaptcha_response_dk'];

          // Make and decode POST request:
          $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
          $recaptcha = json_decode($recaptcha);

          // Take action based on the score returned:
          if ($recaptcha->score >= 0.5) {
              // Verified - send email
            $hoten=htmlspecialchars($_POST['hotendk']);
            $diachi=htmlspecialchars($_POST['diachidk']);
            $dienthoai=htmlspecialchars($_POST['dienthoaidk']);
            $email=htmlspecialchars($_POST['emaildk']);
            $noidung=htmlspecialchars($_POST['noidungdk']);


            $d->reset();
            $sql = "select id from #_newsletter where email='".$email."'";
            $d->query($sql);
            $maill = $d->result_array();

            if(count($maill)!=0){
              transfer(_emaildaduocdangky, "index");
            } else {
                $data['email'] =  $email;
                $data['ten'] = $hoten;
                $data['diachi'] = $diachi;
                $data['dienthoai'] = $dienthoai;
                $data['noidung'] = $noidung;
                $data['ngaytao'] = time();
                $d->setTable('newsletter');
                if($d->insert($data)){
                  transfer(_dangkythanhcong, $http.$config_url);
                }else{
                  transfer(_dangkykhongthanhcong, $http.$config_url,false);
                }
              
            }

          }else {transfer(_loicaptcha, $http.$config_url,false);}
      }else{transfer(_loicaptcha, $http.$config_url,false);}

    }
  
?>
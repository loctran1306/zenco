var $t;
function updateCart(){
	NProgress.start();
	$("#main").animate({opacity:"0.9"});
	initAjax({
		url:"ajax/update-cart",
		data:$("#box-shopcart form").serialize(),
		success:function(data){
			refreshCart();
		}
	})
	
}
function refreshCart(){
	$.post("gio-hang",function(data){
		$("#box-shopcart").html(data);
		NProgress.done();
		$("#main").animate({opacity:1});
		updateCartNumber();
	})	
}
function deleteCart(id){
		if(confirm(bancochacchanxoasp)){
		NProgress.start();
		$("#main_content").animate({opacity:".9"});
			initAjax({
				url:"ajax/delete-cart",
				data:{id:id},
				success:function(data){
					refreshCart();
				}
			})
		}
	}
function clearCart(){
		if(confirm(bancomuonxoatoanbogiohang)){
		NProgress.start();
		$("#main_content").animate({opacity:".9"});
		initAjax({
			url:"ajax/clear-cart",
			success:function(data){
				refreshCart();
			}
		})
		}
	}
function updateCartNumber(){
	$.post("ajax/get-cart-num",function(data){
		$("#soluongmua").html(data);
		$('#cart-total').html(data);
	})
}

function doAddCart($name,$id,$qty,$color,$size,$status){
	//NProgress.start();
	initAjax({
		url:"ajax/add-cart",
		data:{id:$id,qty:$qty,color:$color,size:$size},
		success:function(data){
			$("#soluongmua").html(data);
			//$('#cart-total').html(data);
			//showMsg("success",themsanpham+" "+$name+" "+ vaogiohangthanhcong);
			//NProgress.done();
			if($status=='buynow'){
				window.location.href='gio-hang';
			}else{
				showCartMini($name,$id,$qty,$color,$size);
			}
		}
	})
return false;		
}

function addCart(){
	$("#add-cart,#buynow").click(function(){
		$color = 0;
		$size = 0;
		$id = $(this).data("id");
		$qty = parseInt($("#qty").val());
		$status = $(this).data("status");
		if($(".wrap-color").length){
			if($(".wrap-color .color_item.active").length){
				$color = $(".wrap-color .color_item.active").data("id");
			}else{
				alert('Vui lòng chọn màu cho sản phẩm!');
				return false;
			}
		}
		if($(".wrap-size").length){
			if($(".wrap-size .size_item.active").length){
				$size = $(".wrap-size .size_item.active").data("id");
			}else{
				alert('Vui lòng chọn kích thước cho sản phẩm!');
				return false;
			}
			
		}
		doAddCart($(this).data("name"),$id,$qty,$color,$size,$status);
		return false;
	});  
}
function hideCartMini(){
	$("#cart_mini").animate({right:"-100%"},1000);
}
function showCartMini($name,$id,$qty,$color,$size){
	$('#popupCartModal').modal('show');
	initAjax({
		url:"ajax/cart_mini.php",
		data:{id:$id,qty:$qty,color:$color,size:$size},
		success:function(data){	
			$('#popupCartModal').html(data);
		}
	})
}
//Thông báo khi mua
function showMsg(type,msg){
		Lobibox.notify(type, {
		size: 'mini',
		msg: msg,
		delay: 3000,
		showClass: 'zoomIn',
		hideClass: 'zoomOut',
		});    
	}

function delorder_gh(id){
	if(confirm(xacnhanxoasp)){
	$.ajax({
		type:'post',
		url:"ajax/delete-cart.php",
		data:{id:id},
		dataType:"json",
		success:function(data){
				$("#"+id).animate({height:0,opacity:0},function(){
					$(this).remove();
					$("#gio_hang_tong").html(data.total);
					$('#soluongmua').html(data.sl);
					if(data.qty==0){
						$(".empty-cart").removeClass("hide");
						$(".cart-enter, p.total").hide();
					}
					
				})

		}
	})
	}
	return false;
}
function initAjax(options){
  var defaults = { 
    url:      '', 
    type:    'post', 
	data:null,
    dataType:  'html', 
    error:  function(e){console.log(e)},
	success:function(){return false;},
	beforeSend:function(){},
  }; 
  var options = $.extend({}, defaults, options); 
	$.ajax({
		url:options.url,
		data:options.data,
		success:options.success,
		error:options.error,
		type:options.type,
		dataType:options.dataType,
		
	})
}
$().ready(function(){
	$("#cart_mini .close").click(function(){
		$("#cart_mini").animate({right:"-100%"},1000);
	})
});
$.fn.mousehold = function(timeout, f) {
  if (timeout && typeof timeout == 'function') {
    f = timeout;
    timeout = 100;
  }
  if (f && typeof f == 'function') {
    var timer = 0;
    var fireStep = 0;
    return this.each(function() {
      $(this).mousedown(function() {
        fireStep = 1;
        var ctr = 0;
        var t = this;
        timer = setInterval(function() {
          ctr++;
          f.call(t, ctr);
          fireStep = 2;
        }, timeout);
      })

      clearMousehold = function() {
        clearInterval(timer);
        if (fireStep == 1) f.call(this, 1);
        fireStep = 0;
      }
      
      $(this).mouseout(clearMousehold);
      $(this).mouseup(clearMousehold);
    })
  }
}
function controlProductQty(){
  $("button.add-cart").unbind("click");
  $("button.add-cart").click(function(){
    p = $(this).parents(".product-qty");
    return false; 
  })
  
  $(".product-qty .controls button").unbind("mousehold");
  $(".product-qty .controls button").mousehold(function(){

    a = $(this);
    c = $(this).parent().find("input");
    v = parseInt(c.val());
    
    if(a.hasClass("is-up")){
      v++;
    }else{
    v--;
    }
    if(v <1 ){
      v=1;
    }
    
    c.val(v);
    
  })
}
$(document).ready(function(e) {
	controlProductQty();
    addCart();
    $(".item-httt").click(function(){
      var httt=$(this).find(".label-httt").data("httt");
      $(".item-httt .label-httt, .info-httt").removeClass("active");
      $(this).find(".label-httt").addClass("active");
      $(".info-httt-"+httt).addClass("active");
  });
});
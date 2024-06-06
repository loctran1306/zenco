$().ready(function(){
	$(".trans-type input").click(function(){
		NProgress.start();
		$price = $(this).data("price");
		$.ajax({
			url:"ajax/update-transtype",
			data:{price:$price,id:$(this).val()},
			type:"post",
			dataType:"json",
			success:function(data){
				$(".total_cart_max .all-price .price").html(data.price);
				//$(".total_cart_max .all-ship .price").html(data.ship);
				$(".total_cart_max .all-price-all .price").html(data.all);
				NProgress.done();
				
			}
		})
	})
	$(".trans-type input").first().trigger("click");
})

$(document).ready(function(e) {
	$('#thanhpho').change(function(e) {
		var loadajax = "ajax/quan.php?id="+$(this).val();
		setTimeout(function(){$('#quan').load(loadajax)},0);
	});
	if(config_phi==1){
		$('#thanhpho').change(function(e) {
			NProgress.start();
			$.ajax({
				url:"ajax/update-ship",
				data:{id:$(this).val()},
				type:"post",
				dataType:"json",
				success:function(data){
					$("#all_hoadon").html(data.price);
					$("#all_ship").html(data.ship);
					$("#all_thanhtoan").html(data.all);
					NProgress.done();
					
				}
			})
		});
	} else if(config_phi==2){
		$('#quan').change(function(e) {
			NProgress.start();
			$.ajax({
				url:"ajax/update-ship",
				data:{id:$(this).val()},
				type:"post",
				dataType:"json",
				success:function(data){
					$("#all_hoadon").html(data.price);
					$("#all_ship").html(data.ship);
					$("#all_thanhtoan").html(data.all);
					NProgress.done();
					
				}
			})
		});
	}
});

function validEmail(obj) {
	var s = obj.value;
	for (var i=0; i<s.length; i++)
	if (s.charAt(i)==" "){
		return false;
	}
	var elem, elem1;
	elem=s.split("@");
	if (elem.length!=2)	return false;
	if (elem[0].length==0 || elem[1].length==0)return false;
	if (elem[1].indexOf(".")==-1)	return false;
	elem1=elem[1].split(".");
	for (var i=0; i<elem1.length; i++)
	if (elem1[i].length==0)return false;
	return true;
}//Kiem tra dang email
function IsNumeric(sText) {
	var ValidChars = "0123456789";
	var IsNumber=true;
	var Char;
	for (i = 0; i < sText.length && IsNumber == true; i++) 
	{ 
		Char = sText.charAt(i); 
		if (ValidChars.indexOf(Char) == -1) 
		{
			IsNumber = false;
		}
	}
	return IsNumber;
}//Kiem tra dang so

function check()
{	
	var frm = document.frm_order;
	if(frm.hoten.value=='') 
	{ 
		alert(xinnhaphoten);
		frm.hoten.focus();
		return false;
	}
	if(frm.dienthoai.value=='') 
	{ 
		alert(xinnhapdienthoai );
		frm.dienthoai.focus();
		return false;
	}
	
	sodienthoai = frm.dienthoai.value.length;
	
	if((sodienthoai==10 && (frm.dienthoai.value.substr(0,2)==08)) || (sodienthoai==10 && (frm.dienthoai.value.substr(0,2)==09))  || (sodienthoai==10 && (frm.dienthoai.value.substr(0,2)==05)) || (sodienthoai==10 && (frm.dienthoai.value.substr(0,2)==03)) || (sodienthoai==10 && (frm.dienthoai.value.substr(0,2)==07))) 
	{
		
	}
	else
	{
		alert(xinnhapdienthoai);
			frm.dienthoai.focus();
			return false;
	}			
	
	if(frm.thanhpho.value=='') 
	{ 
		alert(xinchonthanhpho);
		frm.thanhpho.focus();
		return false;
	}	
	
	if(frm.quan.value=='') 
	{ 
		alert(xinchonquanhuyen);
		frm.quan.focus();
		return false;
	}
			
	if(frm.diachi.value=='') 
	{ 
		alert(xinnhapdiachi);
		frm.diachi.focus();
		return false;
	}
	if($('#email').val()==''){
        alert(nhapdiachiemail);
        $('#email').focus();
        return false;
    }else if(!check_email($('#email').val())){
        alert(checkemail);
        $('#email').focus();
       return false;
    }									
	frm.submit();	
}

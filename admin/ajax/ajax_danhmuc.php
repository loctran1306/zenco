<?php 
	include_once "ajax_lib.php";
	
	if (isset($_POST["level"])) {
		 $level = (int)$_POST["level"];
		 $table = (string)$_POST["table"];
		 $id=(int)$_POST["id"];
		 $type = (string)$_POST["type"];
		switch ($level) {
			case '0':{
				$id_temp= "id_list";
				break;
			}
			case '1':{
				$id_temp= "id_cat";
				break;
			}
			case '2':{
				$id_temp= "id_item";
				break;
			}
			case '3':{
				$id_temp= "id_cat";
				break;
			}
			default:
				echo 'error ajax'; exit();
				break;
		}
		if($level!=3){
			echo $sql="select * from ".$table." where $id_temp=".$id." and type='".$type."'  order by stt ";
		}else{
			echo $sql="select * from ".$table." where $id_temp=".$id."  order by stt ";
		}
		$stmt=mysql_query($sql);

		if($level!=3){
			$str='
			<option>Chọn danh mục</option>			
			';
		}else{
			$str='
			<option>Chọn Quận/Huyện</option>			
	 	';
		}
		if($level!=3){

			while ($row=@mysql_fetch_array($stmt)) 
			{
				if($row["id"]==(int)@$id_select)
					$selected="selected";
				else 
					$selected="";

				$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
			}
			echo  $str;
		}else{
			while ($row=@mysql_fetch_array($stmt)) 
			{
				if($row["id"]==(int)@$id_select)
					$selected="selected";
				else 
					$selected="";

				$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
			}
			echo  $str;
		}
				
		
	}

?>

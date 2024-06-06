<?php
class breadcrumb{
	public $link;
	
	public function add($name,$link){
		
		$this->link[] = array("name"=>$name,"link"=>$link);
		
	}
	public function display(){
		$str = '<ol id="inner">';
		foreach($this->link as $k=>$v){
			$str.="<li><a class='transitionAll' href='".$v['link']."'>".$v['name']."</a><span><i class='fa fa-angle-right' aria-hidden='true'></i></span></li>";
		}
		$str.="</ol>";
		return $str;
	
	}
}
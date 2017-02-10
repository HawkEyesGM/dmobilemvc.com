<?
class Model_Main extends Model
{
 	public function switch_uk(){
 		$_SESSION["lang"] = "uk";
 		header("Location: /");
 	}

 	public function switch_ua(){
 		$_SESSION["lang"] = "ua";
 		header("Location: /");
 	}

 	public function switch_ru(){
 		$_SESSION["lang"] = "ru";
 		header("Location: /");
 	}

}
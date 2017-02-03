<?
class Valid
{
	static function checkAlias($alias){
		if(preg_match("/^[a-z0-9-]{1,255}$/i", $alias)){
			return true;	
		}else{
			return false;			
		}
	}
	
	static function checkEmail($email){
		if(preg_match("/[^\w\.@]/i",$email)){
			return false;
		}elseif(preg_match_all('/([a-z-0-9]+\.)*[a-z-0-9]+@[a-z0-9-]+(\.[a-z0-9-]+)*\.[a-z]{2,6}/',$email)){
			return true;
		}else{
			return false;
		}
	}

	static function checkPassword($password){
		if(preg_match('/[\s\)\(\+\-\$\.\\\%\^\?\|\[\]]/',$password)){
			return false;
		}elseif(preg_match('/[A-Z]+/',$password)&&preg_match('/[a-z]+/',$password)&&preg_match('/[0-9]+/',$password)&&preg_match('/^.{8,128}$/',$password)){
			return true;
		}else{		
			return false;
		}
	}

	static function checkPhone($phone){
		if(preg_match('/[^\d-]/',$phone)){
			return false;
		}elseif(preg_match('/^[\d\- ]{7,18}$/',$phone,$arr)){
			
			return true;
		}else{		
			return false;
		}
	}

	static function checkLogin($login){
		if(preg_match('/\w{2,32}/i',$login)){
			return true;
		}else{
			return false;	
		}
	}

	static function checkName($name){
		if(preg_match('/^[a-zA-Zа-яёА-ЯЁ\s\-]+$/u',$name,$arr)){
			return true;	
		}else{
			return false;			
		}
	}

	static function checkFeatName($name){
		if(preg_match('/[^0-9а-яёa-zA-Z ]/iu',$name,$arr)){
			return true;	
		}else{
			return false;			
		}
	}
	
	static function checkNumber($number){
		if(preg_match('/[0-9#№-]{1,100}/i',$number,$arr)){
			return true;	
		}else{
			return false;			
		}
	}


	

}


?>
<?
class Lib
{
	static function clearRequest($req){
		return trim(strip_tags(htmlspecialchars($req)));
	}

	static function resize($file_input, $file_output, $w_o, $h_o, $percent = false) {  
		list($w_i, $h_i, $type) = getimagesize($file_input);  
		if (!$w_i || !$h_i) {		
			return;
		}
		$types = array('','gif','jpeg','png','jpg');
		$ext = $types[$type];
		if ($ext) {
			$func = 'imagecreatefrom'.$ext;
			$img = $func($file_input);       
		} else {    	        
			return;
		}
		if ($percent) {
			$w_o *= $w_i / 100;
			$h_o *= $h_i / 100;
		}
		if (!$h_o) $h_o = $w_o/($w_i/$h_i);
		if (!$w_o) $w_o = $h_o/($h_i/$w_i);

		$img_o = imagecreatetruecolor($w_o, $h_o);
		if ($type == 3) { 
			imagesavealpha($img_o, true);
			$trans_colour = imagecolorallocatealpha($img_o, 0, 0, 0, 127);
			imagefill($img_o, 0, 0, $trans_colour);
		}

		imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
		if ($type == 2) {
			imagejpeg($img_o,$file_output,100);
			imagedestroy($img_o); 
		} else {
			$func = 'image'.$ext;
			return $func($img_o,$file_output);
			imagedestroy($img_o);
		}
	}

	static function crop($file_input, $file_output, $crop = 'square',$percent = false) {
		list($w_i, $h_i, $type) = getimagesize($file_input);
		if (!$w_i || !$h_i) {		
			return;
		}
		$types = array('','gif','jpeg','png');
		$ext = $types[$type];
		if ($ext) {
			$func = 'imagecreatefrom'.$ext;
			$img = $func($file_input);
		} else {    	
			return;
		}
		if ($crop == 'square') {
			$min = $w_i;
			if ($w_i > $h_i) $min = $h_i;
			$w_o = $h_o = $min;
		} else {
			list($x_o, $y_o, $w_o, $h_o) = $crop;
			if ($percent) {
				$w_o *= $w_i / 100;
				$h_o *= $h_i / 100;
				$x_o *= $w_i / 100;
				$y_o *= $h_i / 100;
			}
			if ($w_o < 0) $w_o += $w_i;
			$w_o -= $x_o;
			if ($h_o < 0) $h_o += $h_i;
			$h_o -= $y_o;
		}
		$img_o = imagecreatetruecolor($w_o, $h_o);
		imagecopy($img_o, $img, 0, 0, $x_o, $y_o, $w_o, $h_o);
		if ($type == 2) {
			return imagejpeg($img_o,$file_output,100);
		} else {
			$func = 'image'.$ext;
			return $func($img_o,$file_output);
		}
	}

	static function mysqli_fetch_all_my($rows, $id = null){
		$arr = [];
		while ($row = mysqli_fetch_assoc($rows)) {
			$index = $row['id']; //индекс товара в массиве 24 , 25 , 29  [ [24]=>[id=>24, name=>samsung], [25]=>]
			$arr[] = $row;
		}
		return $arr;
	}

	static function get_goods($rows){
		$arr = [];
		while ($row = mysqli_fetch_assoc($rows)) {
			$index = $row['id']; //индекс товара в массиве 24 , 25 , 29  [ [24]=>[id=>24, name=>samsung], [25]=>]
			$arr[$index] = $row;
		}
		return $arr;
	}

	static function translit($s){
		 $s = (string) $s; // преобразуем в строковое значение
		 $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
		 $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
		 $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
		 $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
		 $s = preg_replace("/[^0-9a-z- ]/i", "", $s); // очищаем строку от недопустимых символов
		 $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
		 return $s; // возвращаем результат
	}

	


	



	

}


?>
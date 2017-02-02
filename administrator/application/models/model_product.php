<?
class Model_Product extends Model
{
	protected $query;

	public function getColors(){
		$this->query= "SELECT *
		 			   FROM `colors` ";
		return $this->db->makeGoods($this->query,'id');
	}

	public function getFeatures(){
		$this->query= "SELECT *
					   FROM `features` ";
		return $this->db->makeGoods($this->query,'id');
	}

	public function getData(){
		$data = $this->db->makeGoods("SELECT *
									  FROM goods", "id");

		foreach ($data as $key => $good)
		{
			$id_good = $key; // айди товара
			//изображение товара
			$images = $this->db->getRow("SELECT `i_id`
				  						 FROM `goods_images`
				  						 WHERE g_id=$id_good;");
			$image_id = $images["i_id"];
			$row = $this->db->getRow("SELECT *
                        			  FROM `images`
                        			  WHERE id = $image_id;");
			$data[$id_good]['images'] = $row;
			//цвета товара
			$query = "SELECT `name`, `target` 
       				  FROM `colors` 
       				  INNER JOIN `goods_colors` 
       				  ON id = c_id
      				  WHERE g_id = '".$key."'";
			$this->color =  $this->db->makeQuery($query);
			$data[$id_good]['colors']=$this->color;
			//фичи товара
			$query = "SELECT `feature_name`, `feature_img` 
					  FROM `features` 
					  INNER JOIN `goods_features` 
					  ON id = f_id
					  WHERE g_id = '".$key."'";
			$this->features =  $this->db->makeQuery($query);
			$data[$id_good]['features']=$this->features;
		}

		return $data;
	}

	public function productAdd(){
		$remote_ip = $_SERVER['REMOTE_ADDR'];
		$remote_host = $_SERVER['REMOTE_HOST'];
		$time= date('c');
		/*public*/
		$public = Lib::clearRequest($_POST["public"]);
		/*Video-review*/
		$video = Lib::clearRequest($_POST["mediaLinkVideo"]);
		/*Demo-review*/
		$demo = Lib::clearRequest($_POST["mediaLinkDemo"]);
		/*alias*/
		$alias =  Lib::clearRequest($_POST["productAlias"]);		
		/*Stiker*/
		$stiker = Lib::clearRequest($_POST['stiker1']);
		switch ($stiker){
			case 's1':
				$stiker = false;		
				break;
			case 's2':
				$stiker = "Суперцена";		
				break;
			case 's3':
				$stiker = "Топ продаж";		
				break;
			case 's4':
				$stiker = "Акция";		
				break;		
		}
		/*Group*/
		$category = Lib::clearRequest($_POST['category']);
		switch ($category){
			case 'c1':
				$category = "phone";		
				break;
			case 'c2':
				$category = "smartphone";		
				break;
			case 'c3':
				$category = "headphones";		
				break;
			case 'c4':
				$category = "protection";		
				break;		
		}

		/*ProductName*/
		$productName = Lib::clearRequest($_POST['productName']);		
		if( iconv_strlen($productName) == 0 ){
		 	header("Location: /admin/product/add");
		 	die();
		}
		// $productName = $this->db->real_escape_string($productName);
		

		/*friendly URL*/
		if(!$alias){
			$alias = Lib::translit($productName);
		}
		if (Valid::checkAlias($alias) !=1){
			file_put_contents('logs/admin_log.txt', $time." Неверно указан ЧПУ "."(".$alias.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
			header("Location: /admin");	
		}
		$alias = "/" . $alias;
		// $alias = $this->db->real_escape_string($alias);

		/*Brand*/
		$brand = Lib::clearRequest($_POST['brand']);
		switch ($brand){
			case 'g1':	
			file_put_contents('logs/admin_log.txt', $time." Не выбран бренд товара при добавлении в базу "."(".$productName.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
				header("Location: /admin/product/add");
				die();		
				break;
			case 'g2':
				$brand = "apple";		
				break;
			case 'g3':
				$brand = "samsung";		
				break;
			case 'g4':
				$brand = "lenovo";		
				break;
			case 'g5':
				$brand = "htc";		
				break;
			case 'g6':
				$brand = "xiaomi";		
				break;
			case 'g7':
				$brand = "sony";		
				break;
			case 'g8':
				$brand = "asus";		
				break;
			case 'g9':
				$brand = "meizu";		
				break;
			case 'g10':
				$brand = "huawei";		
				break;
			case 'g11':
				$brand = "microsoft";		
				break;
			case 'g12':
				$brand = "motorolla";		
				break;
			case 'g13':
				$brand = "headphones";		
				break;
			case 'g14':
				$brand = "protection";		
				break;
		}

		/*InStock*/
		$endingGood = Lib::clearRequest($_POST['inStock']);
		if ($endingGood == "t22"){
			$endingGood = true;	
		}else{
			$endingGood = "false";
		}

		/*OLD PRICE*/
		$oldPrice = Lib::clearRequest($_POST['oldPrice']);
		if(iconv_strlen($oldPrice) == 0)
		 {
		 	$oldPrice="false";
		 }

		/*PRICE*/
		$Price = Lib::clearRequest($_POST['Price']);
		if(iconv_strlen($Price) == 0 && !ctype_digit($Price))
		 {
		 	header("Location: /admin/product/add");
		  die();
		 }

		/*Raiting*/
		$raiting = Lib::clearRequest($_POST['productRaiting']);
		switch($raiting) {
			case 't1':
				$raiting = 1;
				break;
			case 't2':
				$raiting = 2;		
				break;
			case 't3':
				$raiting = 3;
				break;
			case 't4':
				$raiting = 4;
				break;
			case 't5':
				$raiting = 5;
				break;
			case 't6':
				$raiting = 6;
				break;
			case 't7':
				$raiting = 7;
				break;
			case 't8':
				$raiting = 8;
				break;
			case 't9':
				$raiting = 9;
				break;
			case 't10':
				$raiting = 10;
				break;
			case 't11':
				$raiting = 11;
				break;
		}

		/*Reviews*/
		$reviews = 0;
		// $good["reviews"]=["#reviews",$reviews];

		/*DESCRIPTION*/
		$description = Lib::clearRequest($_POST['description']);

		/*Put in base*/

		$this->query = "INSERT INTO `goods`( `name`, `demo`, `video`, `price`, `old_price`, `description`, `public`, `sticker`, `in_stock`, `raiting`, `group_goods`, `brand`)
          				VALUES 	('".$productName."', '".$demo."', '".$video."', $Price, $oldPrice, '".$description."', '$public', '".$stiker."',$endingGood, $raiting,'".$category."','".$brand."')";
		 $this->db->makeQuery($this->query);		

		/*Узнаем последний добавленый айди*/
		 $id_good = $this->db->getLastid();

		 /*проверка уникальности алиаса*/
		 $this->query = "SELECT * 
		 				 FROM `routes` 
		 				 WHERE `alias` = '$alias'";
		 if ($this->db->makeQuery($this->query)) {
		 	$alias .= "_{$id_good}";
		 };

		 $this->query = "UPDATE `goods` 
		 				 SET `alias`= '$alias'
		 				 WHERE `id` = '$id_good'";
		 $this->db->makeQuery($this->query);

		 $real_route = '/product?id='.$id_good;

		 $this->query= "INSERT INTO `routes`(`good_id`, `real_url`, `alias`, `public`) 
		 				VALUES    			($id_good, '$real_route','$alias','$public')";
		 $this->db->makeQuery($this->query);


		/*Features*/
		$this->query = "SELECT `id`
		  				FROM `features`";
		$arrFeatures = $this->db->makeQuery($this->query);		
		foreach ($arrFeatures as $key=> $value) {
			if ($_POST[$value['id']] !== NULL) {
				$id_feature = $value['id'];
				$this->query =  "INSERT INTO `goods_features`
											 (`g_id`, `f_id`) 
								 VALUES ($id_good, $id_feature);";
				$this->db->makeQuery($this->query);
			}
		}

		/*Colors*/
		$this->query = "SELECT `id`
		  				FROM `colors`";
		$arrColors = $this->db->makeQuery($this->query);		
		foreach ($arrColors as $key=> $value) {
			if ($_POST[$value['id']] !== NULL) {
				$id_color = $value['id'];
				$this->query =  "INSERT INTO `goods_colors`
											 (`g_id`, `c_id`) 
								 VALUES ($id_good, $id_color);";
				$this->db->makeQuery($this->query);
			}
		}

		/*PRODUCT IMAGE*/
		$alt = Lib::clearRequest($_POST["imgAlt"]);
		$title = Lib::clearRequest($_POST["imgValue"]);
		/*MAIN IMAGE*/
		if((int)$_FILES['g_img_main']['error'] === 0){		
			$filetype=$_FILES['g_img_main']['type'];
			$fileform=explode(".",$_FILES['g_img_main']['name']);
			$fileform=$fileform[count($fileform)-1];
			if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
				{$img=md5(microtime().uniqid().rand(0,9999));
					move_uploaded_file($_FILES['g_img_main']["tmp_name"], "web/images/dynamic_img/".$img.".".$fileform);
			}
			$img_name = $img.".".$fileform;
			$img_name_medium = $img."_med".".".$fileform;
			$img_name_small = $img."_small".".".$fileform;
			Lib::resize("web/images/dynamic_img/".$img_name, "web/images/dynamic_img/".$img_name_medium, 173, 280);
			Lib::resize("web/images/dynamic_img/".$img_name, "web/images/dynamic_img/".$img_name_small, 0, 100);
			$size_img=getimagesize('web/images/dynamic_img/'.$img_name_small);
			if($size_img[0] > $size_img[1]){				 
				Lib::resize("web/images/dynamic_img/".$img_name_small,  "web/images/dynamic_img/".$img_name_small,  65,  0);
			}
		}
		if((int)$_FILES['g_img_1']['error'] === 0){		
			$filetype=$_FILES['g_img_1']['type'];
			$fileform=explode(".",$_FILES['g_img_1']['name']);
			$fileform=$fileform[count($fileform)-1];
			if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
				{$img1=md5(microtime().uniqid().rand(0,9999));
					move_uploaded_file($_FILES['g_img_1']["tmp_name"], "web/images/dynamic_img/".$img1.".".$fileform);
			}
			$img_name1 = $img1.".".$fileform;
			$img_name1_small = $img1."_small".".".$fileform;
			Lib::resize("web/images/dynamic_img/".$img_name1, "web/images/dynamic_img/".$img_name1_small, 0, 100);
			$size_img=getimagesize('web/images/dynamic_img/'.$img_name1_small);
			if($size_img[0] > $size_img[1]){				 
				Lib::resize("web/images/dynamic_img/".$img_name1_small,  "web/images/dynamic_img/".$img_name1_small,  75,  0);
			}
		}
		if((int)$_FILES['g_img_2']['error'] === 0){		
			$filetype=$_FILES['g_img_2']['type'];
			$fileform=explode(".",$_FILES['g_img_2']['name']);
			$fileform=$fileform[count($fileform)-1];
			if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
				{$img2=md5(microtime().uniqid().rand(0,9999));
					move_uploaded_file($_FILES['g_img_2']["tmp_name"], "web/images/dynamic_img/".$img2.".".$fileform);
			}
			$img_name2 = $img2.".".$fileform;	
			$img_name2_small = $img2."_small".".".$fileform;
			Lib::resize("web/images/dynamic_img/".$img_name2, "web/images/dynamic_img/".$img_name2_small, 0, 100);
			$size_img=getimagesize('web/images/dynamic_img/'.$img_name2_small);
			if($size_img[0] > $size_img[1]){				 
				Lib::resize("web/images/dynamic_img/".$img_name2_small,  "web/images/dynamic_img/".$img_name2_small,  75,  0);
			}
		}
		if((int)$_FILES['g_img_3']['error'] === 0){		
			$filetype=$_FILES['g_img_3']['type'];
			$fileform=explode(".",$_FILES['g_img_3']['name']);
			$fileform=$fileform[count($fileform)-1];
			if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
				{$img3=md5(microtime().uniqid().rand(0,9999));
					move_uploaded_file($_FILES['g_img_3']["tmp_name"], "web/images/dynamic_img/".$img3.".".$fileform);
			}
			$img_name3 = $img3.".".$fileform;
			$img_name3_small = $img3."_small".".".$fileform;
			Lib::resize("web/images/dynamic_img/".$img_name3, "web/images/dynamic_img/".$img_name3_small, 0, 100);
			$size_img=getimagesize('web/images/dynamic_img/'.$img_name3_small);
			if($size_img[0] > $size_img[1]){				 
				Lib::resize("web/images/dynamic_img/".$img_name3_small,  "web/images/dynamic_img/".$img_name3_small,  75,  0);
			}
		}
		if((int)$_FILES['g_img_4']['error'] === 0){		
			$filetype=$_FILES['g_img_4']['type'];
			$fileform=explode(".",$_FILES['g_img_4']['name']);
			$fileform=$fileform[count($fileform)-1];
			if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
				{$img4=md5(microtime().uniqid().rand(0,9999));
					move_uploaded_file($_FILES['g_img_4']["tmp_name"], "web/images/dynamic_img/".$img4.".".$fileform);
			}
			$img_name4 = $img4.".".$fileform;
			$img_name4_small = $img4."_small".".".$fileform;
			Lib::resize("web/images/dynamic_img/".$img_name4, "web/images/dynamic_img/".$img_name4_small, 0, 100);
			$size_img=getimagesize('web/images/dynamic_img/'.$img_name4_small);
			if($size_img[0] > $size_img[1]){				 
				Lib::resize("web/images/dynamic_img/".$img_name4_small,  "web/images/dynamic_img/".$img_name4_small,  75,  0);
			}
		}
		if((int)$_FILES['g_img_5']['error'] === 0){		
			$filetype=$_FILES['g_img_5']['type'];
			$fileform=explode(".",$_FILES['g_img_5']['name']);
			$fileform=$fileform[count($fileform)-1];
			if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
				{$img5=md5(microtime().uniqid().rand(0,9999));
					move_uploaded_file($_FILES['g_img_5']["tmp_name"], "web/images/dynamic_img/".$img5.".".$fileform);
			}
			$img_name5 = $img5.".".$fileform;
			$img_name5_small = $img5."_small".".".$fileform;
			Lib::resize("web/images/dynamic_img/".$img_name5, "web/images/dynamic_img/".$img_name5_small, 0, 100);
			$size_img=getimagesize('web/images/dynamic_img/'.$img_name5_small);
			if($size_img[0] > $size_img[1]){				 
				Lib::resize("web/images/dynamic_img/".$img_name5_small,  "web/images/dynamic_img/".$img_name5_small,  75,  0);
			}
		}

		$this->query = "INSERT INTO `images`(`main_img`, `main_img_medium`, `main_img_small`, `alt_img`, `title_img`, `img_1`, `img_1_small`, `img_2`, `img_2_small`, `img_3`, `img_3_small`, `img_4`, `img_4_small`, `img_5`, `img_5_small`) 
				  	    VALUES ('".$img_name."','".$img_name_medium."','".$img_name_small."','".$alt."','".$title."','".$img_name1."','".$img_name1_small."','".$img_name2."','".$img_name2_small."','".$img_name3."','".$img_name3_small."','".$img_name4."','".$img_name4_small."','".$img_name5."','".$img_name5_small."')";

		$this->db->makeQuery($this->query);
		/*id last added image*/
		$this->query = "SELECT LAST_INSERT_ID();";
		$idImageLast = $this->db->makeQuery($this->query);
		$i_id = $idImageLast[0]['LAST_INSERT_ID()'];

		$this->query = "INSERT INTO `goods_images`(`g_id`, `i_id`) 
				  	 	VALUES ('".$id_good."','".$i_id."')";
		$this->db->makeQuery($this->query);
		header("Location: /admin");
	}

	public function productEdit(){
		$time= date('c');
		$remote_ip = $_SERVER['REMOTE_ADDR'];
		$remote_host = $_SERVER['REMOTE_HOST'];
		$g_id = Lib::clearRequest($_POST['id_good']);
		$productName = Lib::clearRequest($_POST['productName']);
		$demo = Lib::clearRequest($_POST['mediaLinkDemo']);
		$video = Lib::clearRequest($_POST['mediaLinkVideo']);
		$Price = Lib::clearRequest($_POST['Price']);
		$oldPrice = Lib::clearRequest($_POST['oldPrice']);
		$description = Lib::clearRequest($_POST['description']);
		$stiker = Lib::clearRequest($_POST['stiker1']);
		$endingGood = Lib::clearRequest($_POST['inStock']);
		$raiting = Lib::clearRequest($_POST['productRaiting']);
		$category = Lib::clearRequest($_POST['category']);
		$brand = Lib::clearRequest($_POST['brand']);
		$alt = Lib::clearRequest($_POST["imgAlt"]);
		$title = Lib::clearRequest($_POST["imgValue"]);
		$old_img_m = Lib::clearRequest($_POST['old_img_m']);
		$old_img_m_medium = Lib::clearRequest($_POST['old_img_medium']);
		$old_img_m_small = Lib::clearRequest($_POST['old_img_small']);
		$old_img_1 = Lib::clearRequest($_POST['old_img_1']);
		$old_img_1_small = Lib::clearRequest($_POST['old_img_1_small']);
		$old_img_2 = Lib::clearRequest($_POST['old_img_2']);
		$old_img_2_small = Lib::clearRequest($_POST['old_img_2_small']);
		$old_img_3 = Lib::clearRequest($_POST['old_img_3']);
		$old_img_3_small = Lib::clearRequest($_POST['old_img_3_small']);
		$old_img_4 = Lib::clearRequest($_POST['old_img_4']);
		$old_img_4_small = Lib::clearRequest($_POST['old_img_4_small']);
		$old_img_5 = Lib::clearRequest($_POST['old_img_5']);
		$old_img_5_small = Lib::clearRequest($_POST['old_img_5_small']);
		/*alias*/
		$alias =  Lib::clearRequest($_POST["productAlias"]);
		$public = Lib::clearRequest($_POST["public"]);
		
		switch ($stiker){
			case 's1':
				$stiker = false;		
				break;
			case 's2':
				$stiker = "Суперцена";		
				break;
			case 's3':
				$stiker = "Топ продаж";		
				break;
			case 's4':
				$stiker = "Акция";		
				break;		
		}

		switch($raiting) {
			case 't1':
				$raiting = 1;
				break;
			case 't2':
				$raiting = 2;		
				break;
			case 't3':
				$raiting = 3;
				break;
			case 't4':
				$raiting = 4;
				break;
			case 't5':
				$raiting = 5;
				break;
			case 't6':
				$raiting = 6;
				break;
			case 't7':
				$raiting = 7;
				break;
			case 't8':
				$raiting = 8;
				break;
			case 't9':
				$raiting = 9;
				break;
			case 't10':
				$raiting = 10;
				break;
			case 't11':
				$raiting = 11;
				break;
		}

		switch ($brand){
			case 'g1':	
			file_put_contents('logs/admin_log.txt', $time." Не выбран бренд товара при добавлении в базу "."(".$productName.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
				header("Location: /admin/product/edit");
				die();		
			break;
			case 'g2':
				$brand = "apple";		
			break;
			case 'g3':
				$brand = "samsung";		
			break;
			case 'g4':
				$brand = "lenovo";		
			break;
			case 'g5':
				$brand = "htc";		
			break;
			case 'g6':
				$brand = "xiaomi";		
			break;
			case 'g7':
				$brand = "sony";		
			break;
			case 'g8':
				$brand = "asus";		
			break;
			case 'g9':
				$brand = "meizu";		
			break;
			case 'g10':
				$brand = "huawei";		
			break;
			case 'g11':
				$brand = "microsoft";		
			break;
			case 'g12':
				$brand = "motorolla";		
			break;
			case 'g13':
				$brand = "headphones";		
			break;
			case 'g14':
				$brand = "protection";		
			break;
		}

		switch ($category){
			case 'c1':
				$category = "phone";		
				break;
			case 'c2':
				$category = "smartphone";		
				break;
			case 'c3':
				$category = "headphones";		
				break;
			case 'c4':
				$category = "protection";		
				break;		
		}

		$endingGood = $_POST['inStock'];

		if ($endingGood == "t22"){
			$endingGood = true;	
		}else{
			$endingGood = "false";
		}
		
		/*friendly URL*/
		if(!$alias){
			 header("Location: /admin/product/edit");
             die();			
		}else{
			$alias = Lib::translit($alias);
            $alias = '/'.$alias;
		}
		
		 $this->query= "UPDATE `routes`
		 			    SET `alias`='".$alias."',`public`= $public 
		 			    WHERE `good_id`=$g_id;";
		 $this->db->makeQuery($this->query);

		$this->query="UPDATE `goods` 
					  SET `name`='".$productName."',`demo`='".$demo."',`video`='".$video."',`price`=$Price,`old_price`=$oldPrice,`description`='".$description."', `public`= $public, `sticker`='".$stiker."',`in_stock`='".$endingGood."',`raiting`=$raiting,`group_goods`='".$category."',`brand`='".$brand."', `alias` = '".$alias."'
					  WHERE id=".$g_id.";";
		$this->db->makeQuery($this->query);

		/* добавление главного изображения*/
		if((int)$_FILES['g_img_main']['error'] === 0){		
			$filetype=$_FILES['g_img_main']['type'];
			$fileform=explode(".",$_FILES['g_img_main']['name']);
			$fileform=$fileform[count($fileform)-1];
			if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
				{$img=md5(microtime().uniqid().rand(0,9999));
					move_uploaded_file($_FILES['g_img_main']["tmp_name"], "web/images/dynamic_img/".$img.".".$fileform);
			}
			if($old_img_m != ''){unlink("web/images/dynamic_img/$old_img_m");
								 unlink("web/images/dynamic_img/$old_img_m_medium");
								 unlink("web/images/dynamic_img/$old_img_m_small");};
			
			$img_name = $img.".".$fileform;
			$img_name_medium = $img."_med".".".$fileform;
			$img_name_small = $img."_small".".".$fileform;

			Lib::resize("web/images/dynamic_img/".$img_name, "web/images/dynamic_img/".$img_name_medium, 173, 280);
			Lib::resize("web/images/dynamic_img/".$img_name, "web/images/dynamic_img/".$img_name_small, 0, 100);

			$size_img=getimagesize("web/images/dynamic_img/".$img_name_small);
			if($size_img[0] > $size_img[1]){
				 
				Lib::resize("web/images/dynamic_img/".$img_name_small,  "web/images/dynamic_img/".$img_name_small,  65,  0);
			}

			$this->query = "SELECT `i_id`
				  	  		FROM `goods_images` 
				  	  		WHERE `g_id`=$g_id";
		    $query_id = $this->db->makeQuery($this->query);
		  	$i_id =$query_id[0]['i_id'];			

			$this->query ="UPDATE `images` 
				     	   SET `main_img`='".$img_name."', `main_img_medium`='".$img_name_medium."', `main_img_small`='".$img_name_small."', `alt_img`='".$alt."',`title_img`='".$title."'
				           WHERE `id`=".$i_id.";";
		 	$this->db->makeQuery($this->query);
			
		};
		/*additional images*/
		if((int)$_FILES['g_img_1']['error'] === 0){		
			$filetype=$_FILES['g_img_1']['type'];
			$fileform=explode(".",$_FILES['g_img_1']['name']);
			$fileform=$fileform[count($fileform)-1];
			if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png")){
				$img=md5(microtime().uniqid().rand(0,9999));
				move_uploaded_file($_FILES['g_img_1']["tmp_name"], "web/images/dynamic_img/".$img.".".$fileform);
			}
			if($old_img_1 != ''){
				unlink("web/images/dynamic_img/$old_img_1");
				unlink("web/images/dynamic_img/$old_img_1_small");
			};
			$img_name = $img.".".$fileform;
			$img_name_small = $img."_small".".".$fileform;

			Lib::resize("web/images/dynamic_img/".$img_name, "web/images/dynamic_img/".$img_name_small, 0, 100);
			$size_img=getimagesize("web/images/dynamic_img/".$img_name_small);
			if($size_img[0] > $size_img[1]){				 
				Lib::resize("web/images/dynamic_img/".$img_name_small,  "web/images/dynamic_img/".$img_name_small,  75,  0);
			}

			$this->query = "SELECT `i_id`
				  	  		FROM `goods_images` 
				  	  		WHERE `g_id`=$g_id";
			$query_id = $this->db->makeQuery($this->query);
			$i_id =$query_id[0]['i_id'];			
			
			$this->query ="UPDATE `images` 
				     	   SET `img_1`='".$img_name."', `img_1_small`='".$img_name_small."'
				           WHERE `id`=".$i_id.";";
			$this->db->makeQuery($this->query);
		};

		if((int)$_FILES['g_img_2']['error'] === 0){		
			$filetype=$_FILES['g_img_2']['type'];
			$fileform=explode(".",$_FILES['g_img_2']['name']);
			$fileform=$fileform[count($fileform)-1];
			if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png")){
				$img = md5(microtime().uniqid().rand(0,9999));
				move_uploaded_file($_FILES['g_img_2']["tmp_name"], "web/images/dynamic_img/".$img.".".$fileform);
			}
			if($old_img_2!=''){
				unlink("web/images/dynamic_img/$old_img_2");
				unlink("web/images/dynamic_img/$old_img_2_small");
			};
			$img_name = $img.".".$fileform;
			$img_name_small = $img."_small".".".$fileform;

			Lib::resize("web/images/dynamic_img/".$img_name, "web/images/dynamic_img/".$img_name_small, 0, 100);
			$size_img=getimagesize("web/images/dynamic_img/".$img_name_small);
			if($size_img[0] > $size_img[1]){				 
				Lib::resize("web/images/dynamic_img/".$img_name_small,  "web/images/dynamic_img/".$img_name_small,  75,  0);
			}

			$this->query = "SELECT `i_id`
				  	  		FROM `goods_images` 
				  	  		WHERE `g_id`=$g_id";
			$query_id = $this->db->makeQuery($this->query);
			$i_id =$query_id[0]['i_id'];
			
			$this->query ="UPDATE `images` 
				     	   SET `img_2`='".$img_name."', `img_2_small`='".$img_name_small."'
				     	   WHERE `id`=".$i_id.";";
			$this->db->makeQuery($this->query);
			
		};

		if((int)$_FILES['g_img_3']['error'] === 0){		
			$filetype=$_FILES['g_img_3']['type'];
			$fileform=explode(".",$_FILES['g_img_3']['name']);
			$fileform=$fileform[count($fileform)-1];
			if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png")){
				$img = md5(microtime().uniqid().rand(0,9999));
				move_uploaded_file($_FILES['g_img_3']["tmp_name"], "web/images/dynamic_img/".$img.".".$fileform);
			}
			if($old_img_3!=''){
				unlink("web/images/dynamic_img/$old_img_3");
				unlink("web/images/dynamic_img/$old_img_3_small");
			};
			$img_name = $img.".".$fileform;
			$img_name_small = $img."_small".".".$fileform;

			Lib::resize("web/images/dynamic_img/".$img_name, "web/images/dynamic_img/".$img_name_small, 0, 100);
			$size_img=getimagesize("web/images/dynamic_img/".$img_name_small);
			if($size_img[0] > $size_img[1]){				 
				Lib::resize("web/images/dynamic_img/".$img_name_small,  "web/images/dynamic_img/".$img_name_small,  75,  0);
			}

			$this->query = "SELECT `i_id`
				  	  		FROM `goods_images` 
				  	  		WHERE `g_id`=$g_id";
			$query_id = $this->db->makeQuery($this->query);
			$i_id =$query_id[0]['i_id'];
			
			$this->query ="UPDATE `images` 
				     	   SET `img_3`='".$img_name."', `img_3_small`='".$img_name_small."'
				     WHERE `id`=".$i_id.";";
			$this->db->makeQuery($this->query);
		};

		if((int)$_FILES['g_img_4']['error'] === 0){		
			$filetype=$_FILES['g_img_4']['type'];
			$fileform=explode(".",$_FILES['g_img_4']['name']);
			$fileform=$fileform[count($fileform)-1];
			if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png")){
				$img = md5(microtime().uniqid().rand(0,9999));
				move_uploaded_file($_FILES['g_img_4']["tmp_name"], "web/images/dynamic_img/".$img.".".$fileform);
			}
			if($old_img_4!=''){
				unlink("web/images/dynamic_img/$old_img_4");
				unlink("web/images/dynamic_img/$old_img_4_small");
			};
			$img_name = $img.".".$fileform;
			$img_name_small = $img."_small".".".$fileform;

			Lib::resize("web/images/dynamic_img/".$img_name, "web/images/dynamic_img/".$img_name_small, 0, 100);
			$size_img=getimagesize("web/images/dynamic_img/".$img_name_small);
			if($size_img[0] > $size_img[1]){				 
				Lib::resize("web/images/dynamic_img/".$img_name_small,  "web/images/dynamic_img/".$img_name_small,  75,  0);
			}

			$this->query = "SELECT `i_id`
				  	  		FROM `goods_images` 
				  	  		WHERE `g_id`=$g_id";
			$query_id = $this->db->makeQuery($this->query);
			$i_id =$query_id[0]['i_id'];
			
			$this->query ="UPDATE `images` 
				     	   SET `img_4`='".$img_name."', `img_4_small`='".$img_name_small."'
				     	   WHERE `id`=".$i_id.";";
			$this->db->makeQuery($this->query);
			
		};

		if((int)$_FILES['g_img_5']['error'] === 0){		
			$filetype=$_FILES['g_img_5']['type'];
			$fileform=explode(".",$_FILES['g_img_5']['name']);
			$fileform=$fileform[count($fileform)-1];
			if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png")){
				$img = md5(microtime().uniqid().rand(0,9999));
				move_uploaded_file($_FILES['g_img_5']["tmp_name"], "web/images/dynamic_img/".$img.".".$fileform);
			}
			if($old_img_5!=''){
				unlink("web/images/dynamic_img/$old_img_5");
				unlink("web/images/dynamic_img/$old_img_5_small");
			};
			$img_name = $img.".".$fileform;
			$img_name_small = $img5."_small".".".$fileform;

			Lib::resize("web/images/dynamic_img/".$img_name, "web/images/dynamic_img/".$img_name_small, 0, 100);
			$size_img=getimagesize("web/images/dynamic_img/".$img_name_small);
			if($size_img[0] > $size_img[1]){				 
				Lib::resize("web/images/dynamic_img/".$img_name_small,  "web/images/dynamic_img/".$img_name_small,  75,  0);
			}

			$this->query = "SELECT `i_id`
				  	  		FROM `goods_images` 
				  	  		WHERE `g_id`=$g_id";
			$query_id = $this->db->makeQuery($this->query);
			$i_id =$query_id[0]['i_id'];

			$this->query ="UPDATE `images` 
				     	   SET `img_5`='".$img_name."', `img_5_small`='".$img_name_small."'
				     	   WHERE `id`=".$i_id.";";
			$this->db->makeQuery($this->query);
		};

		/*Colors*/
		$this->query = "DELETE FROM `goods_colors` WHERE g_id=$g_id;";
		$this->db->makeQuery($this->query);
		
		$this->query = "SELECT `id`
		  				FROM `colors`";
		$arrColors = $this->db->makeQuery($this->query);		
		foreach ($arrColors as $key=> $value) {
			if ($_POST[$value['id']] !== NULL) {
				$id_color = $value['id'];
				$this->query =  "INSERT INTO `goods_colors`
											 (`g_id`, `c_id`) 
								 VALUES ($g_id, $id_color);";
				$this->db->makeQuery($this->query);
			}
		}

		/*Features*/
		$this->query = "DELETE FROM `goods_features` WHERE g_id=$g_id;";
		$this->db->makeQuery($this->query);

		$this->query = "SELECT `id`
		  				FROM `features`";
		$arrFeatures = $this->db->makeQuery($this->query);		
		foreach ($arrFeatures as $key=> $value) {
			if ($_POST[$value['id']] !== NULL) {
				$id_feature = $value['id'];
				$this->query =  "INSERT INTO `goods_features`
											 (`g_id`, `f_id`) 
								 VALUES ($g_id, $id_feature);";
				$this->db->makeQuery($this->query);
			}
		}
	}

	public function productDelete(){
		$good_id = $_POST["id_deleted_good"];

		$this->query = "DELETE FROM `goods`
						WHERE id=$good_id ;";
		$this->db->makeQuery($this->query);

		$this->query = "DELETE FROM `goods_features`
						WHERE g_id=$good_id ;";
		$this->db->makeQuery($this->query);

		$this->query = "DELETE FROM `goods_colors`
						WHERE g_id=$good_id ;";
		$this->db->makeQuery($this->query);

		$this->query = "SELECT `i_id`
					  	FROM `goods_images`
					  	WHERE g_id=".$good_id.";";
		$query_id = $this->db->makeQuery($this->query);
		$image_id = $query_id[0]['i_id'];

		$this->query = "SELECT *
					    FROM `images`
					    WHERE id=$image_id ;";
		$arr_img = $this->db->makeQuery($this->query);		

		$m_img = $arr_img[0]['main_img'];
		$m_img_medium = $arr_img[0]['main_img_medium'];
		$m_img_small = $arr_img[0]['main_img_small'];
		$img_1 = $arr_img[0]['img_1'];
		$img_1_small = $arr_img[0]['img_1_small'];
		$img_2 = $arr_img[0]['img_2'];
		$img_2_small = $arr_img[0]['img_2_small'];
		$img_3 = $arr_img[0]['img_3'];
		$img_3_small = $arr_img[0]['img_3_small'];
		$img_4 = $arr_img[0]['img_4'];
		$img_4_small = $arr_img[0]['img_4_small'];
		$img_5 = $arr_img[0]['img_5'];
		$img_5_small = $arr_img[0]['img_5_small'];

			unlink("web/images/dynamic_img/$m_img");
			unlink("web/images/dynamic_img/$m_img_medium");
			unlink("web/images/dynamic_img/$m_img_small");
		if($img_1 != ''){
			unlink("web/images/dynamic_img/$img_1");
			unlink("web/images/dynamic_img/$img_1_small");
		}
		if($img_2 != ''){
			unlink("web/images/dynamic_img/$img_2");
			unlink("web/images/dynamic_img/$img_2_small");
		}
		if($img_3 != ''){
			unlink("web/images/dynamic_img/$img_3");
			unlink("web/images/dynamic_img/$img_3_small");
		}
		if($img_4 != ''){
			unlink("web/images/dynamic_img/$img_4");
			unlink("web/images/dynamic_img/$img_4_small");
		}
		if($img_5 != ''){
			unlink("web/images/dynamic_img/$img_5");
			unlink("web/images/dynamic_img/$img_5_small");
		}

		$this->query="DELETE FROM `images`
					  WHERE id=$image_id;";
		$this->db->makeQuery($this->query);	

		$this->query="DELETE FROM `goods_images`
					  WHERE g_id=$good_id ;";
		$this->db->makeQuery($this->query);

		$this->query="DELETE FROM `routes`
					  WHERE good_id=$good_id ;";
		$this->db->makeQuery($this->query);
	}

}
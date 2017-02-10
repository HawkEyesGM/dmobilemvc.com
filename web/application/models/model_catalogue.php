<?
class Model_Catalogue extends Model
{
	public $data;
	public $color;
	public $features;

	public function get_data($id = false){		

		$id = $_GET['sort_id'];

		if($id){
			if($id == "cheap"){				
				$query = "SELECT *
				  		  FROM goods
				  		  WHERE public = 1
				  		  ORDER BY `price` ASC";
				$data = $this->db->makeGoods($query, "id");	

				foreach ($data as $key => $good){
					$id_good = $key;				
					$images = $this->db->getRow("SELECT `i_id`
												 FROM `goods_images`
												 WHERE g_id = $id_good;");
					$image_id = $images["i_id"];
					$row = $this->db->getRow("SELECT *
											  FROM `images`
											  WHERE id = $image_id;");
					$data[$id_good]['images'] = $row;					
					$query = "SELECT `name`, `target` 
							  FROM `colors` 
							  INNER JOIN `goods_colors` 
							  ON id = c_id
							  WHERE g_id = '".$key."'";
					$this->color =  $this->db->makeQuery($query);
					$data[$id_good]['colors']=$this->color;					
					$query = "SELECT `feature_name`, `feature_img` 
							  FROM `features` 
							  INNER JOIN `goods_features` 
							  ON id = f_id
							  WHERE g_id = '".$key."'";
					$this->features =  $this->db->makeQuery($query);
					$data[$id_good]['features']=$this->features;
				}
			}

			if($id == "expensive"){				
				$query = "SELECT *
				  		  FROM goods
				  		  WHERE public = 1
				  		  ORDER BY `price` DESC";
				$data = $this->db->makeGoods($query, "id");	

				foreach ($data as $key => $good){
					$id_good = $key; // айди товара
					//изображение товара
					$images = $this->db->getRow("SELECT `i_id`
												 FROM `goods_images`
												 WHERE g_id = $id_good;");
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
			}




				foreach ($data as $item) {
					printf("<li><div class='good col-sm-12' >");

					if ($item["video"]){
						printf("
								 <div class='video'><a href=%s'><center><img src='web/images/static_img/video.jpg' title='Видеообзор' alt='Видеообзор' 	width='25px' /><br>video</center></a></div>
							", $item["video"] );                            
					}else{
						printf("
								 <div class='video'></div>
							" ); 
					}

					if ($item["demo"]){
						printf("
								 <div class='demo'><a href=%s'><center><img src='web/images/static_img/demo.jpg' title='Демонстрация' alt='Демонстрация' 	width='25px' /><br>demo</center></a></div>
							", $item["demo"] );                            
					}else{
						printf("
								 <div class='demo'></div>
							" ); 
					}


					 switch ($item["sticker"]){
                            case false;
                            $class = "";
                            break;
                            case "Суперцена";
                            $class = "superPrice";
                            break;
                            case "Топ продаж";
                            $class = "topSales";
                            break;
                            case "Акция";
                            $class = "stock";
                            break;
                        }

                       printf(" <div class='%s'>%s</div>", $class, $item["sticker"] );




                        printf("<div class='colorsGood'>");
                        foreach($item['colors'] as $k=>$v){
                        		printf("<a href='%s'><img src='web/images/static_img/%s''  class='colorChoise'/></a><br>", $item["alias"], $v["target"]   );                                
                        };
                        printf("</div>");

                     
                           
                        

					
					printf("				

						<div class='imgGood'>
							<a href='%s'> <center><img src='web/images/dynamic_img/%s' width=%S 
								alt='%s' title='%s' ></center> </a>
						</div>						
						",$item["alias"], $item['images']["main_img_medium"], '100%', $item['images']["alt_img"],  $item['images']["title_img"]);

						   if ($item["in_stock"]){
                        	printf("
                        		<div class='endingGood'><center>Заканчивается</center></div>
                        		");                            
                        	} else{
                        		printf("
                        		<div class='endingGood'></div>
                        		");	
                        	} 

                        	if ($item["old_price"]){
                        	printf("
                        		<div class='oldPrice'>
							<del><span>%s<small>грн</small></span></del>								
						</div>
                        		", $item["old_price"]);                            
                        	} else{
                        		printf("
                        		<div class='oldPrice'></div>
                        		");	
                        	}                     





						printf("
					
						

												

						


						<div class='PriceContainer'>
							<div class='price'>%s<small> грн</small></div>
							<div class='raiting'>
								<i class='sprite sprite-%s' ></i>
							</div>
						</div>

						<div class='nameGood'>                        
							<a href='%s'>Мобильный телефон %s</a>
						</div><br>

						<div class='idGood'>
							<a href='/basket/add?id=%s'><img src='web/images/static_img/buy_button.png' width='130px' ></a>
						</div>
				

					</div>
						", $item["price"], $item["raiting"], $item["alias"], $item["name"], $item["id"] );


						printf("<div class='features'> <span>");
						foreach($item['features'] as $k=>$v){
							printf("<img src='web/images/static_img/%s''  class='colorChoise' width=100%%  title='%s' />", $v["feature_img"] , $v["feature_name"]   );                                
						};
						printf(" </span></div>");

						printf("<div class='description'>
							%s
						</div>", $item["description"] );






					printf("</li>");


				}

				exit();  		  
			
		}else{
		


	
		$query = "SELECT *
				  FROM goods
				  WHERE public = 1";
		

		
			// if($id == "cheap"){
			// 	$query = "SELECT *
			// 	  		  FROM goods
			// 	  		  ORDER BY `price` ASC";
				  		  
		
				  		  
			// }
			// if($id == "expensive"){
			// 	$query = "SELECT *
			// 	  		  FROM goods
			// 	  		  ORDER BY `price` DESC";

			// }
		

	    $data = $this->db->makeGoods($query, "id");





		foreach ($data as $key => $good)
		{
			$id_good = $key; // айди товара
			//изображение товара
			$images = $this->db->getRow("SELECT `i_id`
				  						 FROM `goods_images`
				  						 WHERE g_id = $id_good;");
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
	}




}
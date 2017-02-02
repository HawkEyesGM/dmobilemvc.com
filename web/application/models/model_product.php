<?
class Model_Product extends Model
{
	public $data;
	public $color;
	public $features;
	public $product_id;


	public function get_data($id)
	{
		$product_id=$id;

		$data = $this->db->makeGoods("SELECT *
									  FROM goods
									  WHERE public = 1 AND id = $product_id", "id");	
		/* если не существующий товар или public=0*/
		if(!$data){
			Route::ErrorPage404();
		};

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
		$data=$data[$product_id];


		return $data;
	}



}
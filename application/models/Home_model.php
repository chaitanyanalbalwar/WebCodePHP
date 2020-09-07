<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
	public function fetch_restaurants()
	{
		$this->db->select('*');
		$this->db->from('restaurant');
		// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
		$this->db->where('restaurant_status!=','On-Boarding');
		return $this->db->get()->result();
	}

	public function fetch_restaurant_idwise($restaurant_id)
	{
		$this->db->select('*');
		$this->db->from('restaurant');
		$this->db->where('restaurant_status!=','On-Boarding');
		$this->db->where('restaurant_id',$restaurant_id);
		return $this->db->get()->row();
	}
	
	public function fetch_category_timing($category_id)
	{
		$this->db->select('*');
		$this->db->from('category_timing');
		$this->db->where('category_id',$category_id);
		return $this->db->get()->result();
	}
	
	public function fetch_resto_dicsounts($restaurant_id)
	{
		$this->db->select('*');
		$this->db->from('discount');
				$this->db->where('discount_status','1');

		$this->db->where('restaurant_id',$restaurant_id);
		return $this->db->get()->result();
	}
	
	public function fetch_discount_row($restaurant_id,$coupon)
	{
		$this->db->select('*');
		$this->db->from('discount');
		$this->db->where('discount_status','1');
		$this->db->where('discount_coupon',$coupon);
		$this->db->where('restaurant_id',$restaurant_id);
		return $this->db->get()->row();
	}

    public function fetch_search_result($pincode,$query)
	{
		$this->db->select('*');
		$this->db->from('restaurant');
		// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
		$this->db->where('restaurant_status','Active');
				$this->db->where('restaurant_on_off','1');

		$this->db->like('restaurant_name',$query);
		return $this->db->get()->result();
	}
	
	public function fetch_search_result_from_menu($query)
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->join('restaurant', 'restaurant.restaurant_id = menu.restaurant_id');
		$this->db->where('restaurant.restaurant_status','Active');
						$this->db->where('restaurant.restaurant_on_off','1');

		$this->db->like('menu.menu_name',$query);
		return $this->db->get()->result();
	}
	
    public function fetch_cgst($restaurant_id)
	{
		$this->db->select('*');
		$this->db->from('restaurant');
		// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
		$this->db->where('restaurant_id',$restaurant_id);
		return $this->db->get()->row()->cgst;
	}
	
	public function get_restaurant_id($id)
	{
		$this->db->select('*');
		$this->db->from('session_cart');
		// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
		$this->db->where('id',$id);
		return $this->db->get()->row()->restaurant_id;
	}
	
    public function fetch_sgst($restaurant_id)
	{
		$this->db->select('*');
		$this->db->from('restaurant');
		// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
		$this->db->where('restaurant_id',$restaurant_id);
		return $this->db->get()->row()->sgst;
	}
	public function fetch_menu_name($menu_id)
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('menu_id',$menu_id);
		return $this->db->get()->row()->menu_name;
	}

    
    public function fetch_address_data($user_id,$table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('user_id',$user_id);
		return $this->db->get()->result();
	}

    public function fetch_primary_address($user_id,$table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('user_id',$user_id);
		$this->db->where('primary_address','1');
		return $this->db->get()->row();
	}


	public function fetch_menu_price($menu_id)
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('menu_id',$menu_id);
		return $this->db->get()->row()->menu_price;
	}
	
	public function fetch_variation_from_session_cart($id)
	{
		$this->db->select('*');
		$this->db->from('session_cart');
		$this->db->where('id',$id);
		return $this->db->get()->row()->variation;
	}
	
	public function fetch_variation_id($variation)
	{
		$this->db->select('*');
		$this->db->from('variation');
		$this->db->where('name',$variation);
		return $this->db->get()->row()->variation_id;
	}
	
	
	public function fetch_variation_menu_price($variation_id,$menu_id)
	{
		$this->db->select('*');
		$this->db->from('menu_variation');
		$this->db->where('variation_id',$variation_id)->where('menu_variation_menu_id',$menu_id);
		return $this->db->get()->row()->rate;
	}


	public function fetch_menu_categorywise($category_id,$restaurant_id,$veg)
	{
		if($category_id!=0)
		{
		    if($veg=='Vegetarian')
		    {
		        
			$this->db->select('*');
			$this->db->from('menu');
			// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
			$this->db->where('menu_categoryid',$category_id)->where('restaurant_id',$restaurant_id)->where('menu_foodtype',$veg);
			return $this->db->get()->result();
		    }
		    else
		    {
		
			$this->db->select('*');
			$this->db->from('menu');
			// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
			$this->db->where('menu_categoryid',$category_id)->where('restaurant_id',$restaurant_id);
			return $this->db->get()->result();
		    }
		}
		else
		{
		    if($veg=='Vegetarian')
		    {
		        $this->db->select('*');
			$this->db->from('menu');
			// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
			$this->db->where('restaurant_id',$restaurant_id)->where('menu_foodtype',$veg);
			return $this->db->get()->result();
		    }
		    else
		    {
			$this->db->select('*');
			$this->db->from('menu');
			// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
			$this->db->where('restaurant_id',$restaurant_id);
			return $this->db->get()->result();
            }
		}
	}
	
	public function fetch_menu_veg_only($category_id,$restaurant_id,$veg)
	{
		if($category_id!=0)
		{
		
			$this->db->select('*');
			$this->db->from('menu');
			// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
			$this->db->where('menu_categoryid',$category_id)->where('restaurant_id',$restaurant_id)->where('menu_foodtype',$veg);
			return $this->db->get()->result();
		}
		else
		{
			$this->db->select('*');
			$this->db->from('menu');
			// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
			$this->db->where('restaurant_id',$restaurant_id)->where('menu_foodtype',$veg);
			return $this->db->get()->result();
			
		}
	}


    public function fetch_menu_searchwise($category_id,$restaurant_id,$query,$veg)
	{
		if($category_id!=0)
		{
		    if($veg=='Vegetarian')
		    {
		        
			$this->db->select('*');
			$this->db->from('menu');
			// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
			$this->db->where('menu_categoryid',$category_id)->where('restaurant_id',$restaurant_id)->where('menu_foodtype',$veg);
			$this->db->like('menu_name',$query);
			return $this->db->get()->result();
		    }
		    else
		    {
		
			$this->db->select('*');
			$this->db->from('menu');
			// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
			$this->db->where('menu_categoryid',$category_id)->where('restaurant_id',$restaurant_id);
			$this->db->like('menu_name',$query);
			return $this->db->get()->result();
		    }
			
		}
		else
		{
		    if($veg=='Vegetarian')
		    {
		        $this->db->select('*');
			$this->db->from('menu');
			// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
			$this->db->where('restaurant_id',$restaurant_id)->where('menu_foodtype',$veg);
			$this->db->like('menu_name',$query);
			return $this->db->get()->result();
		    }
		    else
		    {
			$this->db->select('*');
			$this->db->from('menu');
			// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
			$this->db->where('restaurant_id',$restaurant_id);
			$this->db->like('menu_name',$query);
			return $this->db->get()->result();
		    }
			
		}
	}


    public function fetch_resto_searchwise($query)
	{
		
			$this->db->select('*');
			$this->db->from('restaurant');
					$this->db->where('restaurant_status','Active');
			$this->db->like('restaurant_name',$query);
			return $this->db->get()->result();
			
		}
	


	public function fetch_categories()
	{
		$this->db->select('*');
		$this->db->from('category');
                $this->db->where('category_on_off','1');


		return $this->db->get()->result();
	}
	
	public function fetch_categories_resto_wise($restaurant_id)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('restaurant_id',$restaurant_id);
		                $this->db->where('category_on_off','1');

		return $this->db->get()->result();
	}

	public function fetch_session_cart_data()
	{
		$this->db->select('*');
		$this->db->from('session_cart');
		$this->db->where('session_id',session_id());
		return $this->db->get()->result();
	}
	
	public function fetch_session_cart_data1()
	{
		$this->db->select('*');
		$this->db->from('session_cart');
		$this->db->join('menu', 'session_cart.menu_id = menu.menu_id');
		$this->db->where('session_cart.session_id',session_id());
		return $this->db->get()->result();
	}
	
	public function fetch_session_cart_resto_id()
	{
		$this->db->select('*');
		$this->db->from('session_cart');
		$this->db->where('session_id',session_id());
		return $this->db->get()->row()->restaurant_id;
	}
	
		public function fetch_resto_address($resto_id)
	{
		$this->db->select('*');
		$this->db->from('restaurant');
		$this->db->where('restaurant_id',$resto_id);
		return $this->db->get()->row()->restaurant_address;
	}

	
	public function check_item_exist($resto_id,$menu_id)
	{
		$this->db->select('*');
		$this->db->from('session_cart');
		$this->db->where('session_id',session_id())->where('restaurant_id',$resto_id)->where('menu_id',$menu_id);
		$query=$this->db->get();
		if($query->num_rows() > 0)
		{
		    return 1;
		}
		else
		{
		    return 0;
		}
	}
	
	public function fetch_variation_name($variation_id)
	{
	    $this->db->select('*');
		$this->db->from('variation');
		$this->db->where('variation_id',$variation_id);
		$variation=$this->db->get()->row()->name;
		return $variation;
	}
	
	public function check_item_exist_with_variation($resto_id,$menu_id,$variation_id)
	{
	    $this->db->select('*');
		$this->db->from('variation');
		$this->db->where('variation_id',$variation_id);
		$variation=$this->db->get()->row()->name;

	    
		$this->db->select('*');
		$this->db->from('session_cart');
		$this->db->where('session_id',session_id())->where('restaurant_id',$resto_id)->where('menu_id',$menu_id)->where('variation',$variation);
		$query=$this->db->get();
		if($query->num_rows() > 0)
		{
		    return 1;
		}
		else
		{
		    return 0;
		}
	}
	
	
	public function check_resto_exist()
	{
		$this->db->select('*');
		$this->db->from('session_cart');
		$this->db->where('session_id',session_id());
		$query=$this->db->get()->row()->restaurant_id;
		
		    return $query;
		
	}
	
	public function update_session_cart($resto_id,$menu_id)
	{
		$this->db->select('*');
		$this->db->from('session_cart');
		$this->db->where('session_id',session_id())->where('restaurant_id',$resto_id)->where('menu_id',$menu_id);
		$query=$this->db->get()->row();
		
		$qty=$query->qty + 1;
		
		$price= $this->home_model->fetch_menu_price($menu_id) * $qty;
		
		$data=array(
		    'qty'=>$qty,
		    'menu_price'=>$price ,

		    );
		
		$this->db->where('id', $query->id);
		$data = $this->db->update('session_cart', $data);

		
		
	}

	public function fetch_restaurants_categorywise($id)
	{
		if($id!='')
		{
			$this->db->select('*');
			$this->db->from('category');
			$this->db->join('menu', 'category.id = menu.menu_categoryid');
			$this->db->join('restaurant', 'restaurant.restaurant_id = menu.restaurant_id');
					$this->db->where('restaurant.restaurant_status','Active');

			$this->db->where('category.id',$id);
			return $this->db->get()->result();
		}
		else
		{
// 			$this->db->select('*');
// 			$this->db->from('category');
// 			$this->db->join('menu', 'category.id = menu.menu_categoryid','left');
// 			$this->db->join('restaurant', 'restaurant.restaurant_id = menu.restaurant_id','');
// 			// $this->db->where('category.id',$id);
// 			return $this->db->get()->result();

            $this->db->select('*');
			$this->db->from('restaurant');
// 			$this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id','left');
// 			$this->db->join('category', 'category.id = menu.menu_categoryid');

					$this->db->where('restaurant.restaurant_status','Active');


			// $this->db->where('category.id',$id);
			return $this->db->get()->result();
			
			
		}
	}

	public function insert_data($data,$table)
	{
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();
   		return  $insert_id;
 

	}

	public function delete_data($id,$table)
	{
		$this->db->delete($table, array('id' => $id)); 

	}

	public function login($mobileno,$password,$table)
	{
		$condition = array('mobileno' => $mobileno, 'password' => $password);

		// $condition='mobileno='.$mobileno.'AND password='.$password;
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($condition);
		$query=$this->db->get();
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function fetch_user_data($mobileno,$password,$table)
	{
		$condition = array('mobileno' => $mobileno, 'password' => $password);

		// $condition='mobileno='.$mobileno.'AND password='.$password;
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($condition);
		$query=$this->db->get()->row();
		return $query;
	}

	public function fetch_profile_data($user_id,$table)
	{
		$condition = array('user_id' => $user_id);

		// $condition='mobileno='.$mobileno.'AND password='.$password;
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($condition);
		$query=$this->db->get()->row();
		return $query;
	}

    public function fetch_address($id,$table)
	{
		$condition = array('id' => $id);

		// $condition='mobileno='.$mobileno.'AND password='.$password;
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($condition);
		$query=$this->db->get()->row();
		return $query;
	}

	public function update_data($data,$user_id,$table)
	{
		$this->db->where('user_id', $user_id);
		$data = $this->db->update($table, $data);

	}

	public function fetch_orders_data($user_id,$table)
	{
		$condition = array('user_id' => $user_id);

		// $condition='mobileno='.$mobileno.'AND password='.$password;
		$this->db->select('*');
		$this->db->from('orders');
// 		$this->db->join('order_menus', 'orders.order_id = order_menus.order_id');
		$this->db->where($condition);
		$this->db->order_by('order_id','desc');
		$query=$this->db->get();
		return $query;
	}
	
	public function fetch_current_orders_data($user_id,$table)
	{
		$condition = array('user_id' => $user_id);

		// $condition='mobileno='.$mobileno.'AND password='.$password;
		$this->db->select('*');
		$this->db->from('orders');
// 		$this->db->join('order_menus', 'orders.order_id = order_menus.order_id');
		$this->db->where($condition);
		$this->db->order_by('order_id','desc');
		$this->db->limit(1);
		$query=$this->db->get();
		return $query;
	}

	public function update_data1($data,$id,$table)
	{
		$this->db->where('id', $id);
		$data = $this->db->update($table, $data);

	}
	
	public function cancel_order($data,$id,$table)
	{
		$this->db->where('order_id', $id);
		$data = $this->db->update($table, $data);

	}
	
	public function fetch_user_data_nowise($mobileno)
	{
		$condition = array('mobileno' => $mobileno);

		// $condition='mobileno='.$mobileno.'AND password='.$password;
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$query=$this->db->get()->row();
		return $query;
	}
    
    public function fetch_order($order_id)
	{
		$condition = array('order_id' => $order_id);

		// $condition='mobileno='.$mobileno.'AND password='.$password;
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->where($condition);
		$query=$this->db->get()->row();
		return $query;
	}	
	
	public function fetch_variation($menu_id)
	{
		$condition = array('menu_variation_menu_id' => $menu_id);

		// $condition='mobileno='.$mobileno.'AND password='.$password;
		$this->db->select('*');
		$this->db->from('menu_variation mv');
		$this->db->join('variation v', 'v.variation_id = mv.variation_id');
		$this->db->where($condition);
		$query=$this->db->get()->result();
		return $query;
	}
	
	    public function check_pincode()
	{
		$this->db->select('*');
		$this->db->from('restaurant');
		// $this->db->join('menu', 'restaurant.restaurant_id = menu.restaurant_id');
		$query= $this->db->get()->result();
		$arr=array();
		foreach($query as $val)
		{
		    $pincode=$val->pincode;
		    array_push($arr,$pincode);
		}
		return $arr;
		
		
	}


	    public function fetch_timing($restaurant_id)
	{
		$this->db->select('*');
		$this->db->from('timing');
				$this->db->where('restaurant_id', $restaurant_id);

		$query= $this->db->get()->result();
		foreach($query as $val)
		{
		    $time.=$val->timing_from." - ".$val->timing_to." & ";
		}
		return $time;
		
		
	}


}
?>
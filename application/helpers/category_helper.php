<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('category'))
{
function category($restaurant_id)
{
 $ci =& get_instance();
 $ci->load->database();
$condition = array('restaurant_id' => $restaurant_id);

		$ci->db->select('category_name');
		$ci->db->from('category');
		$ci->db->where($condition);
		$query=$ci->db->get();
		$arr=array();
		foreach($query->result() as $val)
		{
		    array_push($arr,$val->category_name);
		}

        return $arr;
}
}
?>
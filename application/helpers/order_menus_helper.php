<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('order_menus'))
{
function order_menus($order_id)
{
 $ci =& get_instance();
 $ci->load->database();
$condition = array('om.order_id' => $order_id);

		$ci->db->select('*');
		$ci->db->from('order_menus om');
		$ci->db->join('restaurant re','re.restaurant_id=om.restaurant_id');
		$ci->db->where($condition);
		$query=$ci->db->get();
		return $query->result();

}
}
?>
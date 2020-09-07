<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('name'))
{
function name($user_id)
{
 $ci =& get_instance();
 $ci->load->database();
$condition = array('user_id' => $user_id);

		$ci->db->select('*');
		$ci->db->from('users');
		$ci->db->where($condition);
		$query=$ci->db->get()->row();
		return $query;

}
}
?>
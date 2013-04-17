<?php 

/*
 * vrati user_id
 */
function uid()
{
	$ci =& get_instance();
	$ci->load->library('tank_auth');
	
	return logged_in() ? $ci->tank_auth->get_user_id() : FALSE;
}


/*
 * vrati ci je user prihlaseny
 */
function logged_in()
{
	$ci =& get_instance();
	$ci->load->library('tank_auth');
	
	return $ci->tank_auth->is_logged_in();
}


/*
 * vrati ci je user administrator
 */
function is_admin()
{
	$ci =& get_instance();
	
	if (!$uid = uid()) return FALSE;
	
	if ((int)$uid === 1) return TRUE; 
	
	$query = $ci->db->select('role')
					->where('id', $uid)
					->get('users');

	return ($query->row()->role === '0') ? TRUE : FALSE;	
}

/*
 * vrati ci je user client
 */
function is_client()
{
	$ci =& get_instance();
	
	if (!$uid = uid()) return FALSE;
	
	if ((int)$uid === 1) return TRUE; // TURBO MEGA ADMIN
	
	$query = $ci->db->select('role')
					->where('id', $uid)
					->get('users');

	return ($query->row()->role === '1') ? TRUE : FALSE;	
}

/*
 * vrati ci je user restauracia
 */
function is_restaurant()
{
	$ci =& get_instance();
	
	if (!$uid = uid()) return FALSE;
	
	if ((int)$uid === 1) return TRUE; // TURBO MEGA ADMIN
	
	$query = $ci->db->select('role')
					->where('id', $uid)
					->get('users');

	return ($query->row()->role === '2') ? TRUE : FALSE;	
}
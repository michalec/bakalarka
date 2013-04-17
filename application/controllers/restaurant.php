<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Restaurant extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url','auth_helper'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
                $this->load->model('restaurant_model');
                if(!is_restaurant()){
                    redirect('fakof');
                }
                
	}

	function index()
	{
            $data = array('user' => $this->restaurant_model->get_user_detail(uid()));
            
            
            $this->template->set('title',$this->lang->line('label_login'));
            $this->template->load('template', 'restaurant_profile_view', $data);
            
	}
        
        function profile(){
            $data = array('user' => $this->restaurant_model->get_user_detail($id));
            
            
            $this->template->set('title',$this->lang->line('label_login'));
            $this->template->load('template', 'restaurant_profile_view', $data);
            
        }
}
?>

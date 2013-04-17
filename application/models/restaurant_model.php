<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Restaurant_model extends CI_Model {
    /*
     * get_user_detail
     * 
     * Funkcia vrati vsetky informacie o danom pouzivatelovi
     * 
     * @param user_id ID pouzivatela
     */

    public function get_user_detail($user_id) {
        $this->db->select(
                        'users.email as email, 
                         users.username as username,
                         restaurants.name as name,
                         restaurants.surname as surname,
                         restaurants.phone as phone,
                         restaurants.adress as adress,
                         restaurants.postcode as postcode,
                         restaurants.description as description'
        );
        $this->db->from('users');
        $this->db->join('restaurants','users.id = restaurants.users_id');
        $this->db->where(array('users.id' => $user_id));
        $query = $this->db->get();
        
        return $query->row_array();
    }

}
?>

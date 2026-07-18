<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users_model extends CI_Model{

//declare constructor
function __construct(){
parent::__construct();
//akses database
$this->load->database();
}
//function login
public function login($username, $password){
//cek data
$this->db->where('username', $username);
$this->db->where('password', $password);
$data = $this->db->get('users');

return $data->row_array();

}
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';


class users extends REST_Controller{

    //declare constructor
    function __construct(){
        parent::__construct();
        $this->load->model('users_model');
    }

    function index_post(){
        //isi value parameter username dan password
        $username = $this->post('username');
        $password = $this->post('password');

        //load model -> login function
        $data = $this->users_model->login($username, $password);

        if(empty($data)){
        $output = array(
            'success' => false,
            'message' => 'Login failed, Please check your username/password',
            'data' => null
        );
        $this->response($output, REST_Controller::HTTP_OK);
        $this->output->_display();
        exit();
    }else{
        $result = $data;
        $output = array(
            'success' => true,
            'message' => 'Login success',
            'data' => $data
        );
        $this->response($output, REST_Controller::HTTP_OK);

}
}
}
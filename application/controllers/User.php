<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class User extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_post() { 
        $data = array(
                    'username'    => $this->post('username'),
                    'password'    => md5($this->post('password')));

        $this->db->where($data);
        $get = $this->db->get('user');

        if ($get->num_rows()>0) {
            $this->response(array("result"=>$get->result(),'status' => 200, 'message' => 'Login Berhasil'));
        } else {
            $this->response(array('status' => 401, 'message' => 'Login Gagal!!!', ));
        }

    }

}
?>
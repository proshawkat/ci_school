<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
      
    }

    public function index() {
        echo "hello";
        die();
        $data = array(
            'siteTitle' => "Admin Panel"
        );
        $this->load->view('admin/login', $data);
    }

    public function check(){
        $ldata = array(
            "email" => $this->input->post("email"),
            "password" => md5($this->input->post("pass"))
        );
        //echo "<pre>";
        //print_r($ldata);
        $cd = $this->mt->Check_Data("admin", "*", $ldata);
       // print_r($cd);
//        die();
        if ($cd) {
            foreach ($cd as $v) {
                $udata = array(
                    "myid" => $v->admin_id,
                    "mytype" => $v->type
                );
                $this->session->set_userdata($udata);
                if ($v->type == "sa") {
                    redirect(base_url(). "dashboard/dashboard-home");
                } else {
                    redirect(base_url() , "refresh");
                }
            }
        }else {
            $this->session->set_flashdata("msg", "You must login to manage your website");
            $this->index();
        }
    }

    public function logout(){
        $this->session->unset_userdata("myid");
        $this->session->unset_userdata("mytype");
        redirect(base_url(). "admin/login", "refresh");
    }

}

?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parent_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $type = $this->session->userdata("mytype");
        if ($type != "sa" && $type == "") {
            redirect(base_url(), "refresh");
        }
    }

    public function change_password() {
        $data = array();
        $data['siteTitle'] = "Change password";
        $data['content'] = $this->load->view("admin/admin_file/change_password", $data, TRUE);
        $this->load->view("admin/main", $data);
    }

    public function check_password() {
        $type = $this->session->userdata("myid");
        $old_pass = $this->db->query("SELECT * FROM admin WHERE admin_id=" . $type)->row_array();

        $opass = md5($this->input->post("current_pass"));
        $npass = md5($this->input->post("new_pass"));
        $rnpass = md5($this->input->post("rnew_pass"));

        if ($old_pass['password'] == $opass) {
            if ($npass == $rnpass) {
                $chanage = $this->db->query("UPDATE admin SET password='$npass' WHERE admin_id=" . $type);
                if ($chanage) {
                    $this->session->set_flashdata("msg", "Your New Password Successfully Changed");
                    redirect(base_url() . "parent_controller/change_password", "refresh");
                }
            } else {
                $this->session->set_flashdata("pmsg", "Your New Password Not Match");
                redirect(base_url() . "parent_controller/change_password", "refresh");
            }
        } else {
            $this->session->set_flashdata("pmsg", "Your Current Password is wrong");
            redirect(base_url() . "parent_controller/change_password", "refresh");
        }
    }

}

?>
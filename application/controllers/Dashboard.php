<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $type = $this->session->userdata("mytype");
        if ($type != "sa" && $type == "") {
            redirect(base_url(), "refresh");
        }
    }

    public function index() {
        $data['siteTitle'] = "Dashboard";
//        $data['content'] = $this->load->view("admin/view-member", $data, TRUE);
        $this->load->view("admin/main", $data);
    }
}
?>
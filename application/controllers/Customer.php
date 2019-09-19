<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $type = $this->session->userdata("mytype");
        if ($type != "sa" && $type == "") {
            redirect(base_url(), "refresh");
        }
    }

    public function index(){
        $data['siteTitle'] = "Customer";
        $data['sitemenu'] = "customer";
        $data['customer_data'] = $this->mt->View_Data("customer", "price", "asc");
        $data['content'] = $this->load->view("admin/view-c-email", $data, TRUE);
        $this->load->view("admin/main", $data);
    }
    
    public function view_details(){
		$id = $this->uri->segment(3);
		$data = array();
		$data['singleData'] = $this->mt->getSingleData("customer", array("customer_id"=>$id), 1);
		$data['content'] = $this->load->view("admin/view-single", $data, TRUE);
		$this->load->view("admin/main", $data);
    }
	
	public function delete_message(){
        $id = $this->uri->segment(3);
       $cmsg = $this->mt->getSingle('customer', array('customer_id' => $id));
        if (file_exists("assets/customer_upload/c_$id." . $cmsg['picture'])) {
            unlink("assets/customer_upload/c_$id." . $cmsg['picture']);
        }
        if ($this->mt->deleteData('customer', array('customer_id' => $id))) {
            $this->session->set_flashdata('msg', 'You have successfully deleted a message');
            redirect(base_url() . "customer/index", "refresh");
        } else {
            $this->session->set_flashdata('emsg', 'Something Went Wrong.');
            redirect(base_url() . "customer/index", "refresh");
        }
    }
}
?>
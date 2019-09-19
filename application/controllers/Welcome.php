<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $data = array();
        $data['siteTitle'] = "Lace Quatation";
        $data['product'] = $this->mt->getData("product", "product_id", "desc", 1);
        $data['total_pdt'] = $this->mt->getData("product", "product_id", "desc", '');
		$data['first'] = $this->db->order_by("product_id", "asc")->get("product",1)->row_array();
		$p = $this->mt->getData("product", "product_id", "desc", 2);
		$i = 0;
		foreach($p as $key){$i++;
			if($i==1){
				$data['next_r'] = $key->product_id;
			}
		}
        $data['content'] = $this->load->view("home", $data, true);
        $this->load->view('master', $data);
    }
	
	// //Change data
	// public function changedQuote($id){
		// $data = array();
        // $data['product'] = $this->mt->getSingleDate('product', array('product_id'=>$id));
		// $p = $this->db->order_by('product_id','desc')->get_where('product',array(),2,$id)->result();
		// foreach($p as $key){
			// $data['next_r'] = $key->product_id+1;
		// }
		// $this->load->view("each_quote", $data);
	// }
	
	public function prev_quote($id){
		$c = $this->db->get_where('product',array('product_id'=>$id))->num_rows();
		if($c!=1){
			$this->load->view('page_not_found');
		}else{
			$data = array();
			$data['siteTitle'] = "Lace Quatation";
			$data['first'] = $this->db->order_by("product_id", "asc")->get("product",1)->row_array();
			$data['last'] = $this->db->order_by("product_id", "desc")->get("product",1)->row_array();
			$data['product'] = $this->mt->getSingleDate('product', array('product_id'=>$id));
			//
			$p = $this->db->order_by('product_id','desc')->get('product')->result();
			foreach($p as $key){
				if($key->product_id < $id){
					$data['prev_r'] = $key->product_id;
					break;
				}
			}
			//
			$p = $this->db->order_by('product_id','asc')->get('product')->result();
			foreach($p as $key){
				if($key->product_id > $id){
					$data['next_r'] = $key->product_id;
					break;
				}
			}
			$this->session->set_userdata('prev_url',current_url());
			$data['content'] = $this->load->view("each_quote", $data, true);
			$this->load->view('master', $data);
		}
	}
	
	
	
	

    public function insert() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('c_name', 'Company name', 'required');
        $this->form_validation->set_rules('p_name', 'person name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_emails');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('website', 'website link', 'required');
        $this->form_validation->set_rules('weight', 'weight', 'required');
        $this->form_validation->set_rules('model_num', 'model number', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $ext = "";
            if ($_FILES['picture']['name'] != "") {
                $ext = pathinfo($_FILES['picture']['name']);
                $ext = strtolower($ext['extension']);
            }else{
               $ext = "";
            }
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
                $ext = "";
            }
            $udata = array(
                "company_name" => $this->input->post("c_name"),
                "contact_name" => $this->input->post("p_name"),
                "email" => $this->input->post("email"),
                "phone" => $this->input->post("phone"),
                "company_website" => $this->input->post("website"),
                "weight" => $this->input->post("weight"),
                "art_no" => $this->input->post("model_num"),
                "price" => $this->input->post("price"),
                "date" => date("Y-m-d"),
                "picture" => $ext
            );
            //print_r($udata);
            if ($this->mt->Save_Data("customer", $udata)) {
                $id = $this->db->insert_id();
                copy($_FILES['picture']['tmp_name'], "./assets/customer_upload/c_$id.$ext");
                $this->session->set_flashdata("msg", "You have successfully Sent Your Message.");
                redirect($this->session->userdata('prev_url'), "refresh");
            } else {
               $this->session->set_flashdata("emsg", "Something Went Wrong.");
                redirect($this->session->userdata('prev_url'), "refresh");
            }
        }
    }

}

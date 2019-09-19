<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $type = $this->session->userdata("mytype");
        if ($type != "sa" && $type == "") {
            redirect(base_url(), "refresh");
        }
    }

    private function getExt($url) {
        $ext = "";
        if ($url != "") {
            $ext = pathinfo($url);
            $ext = strtolower($ext['extension']);
            if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif") {
                $ext = "";
            }
        }
        return $ext;
    }

    public function add_category() {
        $data['siteTitle'] = "Dashboard";
        $data['content'] = $this->load->view("admin/add-category", $data, TRUE);
        $this->load->view("admin/main", $data);
    }

    public function insert_cat() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('cat_name', 'Category name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->add_category();
        } else {

            $create_id = $this->session->userdata("myid");
            $udata = array(
                "category_name" => $this->input->post("cat_name"),
                "create_date" => date("Y-m-d"),
                "create_by" => $create_id
            );
            if ($this->mt->Save_Data("category", $udata)) {
                $this->session->set_flashdata("msg", "You have successfully created a category.");
                redirect(base_url() . "product/view_category", "refresh");
            } else {
                $this->session->set_flashdata("emsg", "Something Went Wrong.");
                redirect(base_url() . "product/add_category");
            }
        }
    }

    public function view_category() {
        $data['siteTitle'] = "Dashboard";
        $data['category'] = $this->mt->View_Data("category", "category_id", "desc");
        $data['content'] = $this->load->view("admin/view-category", $data, TRUE);
        $this->load->view("admin/main", $data);
    }

    public function edit_category($id = "") {
        $id = $this->uri->segment(3);
        $data = array();
        $data['singleData'] = $this->mt->getSingle("category", array("category_id" => $id));
        $data['content'] = $this->load->view("admin/edit-category", $data, TRUE);
        $this->load->view("admin/main", $data);
    }

    public function update_cat() {
        $id = $this->input->post("hid");
        $udata = array(
            "category_name" => $this->input->post("cat_name"),
            "create_date" => date("Y-m-d"),
            "create_by" => $create_id
        );
        if ($this->mt->updateData("category", "category_id", $id, $udata)) {
            $this->session->set_flashdata("msg", "You have successfully updated a category.");
            redirect(base_url() . "product/view_category");
        } else {
            $this->session->set_flashdata("emsg", "Something Went Wrong.");
            redirect(base_url() . "product/view_category");
        }
    }

    public function delete_category() {
        $id = $this->uri->segment(3);
        if ($this->mt->deleteData('category', array('category_id' => $id))) {
            $this->session->set_flashdata('msg', 'You have successfully deleted a category');
            redirect(base_url() . "product/view_category", "refresh");
        } else {
            $this->session->set_flashdata('emsg', 'Something Went Wrong.');
            redirect(base_url() . "product/view_category", "refresh");
        }
    }

    public function add_product() {
        $data['siteTitle'] = "Dashboard";
        $data['content'] = $this->load->view("admin/add-product", $data, TRUE);
        $this->load->view("admin/main", $data);
    }

    public function insert_product() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('model_num', 'Art No', 'required');
        $this->form_validation->set_rules('composition', 'composition', 'required');
        $this->form_validation->set_rules('quantity', 'quantity', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->add_product();
        } else {
            $create_id = $this->session->userdata("myid");
            $ext = $this->getExt($_FILES['picture']['name']);
            $udata = array(
                "art_no" => $this->input->post("model_num"),
                "composition" => $this->input->post("composition"),
                "quantity" => $this->input->post("quantity"),
                "picture" => $ext,
                "create_date" => date("Y-m-d"),
                "create_by" => $create_id
            );
            if ($this->mt->Save_Data("product", $udata)) {
                $id = $this->db->insert_id();
                copy($_FILES['picture']['tmp_name'], "./assets/images/product/p_$id.$ext");
                $this->session->set_flashdata('msg', 'You have successfully created a product');
                redirect(base_url() . "product/view_product", "refresh");
            } else {
                $this->session->set_flashdata('emsg', 'Something Went Wrong.');
                redirect(base_url() . "product/view_product", "refresh");
            }
        }
    }

    public function view_product() {
        $data['siteTitle'] = "Customer";
        $data['sitemenu'] = "customer";
        $data['products'] = $this->mt->getData("product", "product_id", "desc", "*");
        $data['content'] = $this->load->view("admin/view-product", $data, TRUE);
        $this->load->view("admin/main", $data);
    }

    public function edit_product() {
        $id = $this->uri->segment(3);
        $data = array();
        $data['singleData'] = $this->mt->getSingle("product", array("product_id" => $id));;
        $data['content'] = $this->load->view("admin/edit-product", $data, TRUE);
        $this->load->view("admin/main", $data);
    }

    public function update_product() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('model_num', 'Art No', 'required');
        $this->form_validation->set_rules('composition', 'composition', 'required');
        $this->form_validation->set_rules('quantity', 'quantity', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->add_product();
        } else {
            $id = $this->input->post("hid");

            $ext = $this->getExt($_FILES['picture']['name']);
            $img = $this->mt->update_product(array("product_id" => $id));

            foreach ($img as $pic) {
                $old_ext = $pic->picture;
            }

//        echo $old_ext;
//        die();
//        
            if ($ext != "") {
                if (file_exists("./assets/images/product/p_$id.$ext")) {
                    unlink("./assets/images/product/p_$id.$ext");
                }
                copy($_FILES['picture']['tmp_name'], "./assets/images/product/p_$id.$ext");
            } else {
                $ext = $pic->picture;
                // echo $ext;
                //die();
            }

            $create_id = $this->session->userdata("myid");
            $ext = $this->getExt($_FILES['picture']['name']);
            $dtu = array(
                "art_no" => $this->input->post("model_num"),
                "composition" => $this->input->post("composition"),
                "quantity" => $this->input->post("quantity"),
                "picture" => $ext,
                "create_date" => date("Y-m-d"),
                "create_by" => $create_id
            );
            //die();
            if ($this->mt->updateData('product', 'product_id', $id, $dtu)) {
                $this->session->set_flashdata('msg', 'You have successfully updated a product');
                redirect(base_url() . "product/view_product", "refresh");
            } else {
                $this->session->set_flashdata('emsg', 'Something Went Wrong.');
                redirect(base_url() . "product/view_product", "refresh");
            }
        }
    }

    public function delete_product() {
        $id = $this->uri->segment(3);
        $book = $this->mt->getSingle('product', array('product_id' => $id));
        if (file_exists("assets/images/product/p_$id." . $book['picture'])) {
            unlink("assets/images/product/p_$id." . $book['picture']);
        }
        if ($this->mt->deleteData('product', array('product_id' => $id))) {
            $this->session->set_flashdata('msg', 'You have successfully deleted a product');
            redirect(base_url() . "product/view_product", "refresh");
        } else {
            $this->session->set_flashdata('emsg', 'Something Went Wrong.');
            redirect(base_url() . "product/view_product", "refresh");
        }
    }

}

?>
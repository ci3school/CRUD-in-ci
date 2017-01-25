<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('usermodel', 'user');
    }

    public function index($start = null) {
        $this->load->library('pagination');
        $config['base_url'] = base_url('users');
        $config['total_rows'] = $this->user->getTotalUsers();
        $config['per_page'] = $limit = 10;
        
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['users'] = $this->user->getAllUsers($limit, $this->uri->segment(2));
        
        $this->load->view('users/index', $data);
    }
    
    public function add() {
        $this->form_validation->set_rules('FirstName', 'First Name', 'required');
        $this->form_validation->set_rules('LastName', 'Last Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        if($this->form_validation->run()) {
            $userData = array(
               'FirstName' => $this->input->post('FirstName'),
               'LastName' => $this->input->post('LastName'),
               'phone' => $this->input->post('phone'),
               'address' => $this->input->post('address'),
               'city' => $this->input->post('city'),
               'country' => $this->input->post('country')
            );
            $response = $this->user->add($userData);
            if($response) {
                $this->session->set_flashdata('msg', 'User has been inserted successfully!');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Try after sometime.');
            }
            redirect(base_url('users/add'));
        }
        $this->load->view('users/add');
    }
    
    public function edit($id, $page = '') {
        $data['user'] = $this->user->getUserById($id);
        $this->form_validation->set_rules('FirstName', 'First Name', 'required');
        $this->form_validation->set_rules('LastName', 'Last Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        if($this->form_validation->run()) {
            $userData = array(
               'FirstName' => $this->input->post('FirstName'),
               'LastName' => $this->input->post('LastName'),
               'phone' => $this->input->post('phone'),
               'address' => $this->input->post('address'),
               'city' => $this->input->post('city'),
               'country' => $this->input->post('country')
            );
            $response = $this->user->update($id, $userData);
            if($response) {
                $this->session->set_flashdata('msg', 'User has been updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Try after sometime.');
            }
            redirect(base_url('users/'.$page));
        }
        $this->load->view('users/edit', $data);
    }
    
    public function delete($id, $page = '') {
        $response = $this->user->delete($id);
        if($response) {
            $this->session->set_flashdata('msg', 'User has been deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Try after sometime.');
        }
        redirect(base_url('users/'.$page));
    }

}

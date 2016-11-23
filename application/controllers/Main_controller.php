<?php

/**
 * Created by PhpStorm.
 * User: ambidextrousbd
 * Date: 9/3/15
 * Time: 10:57 AM
 */
class Main_controller extends CI_Controller
{
    public function index(){
        $this->load->view('index');
    }

    public function home(){
        $this->load->view('layout/header');
        $this->load->view('pages/home');
        $this->load->view('layout/footer');
    }

    public function about()
    {
        $this->load->view('layout/header');
        $this->load->view('pages/about');
        $this->load->view('layout/footer');
    }

    public function registration(){
        $this->load->view('layout/header');
        $this->load->view('pages/registration');
        $this->load->view('layout/footer');

    }

    public function view_update($data){
        $this->load->view('layout/header');
        $this->load->view('pages/view_update',$data);
        $this->load->view('layout/footer');
    }

    public function profile(){
        $this->load->view('pages/profile');
    }


    public function user_reg()
    {
        $this->form_validation->set_rules('firstNameText', 'First Name', 'required');
        $this->form_validation->set_rules('lastNameText', 'last name', 'required');
        $this->form_validation->set_rules('emailText', 'email', 'required');
        $this->form_validation->set_rules('passwordText', 'password', 'required');
       /* $this->form_validation->set_rules('uploadImage', 'file', 'required');*/

        if($this->form_validation->run() == false){
            $this->registration();
        }
        else {
            $type = explode('.',$_FILES['uploadImage']['name']);
            $type = $type[count($type)-1];
            $img_name = uniqid(rand()).".".$type;
            /*$img_name = $_FILES['uploadImage']['name'].".".$type;*/
            $url = "./images/img/".$img_name;
            if(in_array($type,array('jpg','png','jpeg','JPG','PNG','JPEG'))){
                if( is_uploaded_file( $_FILES['uploadImage']['tmp_name'] ) ){
                    move_uploaded_file( $_FILES['uploadImage']['tmp_name'],$url);
                }
            }
            $data = array(
                'f_name' => set_value('firstNameText'),
                'l_name' => set_value('lastNameText'),
                'email' => set_value('emailText'),
                'password' => set_value('passwordText'),
                'image' => $img_name
            );
            $result = $this->users_model->insert_registration($data);
            if ($result) {
                $this->session->set_flashdata('mgs',"Data Successfully Save");
            } else {
                $this->session->set_flashdata('mgs','not save');
            }
            redirect('main_controller/user_reg');
        }
    }

    public function all_users(){
        $this->load->view('layout/header');
        $user_data['recodrs'] = $this->users_model->user_show();
        $this->load->view('pages/users',$user_data);
        $this->load->view('layout/footer');
    }

    public function show_update_row(){
        $id = $this->uri->segment(3);
       // echo $id;
        $data['single_row'] = $this->users_model->update_show($id);
       $this->view_update($data);
    }

    public function update_row(){
        $id= $this->input->post('idText');
        $data = array(
            'f_name' => $this->input->post('firstNameText'),
            'l_name' => $this->input->post('lastNameText'),
            'email' => $this->input->post('emailText'),
            'password' => $this->input->post('passwordText')
        );
       $result = $this->users_model->data_update($id,$data);
        if($result){
            $this->session->set_flashdata('up_mgs','Data Updated');
        }else{
            $this->session->set_flashdata('up_mgs','Data Not Updated');
        }
        redirect('main_controller/all_users?id='.$id);
    }

    public function delete_row(){
        $id = $this->uri->segment(3);
       // echo $id;
        $result = $this->users_model->delete_id($id);
        if ($result) {
            $this->session->set_flashdata('mgs_delete','Data Deleted');
        } else {
            $this->session->set_flashdata('mgs_delete','Not Deleted');
        }
        redirect('main_controller/all_users?id='.$id);
    }

    public function login_process(){

        $this->form_validation->set_rules('emailText', 'email', 'required');
        $this->form_validation->set_rules('passwordText', 'password', 'required');

        $data = array(
            'email' => $this->input->post('emailText'),
            'password' => $this->input->post('passwordText')
        );
        $this->session->set_userdata('login_msg',"Login Successfully");
        $result = $this->users_model->login_data($data);
        if($result == TRUE){
            $sess_array = array(
                'email' => $this->input->post('emailText')
            );
            $this->session->set_userdata('logged_in', $sess_array);
            $this->users_model->read_user_information($sess_array);
            $this->home();
            /*$this->profile();*/ /*if you want to make a profile then call profiel method and use session*/
        }else{
            $data = array(
                'error_message' => 'Invalid Email or Password'
            );
            $this->load->view('index',$data);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('index');
    }
















    public function upload_form(){
        $this->load->view('upload_form');
    }
    public function profile_image_check()
    {
        if( $url = $this->do_upload()){
            echo "Image uploaded";
        }else{
            echo "Image not uploaded";
        }

    }

   private function do_upload()
    {
        $type = explode('.',$_FILES['uploadImage']['name']);
        $type = $type[count($type)-1];
        $url = "./images/img/".uniqid(rand()).".".$type;
        if(in_array($type,array('jpg','png','jpeg','JPG','PNG','JPEG'))){
            if( is_uploaded_file( $_FILES['uploadImage']['tmp_name'] ) ){
                if(move_uploaded_file( $_FILES['uploadImage']['tmp_name'],$url)){
                    return $url;
                }
            }
            return false;
        }else{
            return false;
        }
    }
}
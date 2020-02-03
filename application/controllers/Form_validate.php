<?php

class Form_validate extends CI_Controller {

        public function index()
        {
                $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');

                // $this->form_validation->set_rules($config);


                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('myform_validate');
                }
                else
                {
                        $this->load->view('formsuccess_validate');
                }
        }
}
<?php

class Form extends CI_Controller {

        public function index()
        {
                $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');

                $config = array(
                        array(
                                'field' => 'username',
                                'label' => 'Username',
                                'rules' => 'required'
                        ),
                        array(
                                'field' => 'password',
                                'label' => 'Password',
                                'rules' => 'required',
                                'errors' => array(
                                        'required' => 'You must provide a %s.',
                                ),
                        ),
                        array(
                                'field' => 'passconf',
                                'label' => 'Password Confirmation',
                                'rules' => 'required'
                        ),
                        array(
                                'field' => 'email',
                                'label' => 'Email',
                                'rules' => 'required'
                        )
                );

                $this->form_validation->set_rules($config);


                // $this->form_validation->set_rules('username', 'Username', 'required');
                // $this->form_validation->set_rules('password', 'Password', 'required',
                //         array('required' => 'You must provide a %s.')
                // );
                // $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
                // $this->form_validation->set_rules('email', 'Email', 'required');

                // $this->form_validation->set_rules(
                //         'username', 'Username',
                //         'required|min_length[5]|max_length[12]|is_unique[users.username]',
                //         array(
                //                 'required'      => 'You have not provided %s.',
                //                 'is_unique'     => 'This %s already exists.'
                //         )
                // );
                $this->form_validation->set_rules('username', 'Username', array('required', 'min_length[5]'));
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
                // $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('myform');
                }
                else
                {
                        $this->load->view('formsuccess');
                }
        }
}
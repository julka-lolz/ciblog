<?php
    // extends uitbreidt de classe en word beschouwd als een parent class.
    class Posts extends CI_Controller{
        public function index(){
            $data['title'] = 'Latest Posts';

            $data['posts'] = $this->post_model->get_posts();
            
            //Hierin laden we de view.
            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL){
            $data['post'] = $this->post_model->get_posts($slug);            

            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = $data['post']['title'];

            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');

        }

        public function create(){        
            $data['title'] = 'Create Post';

            $data['categories'] = $this->post_model->get_categories();

            /*
            Hiermee maken we de rules voor de validatie.
            CodeIgniter lets you set as many validation rules as you need for a given field, cascading them in order, 
            and it even lets you prep and pre-process the field data at the same time. 
            To set validation rules you will use the set_rules() method: 
            $this->form_validation->set_rules();
            The above method takes three parameters as input.
            */
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            /* Deze if statement kijkt of de form niet gesubmit is. Als hij niet gesubmit is dan krijg je de create post form. Als hij wel gesubmit is */
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            }else {
                //upload image
                $config['upload_path'] = './assets/images/posts';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '500';
                $config['max_height'] = '500';

                $this->load->library('upload', $config);

                //als er een foto niet bestaat for upload dan krijgen we een error met 'noimage.jpg' voor $post_image
                if(!$this->upload->do_upload('userfile')){
                    $errors = array('error' => $this->upload->display_errors());
                    print_r($_FILES);
                    print_r($errors); 
                    exit();
                    $post_image = 'noimage.jpg';
                }else {
                    //als de foto bestaat dan krijgt $post_image de actuele naam van de foto die je toevoegt.
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name'];
                }
                
                $this->post_model->create_post($post_image);
                redirect('posts');
            }
        }

        public function delete($id){
            $this->post_model->delete_post($id);
            redirect('posts');
        }

        public function edit($slug){
            $data['post'] = $this->post_model->get_posts($slug); 
            $data['categories'] = $this->post_model->get_categories();           

            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = 'Edit Post  ';

            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update(){
            $this->post_model->update_post();
            redirect('posts');
        }
    }
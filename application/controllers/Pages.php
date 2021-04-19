<?php
    // extends uitbreidt de classe en word beschouwd als een parent class.
    class Pages extends CI_Controller{
        public function view($page = 'home'){
            //Met deze if statement kijken we of de file bestaat.
            //APPPATH is in codeigniter een costance die een path geeft naar de file.
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                //als de file niet bestaat dan krijg je een error te zien.
                show_404();
            }
            //ucfirst maakt alle letters van $page uppercase.
            $data['title'] = ucfirst($page);
            
            //Hierin laden we de view.
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
        }
    }
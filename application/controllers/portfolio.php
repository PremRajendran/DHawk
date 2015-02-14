<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('ion_auth'));

        if ( ! $this->ion_auth->logged_in())
        {
            redirect(base_url() . 'auth/login');
        }

        $this->load->model('portfolio_model');
    }


    public function index()
    {
        echo "hello";
    }
}

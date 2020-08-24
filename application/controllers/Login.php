<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render();
    }

	public function authenticate()
	{
		$nombre= $this->input->post('nombre',TRUE);
		$clave=$this->input->post('clave',TRUE);
		if (($nombre=="admin")&&($clave=="12345")){
			redirect(base_url()."parser");

		} else {
			redirect(base_url()."login");
		}

	}


}

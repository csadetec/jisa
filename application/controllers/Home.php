<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
	//	$this->load->model();
   // $this->load->library();
    verifica_login();
   
  

  }

  public function index(){
    $data['titulo'] = 'DOCUMENTAÇÃO';
    $data['page'] = 'home/home_tutorial';
    $data['sidebar'] = 'home/home_sidebar';

    $this->load->view('load', $data, FALSE);

  }


}

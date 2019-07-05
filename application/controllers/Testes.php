<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Testes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Sao_Paulo");
        setlocale(LC_ALL, 'pt_BR');
        $this->load->model(array('testes_model'));
        $this->load->helper(array('form',  'url', 'funcoes_helper'));
        $this->load->library(array(/*'form_validation',*/ 'session'));
        //   $this->output->enable_profiler(TRUE);
    }

    public function index() {
        $equipes = $this->testes_model->select();

        foreach($equipes as $e):

        endforeach;


        /** */
        echo '<pre>';
        print_r($e);
        print_r($equipes);
        echo '</pre>';
        /** */

    }
      

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alunos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('alunos_model');
    $this->load->library(array('table'));
    verifica_login();
    verifica_admin();
    //$this->output->enable_profiler(TRUE);
  

  }

   public function index(){

  }

  public function cadastrar(){

  }



     
  public function editar($id=0)
  {
    $data['aluno'] = $this->alunos_model->select_id($id);
    if(!$data['aluno'] || !$id)redirect('alunos/listar');
  
    if($post = $this->input->post()):
      if($this->alunos_model->update($id, $post)):
        set_msg('Atualizado com Sucesso', 'success');
        redirect('alunos/listar/'.$id);
      else:
        set_msg('Falha ao atualizar', 'danger');
      endif;
    endif;

    $data['titulo'] = 'Aluno Editar';
    $data['bread1'] = 'Alunos';
    $data['bread2'] = 'Editar';
    $data['page'] = 'alunos/alunos_form';
    $data['action'] = 'alunos/editar/'.$id;
    $data['btn_value'] = 'SALVAR';

    $this->load->view('load', $data, FALSE);


  }

  public function listar(){
    $data['alunos'] = $this->alunos_model->select();
    $data['titulo'] = 'Lista de Alunos';
    $data['page'] = 'alunos/alunos_listar';
    $this->load->view('load', $data, FALSE);

  }

}

/* End of file Alunos.php */
/* Location: ./application/controllers/Alunos.php */ ?>
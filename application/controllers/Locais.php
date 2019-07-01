<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Locais extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('locais_model');
    $this->load->library(array('table', 'form_validation'));
   
    verifica_login();
    verifica_admin_coordenador_juiz();
    //$this->output->enable_profiler(TRUE);

  }

  public function index(){

  }

  public function editar($id_local=null)
  {
    verifica_admin_coordenador();
    $data['local'] = $this->locais_model->select_id($id_local);
    if(!$data['local'] || !$id_local)redirect('locais/listar');
    $this->form_validation->set_rules('nome_local', 'NOME', 'trim|strclear|strtoupper|required');

    if($this->form_validation->run() == FALSE):
      if(validation_errors()):
        set_msg(validation_errors(), 'danger');
      endif;
    else:
      # code...
      $post = $this->input->post();
      if($this->locais_model->update($id_local, $post)):
        set_msg('Atualizado com Sucesso.', 'success');
        redirect('locais/listar');
      else:
        set_msg('Falha ao cadastrar', 'danger');
      endif;
    endif;
    
    $data['titulo'] = 'Editar Equipe '.$data['local']->nome_local;
    $data['page'] = 'locais/locais_form';
    $data['action'] = 'locais/editar/'.$id_local;
    $data['btn_value'] = 'ATUALIZAR';

    $this->load->view('load', $data, FALSE);


  }

  public function cadastrar()
  {
   
    $this->form_validation->set_rules('nome_local', 'NOME', 'trim|strclear|strtoupper|required');

    if($this->form_validation->run() == FALSE):
      if(validation_errors()):
        set_msg(validation_errors(), 'danger');
      endif;
    else:
      # code...
      $post = $this->input->post();
      if($this->locais_model->insert($post)):
        set_msg('Cadastrado com Sucesso.', 'success');
        redirect('locais/listar');
      else:
        set_msg('Falha ao cadastrar', 'danger');
      endif;
    endif;
    
    $data['titulo'] = 'Cadastrar Local';
    $data['page'] = 'locais/locais_form';
    $data['action'] = 'locais/cadastrar';
    $data['btn_value'] = 'CADASTRAR';

    $this->load->view('load', $data, FALSE);


  }




  public function listar(){

    $data['locais'] = $this->locais_model->select();
    $data['titulo'] = 'Locais';
    $data['page'] = 'locais/locais_listar';
    $this->load->view('load', $data, FALSE);

  }



}

/* End of file Alunos.php */
/* Location: ./application/controllers/Alunos.php */ ?>
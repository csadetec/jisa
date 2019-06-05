<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turmas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('locais_model','turmas_model', 'cursos_model'));
    $this->load->library(array('table','form_validation'));
   
    verifica_login();
    verifica_admin_coordenador();
    //$this->output->enable_profiler(TRUE);

  }

  public function index(){

 
  }

  public function editar($id_turma){
    verifica_admin_coordenador();
    if(!$turma = $this->turmas_model->select_id($id_turma))redirect('turmas/listar');


    $this->form_validation->set_rules('nome_turma', 'TURMA', 'trim|strclear|strtoupper|required');
    $this->form_validation->set_rules('id_curso', 'SELECIONE O CURSO', 'trim|required');


    if ($this->form_validation->run() == FALSE):
      if(validation_errors()):
        set_msg(validation_errors(), 'danger');
      endif;
    else:
      # code...
      $post = $this->input->post();
      $cods = $this->cursos_model->select_id($post['id_curso']);
    
      $post['codcur'] = $cods->codcur;
      $post['codper'] = $cods->codper;
   
      if($this->turmas_model->update($id_turma, $post)):
        set_msg('Turma Editada com Sucesso.', 'success');
        redirect('turmas/listar');
      else:
        set_msg('Falha ao cadastrar', 'danger');
      endif;
      /**/
    endif;

    $data['turma'] = $turma;
    $data['cursos'] = $this->cursos_model->select();
    $data['titulo'] = 'Editar Turma';
    $data['page'] = 'turmas/turmas_form';
    $data['action'] = 'turmas/editar/'.$id_turma;
    $data['btn_value'] = 'SALVAR';

    $this->load->view('load', $data, FALSE);

  }

  public function cadastrar(){
    $this->form_validation->set_rules('nome_turma', 'TURMA', 'trim|strclear|strtoupper|required|is_unique[jisa_turmas.nome_turma]');
    $this->form_validation->set_rules('id_curso', 'SELECIONE O CURSO', 'trim|required');


    if ($this->form_validation->run() == FALSE):
      if(validation_errors()):
        set_msg(validation_errors(), 'danger');
      endif;
    else:
      # code...
      $post = $this->input->post();

      $cods = $this->cursos_model->select_id($post['id_curso']);
      //unset($post['id_curso']);
      $post['codcur'] = $cods->codcur;
      $post['codper'] = $cods->codper;

      if($this->turmas_model->insert($post)):
        set_msg('Turma Cadastrada com Sucesso.', 'success');
        redirect('turmas/listar');
      else:
        set_msg('Falha ao cadastrar', 'danger');
      endif;
      /**/
    endif;
   
    $data['cursos'] = $this->cursos_model->select();

    $data['titulo'] = 'Cadastrar Turma';
    $data['page'] = 'turmas/turmas_form';
    $data['action'] = 'turmas/cadastrar';
    $data['btn_value'] = 'CADASTRAR';

    $this->load->view('load', $data, FALSE);

  }

  

  public function listar(){

    $data['turmas'] = $this->turmas_model->select();
    $data['titulo'] = 'TURMAS';
    $data['page'] = 'turmas/turmas_listar';
    $this->load->view('load', $data, FALSE);

  }

  

}

/* End of file Alunos.php */
/* Location: ./application/controllers/Alunos.php */ ?>
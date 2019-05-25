<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formacoes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('locais_model','equipes_model', 'modalidades_model', 'turmas_model', 'alunos_model', 'formacoes_model'));
    $this->load->library(array('table', 'form_validation'));
   
    verifica_login();
  //  verifica_admin_coordenador();
   // $this->output->enable_profiler(TRUE);

  }

  public function index(){

   
  }



  public function adicionar($id_equipe=null){

    if($post = $this->input->post()):
    
      $dados = array(
        'id_aluno'=> $post['id_aluno'],
        'id_equipe'=> $post['id_equipe']
      );
      if($this->formacoes_model->insert($dados)):
        echo "success";
      endif;
    else:
       $equipe = $this->equipes_model->select_id($id_equipe);
       if(!$id_equipe or !$equipe)redirect('equipes/listar');
      $data['alunos'] = $this->formacoes_model->select_no_equipe($id_equipe);
      $data['alunos_equipe'] = $this->formacoes_model->select_equipe($id_equipe);
     
      $data['equipe'] = $equipe;
      $data['equipes'] = $this->equipes_model->select_por_turma($equipe->id_turma);
      $data['titulo'] = 'EQUIPE:  '.$data['equipe']->nome_equipe;

      $data['page'] = 'formacoes/formacoes_listar';

      $data['equipes_por_turma'] = anchor('equipes/listar_por_turma/'.$equipe->id_turma,'EQUIPES  '.$equipe->nome_turma);
      $data['editar_equipe'] = anchor('equipes/editar/'.$id_equipe, 'EDITAR EQUIPE');
      $this->load->view('load', $data, FALSE);
    endif;
   
  }
 
  public function deletar(){
    if($post = $this->input->post()):
    
      $dados = array(
        'id_aluno'=> $post['id_aluno'],
        'id_equipe'=> $post['id_equipe']
      );
      
      if($this->formacoes_model->delete($dados)):
        echo "success";
      else:
        echo "error";
      endif;
    
    endif;

   
  }


  public function teste(){

    
    $dados = array(
      'id_aluno'=> 3,
      'id_equipe'=> 14,
    );
    
    if($formacao = $this->formacoes_model->select_aluno_equipe($dados)):
      echo '<pre>';
      print_r($formacao);
      echo '</pre>';
    else:
      echo 'nao cadastrado';
    endif;
    /*
    if($this->formacoes_model->insert($dados)):
      echo "success";
    endif;
/**/
/*
       if(!$id_equipe)redirect('turmas/listar');
      $data['alunos'] = $this->formacoes_model->select_no_equipe($id_equipe);
      $data['alunos_equipe'] = $this->formacoes_model->select_equipe($id_equipe);
      $data['equipe'] = $this->equipes_model->select_id($id_equipe);
      $data['titulo'] = 'Formar Equipe '.$data['equipe']->nome_equipe;
      $data['id_equipe'] = $id_equipe;
      $data['page'] = 'formacoes/formacoes_listar';
      $this->load->view('load', $data, FALSE);
    endif;
  /**/ 
  }
 



}

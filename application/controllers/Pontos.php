<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pontos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('pontos_model'));
    $this->load->library('table');
   
    verifica_login();
    verifica_admin_coordenador();
    //$this->output->enable_profiler(TRUE);

  }

  public function index(){

 
  }

  public function listar($buscar=null){



    $pontos[] = $this->pontos_model->select_pontos_id_equipe_1();
    $pontos[] = $this->pontos_model->select_pontos_id_equipe_2();
    $pontos[] = $this->pontos_model->select_pontos_id_equipe_3();
    $pontos[] = $this->pontos_model->select_pontos_id_equipe_4();
    $pontos[] = $this->pontos_model->select_pontos_id_equipe_5();

    /**
    echo '<pre>';
    print_r($pontos);
    echo '</pre>';
    /**/
       
    
    if($this->pontos_model->truncate()):
      foreach($pontos as $p):
        foreach($p as $p2):
          if(!$this->pontos_model->insert($p2)):
            set_msg('Falha ao inserir os pontos', 'danger');
          endif;
        endforeach;
      endforeach;
    else:
      set_msg('Falha ao limpar a tabela', 'danger');
    endif;
      
    if($buscar == 'equipes'):
      $data['turmas'] = null;
      $data['equipes'] = $this->pontos_model->select_pontos_equipes();
      $data['titulo'] = 'Lista dos Pontos | Equipes';
    else:
      $data['turmas'] = $this->pontos_model->select_pontos_turmas();
      $data['equipes'] = null;
      $data['titulo'] = 'Lista dos Pontos | Turmas';
    endif;
  
    $data['page'] = 'pontos/pontos_listar';
    $this->load->view('load', $data, FALSE);
    /**/


  }

  public function cadastrar(){

  }

  
  public function editar($id=0)
  {	
	echo 'editar pontos da turma';
	 /*
    $data['turma'] = $this->alunos_model->select_id($id);
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
    $data['page'] = 'alunos/alunos_form';
    $data['action'] = 'alunos/editar/'.$id;
    $data['btn_value'] = 'SALVAR';

    $this->load->view('load', $data, FALSE);
	/**/

  }
  /**/

}

/* End of file Alunos.php */
/* Location: ./application/controllers/Alunos.php */ ?>
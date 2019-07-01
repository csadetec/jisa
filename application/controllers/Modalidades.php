<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modalidades extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('modalidades_model');
    $this->load->library(array('table', 'form_validation'));
   
    verifica_login();
 
  }

  public function index(){

  }


  public function editar($id_modalidade=null)
  {
    verifica_admin_coordenador();
    $data['modalidade'] = $this->modalidades_model->select_id($id_modalidade);
    if(!$data['modalidade'] || !$id_modalidade)redirect('modalidades/listar');
    $this->form_validation->set_rules('nome_modalidade', 'NOME', 'trim|strclear|strtoupper|required');

    if($this->form_validation->run() == FALSE):
      if(validation_errors()):
        set_msg(validation_errors(), 'danger');
      endif;
    else:
      # code...
      $post = $this->input->post();
      if($this->modalidades_model->update($id_modalidade, $post)):
        set_msg('Atualizado com Sucesso.', 'success');
        redirect('modalidades/listar');
      else:
        set_msg('Falha ao Atualizar', 'danger');
      endif;
    endif;
    
    $data['titulo'] = 'Editar Modalidade '.$data['modalidade']->nome_modalidade;
    $data['page'] = 'modalidades/modalidades_form';
    $data['action'] = 'modalidades/editar/'.$id_modalidade;
    $data['btn_value'] = 'ATUALIZAR';

    $this->load->view('load', $data, FALSE);


  }

  public function cadastrar()
  {
    verifica_admin_coordenador();
    $this->form_validation->set_rules('nome_modalidade', 'NOME MODALIDADE', 'trim|strclear|strtoupper|is_unique[jisa_modalidades.nome_modalidade]|required');
    $this->form_validation->set_rules('qtd_integrantes', 'QUANTIDADE DE INTEGRANTES', 'trim|numeric|required');

    if($this->form_validation->run() == FALSE):
      if(validation_errors()):
        set_msg(validation_errors(), 'danger');
      endif;
    else:
      # code...
      $post = $this->input->post();
      if($this->modalidades_model->insert($post)):
        set_msg('Cadastrado com Sucesso.', 'success');
        redirect('modalidades/listar');
      else:
        set_msg('Falha ao Atualizar', 'danger');
      endif;
    endif;
    
    $data['titulo'] = 'Cadastrar Modalidade';
    $data['page'] = 'modalidades/modalidades_form';
    $data['action'] = 'modalidades/cadastrar';
    $data['btn_value'] = 'CADASTRAR';

    $this->load->view('load', $data, FALSE);


  }
  
  public function listar_json($id_modalidade=0){
    $query = $this->modalidades_model->select_id($id_modalidade);
    echo json_encode($query);  

  } 

  public function teste(){


      $query = $this->modalidades_model->select_id(1);
      echo json_encode($query);

    

  } 



  public function listar(){

    $data['modalidades'] = $this->modalidades_model->select();
    $data['titulo'] = 'LISTA DAS MODALIDADES';
    $data['page'] = 'modalidades/modalidades_listar';
    $this->load->view('load', $data, FALSE);

  }



}

/* End of file Alunos.php */
/* Location: ./application/controllers/Alunos.php */ ?>
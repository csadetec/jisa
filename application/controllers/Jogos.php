<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jogos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('locais_model', 'jogos_model', 'modalidades_model','equipes_model', 'formacoes_model', 'pontos_model', 'usuarios_model'));
    $this->load->library(array('table','form_validation'));
   
    verifica_login();
    //$this->output->enable_profiler(TRUE);

  }

   public function index(){


  }

  public function juiz($id_juiz=0){
    verifica_admin_coordenador();
     if($post = $this->input->post()):
      $dados = array('id_juiz'=>$post['id_juiz']);
      if($this->jogos_model->update($post['id_jogo'], $dados)):
        echo 'success';
      else:
        echo 'fail';
      endif;
    else:
      $data['jogos_sem_juiz'] = $this->jogos_model->select_jogos_sem_juiz();
      $data['jogos_com_juiz'] = $this->jogos_model->select_jogos_com_juiz($id_juiz);
      $data['juiz_selecionado'] = $this->usuarios_model->select_juiz_id($id_juiz);
      $data['titulo'] = 'Lista dos Jogos';
      $data['juizes'] = $this->usuarios_model->select_juiz();
      $data['page'] = 'jogos/jogos_juiz';
      $this->load->view('load', $data, FALSE);
    endif;

   
  }

  public function turmas(){
    verifica_admin_coordenador();
    //echo 'Lista de jo';

    
    $data['jogos'] = $this->jogos_model->select();
    $data['titulo'] = 'Lista dos Jogos';
    $data['page'] = 'jogos/jogos_listar_turma';
    $this->load->view('load', $data, FALSE);
    /**/

    
  }

  public function visualizar($id_jogo=null){

    verifica_admin_coordenador_juiz();

    $data['jogo'] = $this->jogos_model->select_id($id_jogo);
    /*
    echo '<pre>';
    echo '<br>';
    print_r($data['jogo']);
    echo '</pre>';
    /**/   
    if(!$id_jogo or !$data['jogo'])redirect('locais/listar');
    
    $this->form_validation->set_rules('pontos_equipe_1', 'PONTOS DA EQUIPE 1', 'trim|required');    
    $this->form_validation->set_rules('pontos_equipe_2', 'PONTOS DA EQUIPE 2', 'trim|required');
   
    if($this->form_validation->run() == false):
      if(validation_errors()):
        set_msg(validation_errors(), 'danger');
      endif;
    else:
      $post = $this->input->post();
      $post['id_usuario'] = $this->session->userdata('id_usuario');
     
      if($this->jogos_model->update($id_jogo, $post)):
        set_msg('Jogo Atualizado com sucesso', 'success');
        redirect('jogos/visualizar/'.$id_jogo);
      else:
        set_msg('Falha ao Atualizar', 'danger');
      endif;
      /**/
    endif;
    /**/
    
   
    $data['equipe_1'] = $this->formacoes_model->select_equipe($data['jogo']->id_equipe_1);
    $data['equipe_2'] = $this->formacoes_model->select_equipe($data['jogo']->id_equipe_2);
    $data['equipe_3'] = $this->formacoes_model->select_equipe($data['jogo']->id_equipe_3);
    $data['equipe_4'] = $this->formacoes_model->select_equipe($data['jogo']->id_equipe_4);
    $data['equipe_5'] = $this->formacoes_model->select_equipe($data['jogo']->id_equipe_5);

    
    $data['titulo'] = set_data($data['jogo']->data).' - '.$data['jogo']->horas_inicial.' | '.$data['jogo']->nome_local;
    $data['placeholder_pontos_equipe'] = 'GOLS';
    $data['placeholder_pontos_final'] = '';
    $data['btn_value'] = 'SALVAR';
    $data['action'] = 'jogos/visualizar/'.$id_jogo;

    if($data['jogo']->qtd_equipes > 2):
      $data['page'] = 'jogos/jogos_visualizar_equipes_multi';
    else:
      $data['page'] = 'jogos/jogos_visualizar_equipes';
    endif;     
    
    $this->load->view('load', $data, FALSE);
    /**/
  }


  public function listar($id_local = null){
    
    $data['local'] = $this->locais_model->select_id($id_local);
    if(!$data['local']):
      
      $usuario = $this->session->userdata('nome_perfil');
      /**/
      if($usuario == 'ADMINISTRADOR' or $usuario == 'COORDENADOR'):
        $data['page'] = 'jogos/jogos_listar_coordenador';
      elseif($usuario ==  'JUIZ'):
        $data['page'] = 'jogos/jogos_listar_juiz';
      elseif($usuario == 'REPRESENTANTE'):
        $data['page'] = 'jogos/jogos_listar_representante';
      endif;
      
      /**
      echo '<pre>';
      echo '<br>';
      echo $usuario;
    //  print_r(@$data['page']);
      echo '</pre>';
      /**/
      $data['jogos'] = $this->jogos_model->select();
      $data['titulo'] = 'Lista dos Jogos';
      $this->load->view('load', $data, FALSE);
  
    else:

      $data['jogos'] = $this->jogos_model->jogos_por_local($id_local);
      $data['titulo'] = 'Lista dos Jogos | '.$data['local']->nome_local;
      $data['page'] = 'jogos/jogos_listar_local';
      $this->load->view('load', $data, FALSE);
    endif;
  }


  public function cadastrar(){
    verifica_admin_coordenador();

    $this->form_validation->set_rules('data', 'DATA', 'trim|required');
    $this->form_validation->set_rules('horas_inicial', 'HORAS', 'trim|required');
    $this->form_validation->set_rules('id_local', 'DATA', 'trim|required');
    $this->form_validation->set_rules('id_modalidade', 'MODALIDADES', 'trim|required');
    /*
    $this->form_validation->set_rules('id_equipe_1', 'EQUIPE 1', 'trim|required');
    $this->form_validation->set_rules('id_equipe_2', 'EQUIPE 2', 'trim|required');
    /**/
    if($this->form_validation->run() == false):
      if(validation_errors()):
        set_msg(validation_errors(), 'danger');
      endif;
    else:
      $post = $this->input->post();
      $post['id_usuario'] = $this->session->userdata('id_usuario');
      if($id_jogo = $this->jogos_model->insert($post)):
        
        set_msg('Jogos Cadastrado com sucesso ', 'success');
        redirect('jogos/listar/');
       // redirect('jogos/editar/'.$id_jogo);
      else:
        set_msg('Falha ao Cadastrar', 'danger');
      endif;
      /**/
    endif;

    $data['juiz'] = $this->usuarios_model->select_juiz();
    $data['locais'] = $this->locais_model->select();
    $data['modalidades'] = $this->modalidades_model->select();
    $data['equipes'] = $this->equipes_model->select();
    $data['titulo'] = 'Cadastrar Jogo';
    $data['page'] = 'jogos/jogos_form';
    $data['action'] = 'jogos/cadastrar';
    $data['btn_value'] = 'CADASTRAR';

    $this->load->view('load', $data, FALSE);

  }

     
  public function editar($id_jogo=0)
  { 
    verifica_admin_coordenador();
    $data['jogo'] = $this->jogos_model->select_id($id_jogo);
    if(!$data['jogo'] || !$id_jogo)redirect('jogos/listar');

    $this->form_validation->set_rules('data', 'DATA', 'trim|required');
    $this->form_validation->set_rules('horas_inicial', 'DATA', 'trim|required');
    $this->form_validation->set_rules('id_local', 'LOCAL', 'trim|required');
    $this->form_validation->set_rules('id_modalidade', 'MODALIDADES', 'trim|required');
  
    
    if($this->form_validation->run() == false):
      if(validation_errors()):
        set_msg(validation_errors(), 'danger');
      endif;
    else:
      $post = $this->input->post();
   
      $post['id_usuario'] = $this->session->userdata('id_usuario');      
  

      if($this->jogos_model->update($id_jogo, $post)):
        set_msg('Jogo Atualizado com sucesso', 'success');
        redirect('jogos/editar/'.$id_jogo);
      else:
        set_msg('Falha ao atualizar', 'danger');
      endif;
      /**/
    endif;
    
    $data['juiz'] = $this->usuarios_model->select_juiz();
    $data['equipes'] = $this->equipes_model->select();
    $data['locais'] = $this->locais_model->select();
    $data['modalidades'] = $this->modalidades_model->select();
    $data['titulo'] = 'Editar Jogo';
    $data['page'] = 'jogos/jogos_form';
    $data['action'] = 'jogos/editar/'.$id_jogo;
    $data['btn_value'] = 'SALVAR';
    $data['disabled'] = 'disabled';

    $this->load->view('load', $data, FALSE);


  }

 

}

/* End of file Alunos.php */
/* Location: ./application/controllers/Alunos.php */ 
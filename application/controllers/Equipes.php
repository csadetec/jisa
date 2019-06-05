<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('locais_model','equipes_model', 'modalidades_model', 'turmas_model', 'cursos_model', 'formacoes_model', 'generos_model'));
    $this->load->library(array('table', 'form_validation', 'email'));
   
    verifica_login();
  
  //  $this->output->enable_profiler(TRUE);

  }

  public function index(){

   
  }

  

  public function listar(){

    $data['equipes'] = $this->equipes_model->select();
    $data['titulo'] = 'LISTA DAS EQUIPES';
    $data['page'] = 'equipes/equipes_listar';
    $this->load->view('load', $data, FALSE);



  }


  public function turma_email($id_equipe=0){
    
    if(!$post = $this->input->post()):
      redirect('equipes/listar_por_turma/'.$id_equipe);
    endif;
    /**/

    if(!$equipes = $this->equipes_model->select_por_turma($id_equipe)):
      set_msg('Turma ainda sem Equipe', 'info');
      redirect('equipes/cadastrar');
    endif; 
    foreach($equipes as $e):
      $integrantes_equipes[] = $this->formacoes_model->select_equipe($e->id_equipe);
    endforeach;

    /**/


    
    $data['titulo'] = 'EQUIPES DA TURMA: '.$equipes[0]->nome_turma;
    $data['equipes'] = $equipes;
    $data['integrantes_equipes'] = $integrantes_equipes;

   // $this->load->view('equipes/equipes_listar_turma_email', $data, FALSE);
    
    
    $html = $this->load->view('equipes/equipes_listar_turma_email', $data, true);


    $config = array(
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'ct.detec@gmail.com',
      'smtp_pass' => '@Csecif832',
      'mailtype'  => 'html',
      'charset'   => 'utf-8'
    );
    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->set_newline("\r\n");

    $this->email->to(array('ct.detec@gmail.com',  $post['email']));
    $this->email->from('ct.detec@gmail.com', $this->session->userdata('nome').' - Equipes');
    $this->email->subject( 'Equipes da Turma - '.$equipes[0]->nome_turma);
    $this->email->message($html);

    //Send email
    if($this->email->send()):
      echo 'success';
      /*
      set_msg('Email enviado com sucesso', 'success');
      redirect('equipes/listar_por_turma/'.$equipes[0]->id_turma);
      /**/
     // echo 'Email enviado com sucesso';
    
    else:
      echo 'error';
      //set_msg('Falha ao enviar E-mail', 'danger');
    //  echo $this->email->print_debugger();

    endif;

    /**/


  }

  public function listar_por_turma($id_turma){

    if(!$equipes = $this->equipes_model->select_por_turma($id_turma)):
      set_msg('Turma ainda sem Equipe', 'info');
      redirect('equipes/cadastrar');
    endif;
    $cont=0;
    foreach($equipes as $e):
      $integrantes_equipes = $this->formacoes_model->select_equipe($e->id_equipe);
      if($integrantes_equipes):
        foreach ($integrantes_equipes as $key => $i):
          $integrantes[] = $i;      
        endforeach;
      else:
        $cont++;
        if($cont == sizeof($equipes)):
          set_msg('Adicione Alunos na Equipe',  'info');
          redirect('formacoes/adicionar/'.$e->id_equipe);

        endif;
      endif;
    endforeach;

    /**
    echo '<pre>';
    //echo 'LISTA DAS EQUIPES'.'<br>';
    //print_r($cont);
    echo '<br>';
    /*
    print_r(sizeof($equipes));
    *
    print_r($equipes);
   
    print_r($integrantes_equipes);
    print_r($integrantes);
    echo '</pre>';

    /**/
    
    $data['titulo'] = 'EQUIPES | '.$equipes[0]->nome_turma;
    $data['page'] = 'equipes/equipes_listar_turma';
    $data['equipes'] = $equipes;
    $data['integrantes'] = $integrantes;
    $this->load->view('load', $data, FALSE);
    /**/


  }

  public function cadastrar(){
    verifica_admin_coordenador();
    $this->form_validation->set_rules('nome_equipe', 'NOME EQUIPE', 'trim|strclear|strtoupper|required|is_unique[jisa_equipes.nome_equipe]');
    $this->form_validation->set_rules('id_modalidade', 'MODALIDADE', 'trim|required');
     $this->form_validation->set_rules('id_turma', 'TURMA', 'trim|required');

    if ($this->form_validation->run() == FALSE):
      if(validation_errors()):
        set_msg(validation_errors(), 'danger');
      endif;
    else:
      # code...
      $post = $this->input->post();

      // pergar os codigos de curso e periodo
      $cods = $this->turmas_model->select_id($post['id_turma']);
      $post['codper'] = $cods->codper;
      $post['codcur'] = $cods->codcur;

      if($this->equipes_model->insert($post)):
        set_msg('Equipe Cadastrada com Sucesso.', 'success');
        redirect('equipes/listar');
      else:
        set_msg('Falha ao cadastrar', 'danger');
      endif;
      /**/
    endif;
    /**/
    $data['modalidades'] = $this->modalidades_model->select();
   
    $data['turmas'] = $this->turmas_model->select();
    $data['generos'] = $this->generos_model->select();

    $data['titulo'] = 'Cadastro da Equipe';
    $data['page'] = 'equipes/equipes_form';
    $data['action'] = 'equipes/cadastrar';
    $data['btn_value'] = 'CADASTRAR';

    $this->load->view('load', $data, FALSE);

  }

     
  public function editar($id_equipe=null)
  {
    verifica_admin_coordenador();
    $data['equipe'] = $this->equipes_model->select_id($id_equipe);
    if(!$data['equipe'] || !$id_equipe)redirect('equipes/listar');
    $this->form_validation->set_rules('nome_equipe', 'NOME EQUIPE', 'trim|strclear|strtoupper|required');
    $this->form_validation->set_rules('id_modalidade', 'MODALIDADE', 'trim|required');

    if($this->form_validation->run() == FALSE):
      if(validation_errors()):
        set_msg(validation_errors(), 'danger');
      endif;
    else:
      # code...
      $post = $this->input->post();
      $cods = $this->turmas_model->select_id($post['id_turma']);
      $post['codper'] = $cods->codper;
      $post['codcur'] = $cods->codcur;

      if($this->equipes_model->update($id_equipe, $post)):
        set_msg('Atualizado com Sucesso.', 'success');
        redirect('equipes/listar/');
      else:
        set_msg('Falha ao cadastrar', 'danger');
      endif;
    endif;
    
    $data['modalidades'] = $this->modalidades_model->select();
    $data['turmas'] = $this->turmas_model->select();
    $data['generos'] = $this->generos_model->select();



    $data['titulo'] = 'Editar Equipe '.$data['equipe']->nome_equipe;
    $data['page'] = 'equipes/equipes_form';
    $data['action'] = 'equipes/editar/'.$id_equipe;
    $data['btn_value'] = 'ATUALIZAR';

    $this->load->view('load', $data, FALSE);


  }

}

/* End of file Alunos.php */
/* Location: ./application/controllers/Alunos.php */ ?>
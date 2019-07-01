<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Integracoes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('integracoes_model', 'jogos_model', 'modalidades_model','equipes_model'));
	    verifica_login();
    //$this->output->enable_profiler(TRUE);

  	}

   	public function index(){


  	}
	public function adicionar($id_jogo=0){
    
		if($post = $this->input->post()):
	    
	      $dados = array(
	        'id_jogo'=> $post['id_jogo'],
	        'id_equipe'=> $post['id_equipe']
	      );
	 
	      if($this->integracoes_model->jogos_equipes_insert($dados)):
	        echo "success";
	      else:
	        echo "falha ao cadastrar";
	      endif;
	    else:
	      $data['jogos_equipes'] = $this->integracoes_model->jogos_equipes($id_jogo);
	      $data['jogos_no_equipes'] = $this->integracoes_model->jogos_no_equipes($id_jogo);

	      $data['titulo'] = 'Adicionar Equipes ao Jogo';
	      $data['id_jogo'] = $id_jogo;
	      $data['page'] = 'integracoes/integracoes_listar';
	      $this->load->view('load', $data, FALSE);
	    /**/
	    endif;


  	}

  	public function deletar(){
   		if($post = $this->input->post()):
    
	      	$dados = array(
	        	'id_jogo'=> $post['id_jogo'],
	       		'id_equipe'=> $post['id_equipe']
	      	);
	      
		    if($this->integracoes_model->delete($dados)):
		       echo "success";
		    else:
		       echo "error";
		    endif;
		    
    	endif;

   
 	}
  
	public function teste($id_jogo=0){
	    
	    $dados = array(
	        'jogos_id'=> 1,
	        'equipes_id'=> 1 
	    );
	      /**/

	    
	    if($this->integracoes_model->deletar($dados)):
	      echo "success";
	    else:
	      echo "falha ao deletar";
	    endif;
	  }

	}

/* End of file Integracoes.php */
/* Location: ./application/controllers/Integracoes.php */
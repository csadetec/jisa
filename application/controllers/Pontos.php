<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pontos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('pontos_model','pontos_change_model', 'turmas_model'));
    	$this->load->library(array('table','form_validation'));
   
    	verifica_login();
    	verifica_admin_coordenador();
  // 		$this->output->enable_profiler(TRUE);

  	}

	public function index(){


	}

	public function listar_(){
		$data['turmas'] = $this->pontos_model->select_pontos_turmas_();

		$data['equipes'] = null;
		$data['titulo'] = 'PONTOS | TURMAS';

		$data['page'] = 'pontos/pontos_listar';
		$this->load->view('load', $data, FALSE);

	}

	public function listar($buscar=null){



		$pontos[] = $this->pontos_model->select_pontos_id_equipe_1();
		$pontos[] = $this->pontos_model->select_pontos_id_equipe_2();
		$pontos[] = $this->pontos_model->select_pontos_id_equipe_3();
		$pontos[] = $this->pontos_model->select_pontos_id_equipe_4();
		$pontos[] = $this->pontos_model->select_pontos_id_equipe_5();

		/*

		echo '<pre>';
		print_r($this->turmas_model->select());
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
		/*
		echo '<pre>';
		echo '<br>';
		print_r($data['turmas']);
		echo '</pre>';
		*/
		$data['equipes'] = null;
		$data['titulo'] = 'PONTOS | TURMAS';
		endif;
	
		$data['page'] = 'pontos/pontos_listar';
		$this->load->view('load', $data, FALSE);

		


	}

	public function cadastrar($dados=null){
		echo '<br>';
		print_r($dados);
		echo '</br>';
	}


  
	public function editar($id_turma=0)
	{	
		//echo 'editar pontos da turma';
	 
		$turma = $this->pontos_model->select_pontos_turma_id($id_turma);
		//print_r($turma);
		
		if(!$turma || !$id_turma)redirect('pontos/listar');
		
		$this->form_validation->set_rules('pontos_diferenca', 'DIFERANÇA DE PONTOS', 'trim|required|integer');
			
		if ($this->form_validation->run() == FALSE):
			if(validation_errors()):
				set_msg(validation_errors(), 'danger');
			endif;
		else:
		
			$post = $this->input->post();
			$post['id_turma'] = $id_turma;
			
			/*
			echo '<pre>';
			echo '<br>';
			print_r($post);		
			echo '</pre>';
			/**/
			if($this->pontos_change_model->select_id_turma($id_turma)):
				//insert pontos_change
				if($this->pontos_change_model->update($id_turma, $post)):
					set_msg('Atualizado com Sucesso', 'success');
					redirect('pontos/listar/');
				else:
					set_msg('Falha ao Atualizar', 'danger');
				endif;
				
			else:
				//update pontos_change
				if($this->pontos_change_model->insert($post)):
					set_msg('Cadastrado com Sucesso', 'success');
					redirect('pontos/listar/');
				else:
					set_msg('Falha ao Cadastrar', 'danger');
				endif;
			/**/
			endif;
			
			
		endif;
		/**
			if($this->alunos_model->update($id, $post)):
				set_msg('Atualizado com Sucesso', 'success');
				redirect('pontos/listar/');
			else:
				set_msg('Falha ao atualizar', 'danger');
			endif;
			/**/
			$data['turma'] = $turma;
			$data['titulo'] = 'EDITAR PONTOS';
			$data['page'] = 'pontos/pontos_form';
			$data['action'] = 'pontos/editar/'.$id_turma;
			$data['btn_value'] = 'SALVAR';

			$this->load->view('load', $data, FALSE);
		/**/
	}
}

/* End of file Alunos.php */
/* Location: ./application/controllers/Alunos.php */ ?>
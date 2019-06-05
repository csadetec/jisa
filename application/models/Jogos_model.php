<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jogos_model extends CI_Model {

	private $table_jogos='jisa_jogos';
	private $table_equipes='jisa_equipes';
	private $table_locais='jisa_locais';
	private $table_modalidades = 'jisa_modalidades';
	private $table_usuarios = 'jisa_usuarios';

	public function truncate(){
		return $this->db->truncate($this->table_jogos);
	}

	public function select_equipes_por_turma(){
		$this->db->select('field1, field2');
	}

	public function select_jogos_juiz($id_juiz=0){
		$this->db->where('id_juiz', $id_juiz);
		return $this->db->get($this->table_jogos)->result();
		
		
	}
	public function select_jogos_com_juiz_dia($id_juiz=0){
		$this->db->select('j.id_jogo , j.data, j.horas_inicial,'
					.'l.nome_local, u.nome as nome_juiz, j.id_juiz, ' 
					.'pontos_final_1, pontos_final_2, pontos_final_3, pontos_final_4, pontos_final_5, j.obs,'
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_1) as nome_equipe_1, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_2) as nome_equipe_2, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_3) as nome_equipe_3, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_4) as nome_equipe_4, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_5) as nome_equipe_5');
		

		$this->db->from($this->table_jogos.' as j');
		$this->db->join($this->table_locais.' as l', 'j.id_local = l.id_local');
		$this->db->join($this->table_usuarios.' as u', 'j.id_juiz = u.id_usuario');
		$this->db->where('j.id_juiz', $id_juiz);
		$this->db->where('j.data', date('Y-m-d'));
		
		$this->db->order_by('data', 'asc');
		$this->db->order_by('horas_inicial', 'asc');
		return $this->db->get()->result();
	}
	public function select_jogos_com_juiz($id_juiz=0){
		$this->db->select('j.id_jogo , j.data, j.horas_inicial,'
					.'l.nome_local, u.nome as nome_juiz, j.id_juiz, ' 
					.'pontos_final_1, pontos_final_2, pontos_final_3, pontos_final_4, pontos_final_5, j.obs,'
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_1) as nome_equipe_1, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_2) as nome_equipe_2, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_3) as nome_equipe_3, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_4) as nome_equipe_4, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_5) as nome_equipe_5');
		

		$this->db->from($this->table_jogos.' as j');
		$this->db->join($this->table_locais.' as l', 'j.id_local = l.id_local');
		$this->db->join($this->table_usuarios.' as u', 'j.id_juiz = u.id_usuario');
		$this->db->where('j.id_juiz', $id_juiz);
		$this->db->order_by('data', 'asc');
		$this->db->order_by('horas_inicial', 'asc');
		return $this->db->get()->result();
	}

	public function select_jogos_sem_juiz(){
		$this->db->select('j.id_jogo , j.data, j.horas_inicial,'
					.'l.nome_local, ' 
					.'pontos_final_1, pontos_final_2, pontos_final_3, pontos_final_4, pontos_final_5,'
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_1) as nome_equipe_1, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_2) as nome_equipe_2, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_3) as nome_equipe_3, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_4) as nome_equipe_4, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_5) as nome_equipe_5');
		

		$this->db->from($this->table_jogos.' as j');
		$this->db->join($this->table_locais.' as l', 'j.id_local = l.id_local');
		$this->db->where('j.id_juiz', 0);
		$this->db->order_by('data', 'asc');
		$this->db->order_by('horas_inicial', 'asc');
		return $this->db->get()->result();
	}

	public function select(){
		$this->db->select('j.id_jogo , j.data, j.horas_inicial, j.obs,'
					.'l.nome_local, u.nome as nome_juiz,' 
					.'pontos_final_1, pontos_final_2, pontos_final_3, pontos_final_4, pontos_final_5,'
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_1) as nome_equipe_1, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_2) as nome_equipe_2, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_3) as nome_equipe_3, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_4) as nome_equipe_4, '
					.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_5) as nome_equipe_5');
		

		$this->db->from($this->table_jogos.' as j');
		$this->db->join($this->table_locais.' as l', 'j.id_local = l.id_local');
		$this->db->join($this->table_usuarios.' as u', 'j.id_juiz = u.id_usuario', 'left');
		$this->db->order_by('data', 'asc');
		$this->db->order_by('horas_inicial', 'asc');
		return $this->db->get()->result();
	}


	public function select_id($id_jogo=null){
		$this->db->select('j.id_jogo, j.data, j.horas_inicial, j.id_local, j.obs,  j.id_modalidade, j.id_juiz, m.nome_modalidade, m.qtd_equipes, '
			.' l.nome_local, '
			.'j.id_equipe_1, j.id_equipe_2, j.id_equipe_3, j.id_equipe_4, j.id_equipe_5,'
			.'j.pontos_equipe_1, j.pontos_equipe_2, j.pontos_equipe_3, j.pontos_equipe_4, j.pontos_equipe_5, '
			.'j.pontos_equipe_1, j.pontos_equipe_2, j.pontos_equipe_3, j.pontos_equipe_4, j.pontos_equipe_5, '
 			.'j.fair_play_1, j.fair_play_2, j.fair_play_3, j.fair_play_4, j.fair_play_5, '
 			.'j.pontos_final_1, j.pontos_final_2, j.pontos_final_3, j.pontos_final_4, j.pontos_final_5, '

			.'(select nome_equipe from '.$this->table_equipes.' where id_equipe=j.id_equipe_1) as nome_equipe_1,'
			.'(select nome_equipe from '.$this->table_equipes.' where id_equipe=j.id_equipe_2) as nome_equipe_2,'
			.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_3) as nome_equipe_3, '
			.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_4) as nome_equipe_4, '
			.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_5) as nome_equipe_5');
		$this->db->from($this->table_jogos.' as j');
		$this->db->join($this->table_locais.' as l', 'j.id_local = l.id_local');
		$this->db->join($this->table_modalidades.' as m', 'j.id_modalidade = m.id_modalidade');
		$this->db->where('j.id_jogo', $id_jogo);	

		return $this->db->get()->row();
	}

	public function jogos_por_local($id_local){
		$this->db->select('j.id_jogo , j.data, j.horas_inicial,'
			.'j.pontos_final_1, j.pontos_final_2, j.pontos_final_3, j.pontos_final_4, j.pontos_final_5, '
			.'(select nome_equipe from '.$this->table_equipes.' where id_equipe = j.id_equipe_1) as nome_equipe_1, '
			.'(select nome_equipe from '.$this->table_equipes.' where id_equipe = j.id_equipe_2) as nome_equipe_2, '
			.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_3) as nome_equipe_3, '
			.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_4) as nome_equipe_4, '
			.'(select nome_equipe from '.$this->table_equipes.' where id_equipe= j.id_equipe_5) as nome_equipe_5, '
			.'l.nome_local');
		$this->db->from($this->table_jogos.' as j');
		$this->db->join($this->table_locais.' as l', 'j.id_local = l.id_local');
		$this->db->order_by('data', 'asc');
		$this->db->order_by('horas_inicial', 'asc');;
		$this->db->where('j.id_local', $id_local);

		return $this->db->get()->result();
	}
	public function insert($dados=null){
		$this->db->insert($this->table_jogos, $dados);
		return $this->db->insert_id();
	}

	public function update($id=null, $dados=null){
		$this->db->where('id_jogo', $id);
		return $this->db->update($this->table_jogos, $dados);
	}

	
}

/* End of file Perfis_model.php */
/* Location: ./application/models/Perfis_model.php */
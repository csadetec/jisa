<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	private $table_usuarios = 'jisa_usuarios';
	private $table_perfis = 'jisa_perfis';


	public function select_juiz(){
		$this->db->select('id_usuario  as id_juiz, nome as nome_juiz');
		$this->db->from($this->table_usuarios);
		$this->db->where('id_perfil', '2');
		return $this->db->get()->result();
	}

	public function select_juiz_id($id_juiz=0){
		$this->db->select('id_usuario  as id_juiz, nome as nome_juiz');
		$this->db->from($this->table_usuarios);
		$this->db->where('id_usuario', $id_juiz);
		return $this->db->get()->row();
	}


	public function select($dados=""){


		$this->db->select('u.id_usuario, u.nome, u.usuario, u.email,  u.id_perfil, u.id_turma, p.nome_perfil');
		$this->db->from($this->table_usuarios.' as u');
		$this->db->join($this->table_perfis.' as p', 'u.id_perfil = p.id_perfil');
		$this->db->where($dados);

		return $this->db->get()->row();
	}

	public function select_all(){
		$this->db->select('u.id_usuario, u.nome, u.usuario,  p.nome_perfil');
		$this->db->from($this->table_usuarios.' as u');
		$this->db->join($this->table_perfis.'  as p', 'u.id_perfil = p.id_perfil');
		$this->db->order_by('u.nome', 'asc');
		return $this->db->get()->result();
	}

	public function insert($dados=''){
		$this->db->insert($this->table_usuarios, $dados);
		return $this->db->insert_id();
	}

	public function select_id($id=""){
		$this->db->where('id_usuario', $id);
		return $this->db->get($this->table_usuarios)->row();
	}

	public function update($id, $dados){
		$this->db->where('id_usuario', $id);
		return $this->db->update($this->table_usuarios, $dados);
	}
	

}

/* End of file Usuarios_model.php */
/* Location: ./application/models/Usuarios_model.php */
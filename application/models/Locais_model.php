<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Locais_model extends CI_Model {

	private $table_locais = 'jisa_locais';
	private $table_jogos = 'jisa_jogos';
 

	public function select_no_data_and_no_horas($data = null, $horas = null){
		$this->db->select('select id_local, nome_local,'
		.'where id_local not in (select id_local from '.$this->table_jogos.' where data = '.$data.' and horas_inicial =  '.$horas );
		$this->db->get($this->jisa_jogos)->result();
	}

	public function select(){
		$this->db->order_by('nome_local', 'asc');
		return $this->db->get($this->table_locais)->result();
	}
	
	public function select_id($id_local){
		$this->db->where('id_local', $id_local);
		return $this->db->get($this->table_locais)->row();
	}

	public function update($id_local, $dados){
		$this->db->where('id_local', $id_local);
		return $this->db->update($this->table_locais, $dados);
	}

	public function insert($dados){
		$this->db->insert($this->table_locais, $dados);
		return $this->db->insert_id();
	}

}

/* End of file Perfis_model.php */
/* Location: ./application/models/Perfis_model.php */
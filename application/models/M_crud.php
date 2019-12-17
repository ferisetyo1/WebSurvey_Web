<?php

class M_crud extends CI_Model
{
	function read($table){
		$hasil = $this->db->get($table);
		return $hasil->result();
	}

	function selectBy($table, $where){
		$this->db->where($where);
		$result = $this->db->get($table);
		return $result->result();
	}
	
	function selectOrderBy($table, $where, $order){
		$this->db->where($where);
		$this->db->order_by($order);
		$result = $this->db->get($table);
		return $result->result();
	}

    function getNumRows($table, $where){
        $this->db->where($where);
		$result = $this->db->get($table);
		return $result->num_rows();
    }
    
	function save($table, $data){
		return $this->db->insert($table, $data);
	}
	
	function saveBatch($table, $data){
		return $this->db->insert_batch($table, $data);
	}

    function saveID($table, $data){
		$result = $this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	function update($table, $where, $data){
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
	
	function updateBatch($table, $where, $data){
		$this->db->where($where);
		return $this->db->update_batch($table, $data);
	}

	function delete($table, $column, $is){
		$this->db->where($column, $is);
		return $this->db->delete($table);
	}

	// public function do_upload(){
	// 	$config['upload_path'] = './assets/images';
	// 	$config['allowed_types'] = 'gif|jpg|png';
	// 	$config['max_size'] = '1024';
	// 	$config['file_name'] = time()."_".$_FILE['foto']['name'];

	// 	$this->load->library('upload', $config);

	// 	if (!$this->upload->do_upload('foto')){
	// 		$error = array('error' => $this->upload->display_errors());
	// 	//   var_dump($error);
	// 	}else{
	// 		$data = array('upload_data' => $this->upload->data());
	// 	//   var_dump($data);
	// 	}
	// }

}
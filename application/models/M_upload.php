<?php

class M_upload extends CI_Model{
  public function tampil_data(){
		return $this->db->get('upload');
	}

  public function set_upload($data){
    return $this->db->insert('upload', $data);
}

public function update_upload($kode_barang, $data){
  $this->db->where('id', $kode_barang);
  return $this->db->update('upload', $data);
}

function hapus_data($where,$table){
  $this->db->where($where);
  $this->db->delete($table);
}

}

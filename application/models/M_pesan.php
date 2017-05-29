<?php

class M_pesan extends CI_Model{
	function tampil_data(){
		return $this->db->get('pesan');
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

  function getType(){
    $query = $this->db->get('pesan');
    return $query->result_array();
  }

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
	}

	function hapus_data($where,$table){
	$this->db->where($where);
	$this->db->delete($table);
	}


	function getTransaksi($nama){
    $this->db->select('*'); //memeilih semua field
    $this->db->from('pesan'); //memeilih tabel
    //$this->db->join('type', 'pesan.type = type.type'); //join tabel pesan field type dengan tabel type field yang punya isi sama
		$this->db->where('username', $nama);

    $query = $this->db->get(); //simpan database yang udah di get alias ambil ke query
        if ($query->num_rows() >0){ //membuat data masuk ke $data kemudian masuk lagi ke array $hasiltransaksi
            foreach ($query->result() as $data) {
                # code...
                $hasilTransaksi[] = $data;
            }
        return $hasilTransaksi; //hasil dari semua proses ada di $hasilTransaksi
        }
			}

}

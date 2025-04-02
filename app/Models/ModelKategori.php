<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    protected $table      = 'tbl_kategori'; // Pastikan sesuai dengan tabel di database
    protected $primaryKey = 'id_kategori'; // Primary key tabel
    protected $allowedFields = ['nama_kategori']; // Field yang boleh diupdate

    public function AllData()
    {
        return $this->db->table('tbl_kategori')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_kategori')->insert($data);
    }

    public function UpdateData($data)
    {
        return $this->update($data['id_kategori'], $data);
    }

    public function DeleteData($id_kategori)
    {
        return $this->db->table('tbl_kategori')->where('id_kategori', $id_kategori)->delete();
    }
    
}

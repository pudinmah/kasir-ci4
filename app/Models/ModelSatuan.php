<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSatuan extends Model
{
    protected $table      = 'tbl_satuan'; // Pastikan sesuai dengan tabel di database
    protected $primaryKey = 'id_satuan'; // Primary key tabel
    protected $allowedFields = ['nama_satuan']; // Field yang boleh diupdate

    public function AllData()
    {
        return $this->db->table('tbl_satuan')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_satuan')->insert($data);
    }

    public function UpdateData($data)
    {
        return $this->update($data['id_satuan'], $data);
    }

    public function DeleteData($id_satuan)
    {
        return $this->db->table('tbl_satuan')->where('id_satuan', $id_satuan)->delete();
    }
    
}

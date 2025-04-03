<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    protected $table      = 'tbl_setting'; // Pastikan sesuai dengan tabel di database
    protected $primaryKey = 'id'; // Primary key tabel
    protected $allowedFields = [
        'nama_toko',
        'slogan',
        'alamat',
        'no_telepon',
        'deskripsi',
    ]; // Field yang boleh diupdate

    public function DetailData()
    {
        return $this->db->table('tbl_setting')
            ->where('id', '1')
            ->get()
            ->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_setting')
            ->where('id', $data['id'])
            ->update($data);
    }
}

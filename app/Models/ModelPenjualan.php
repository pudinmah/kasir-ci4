<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenjualan extends Model
{
    protected $table            = 'tbl_jual';
    protected $primaryKey       = 'id_jual';

    //  `no_faktur`, `tgl_jual`, `jam`, `grand_total`, `dibayar`, `kembalian`, `id_kasir`

    public function NoFaktur()
    {
        $tgl = date('Y-m-d'); // Format yang cocok dengan database
        $query = $this->db->query("SELECT MAX(RIGHT(no_faktur, 4)) AS no_urut FROM tbl_jual WHERE DATE(tgl_jual) = '$tgl'");
        $hasil = $query->getRowArray();

        // Jika ada hasil, tambahkan nomor urut, jika tidak, mulai dari 0001
        $noUrut = isset($hasil['no_urut']) ? ((int) $hasil['no_urut'] + 1) : 1;
        $kd = sprintf("%04d", $noUrut); // Format angka jadi 4 digit (0001, 0002, ...)

        return date('Ymd') . $kd; // Hasil akhir: YYYYMMDD0001
    }
}

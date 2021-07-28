<?php
class MyDB {
    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'datawarga';
        $username = 'root';
        $password = '';
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }
    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM warga");
        $query -> execute();
        $data = $query->fetchALL();
        return $data;
    }
    public function add_data($no_ktp,$nama_lengkap,$alamat_lengkap,$no_hp){
        $data = $this->db->prepare('INSERT INTO warga (no_ktp,nama_lengkap,alamat_lengkap,no_hp) VALUES (?,?,?,?)');

        $data->bindParam(1, $no_ktp);
        $data->bindParam(2, $nama_lengkap);
        $data->bindParam(3, $alamat_lengkap);
        $data->bindParam(4, $no_hp);

        $data->execute();
        return $data->rowCount();
    }
    public function get_by_id($id){
        $query=$this->db->prepare("SELECT * FROM warga where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }
    public function delete($id){
        $query=$this->db->prepare("DELETE FROM warga where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->rowCount();
    }
}
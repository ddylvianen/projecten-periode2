<?php
class lessenModel{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllLessen()
    {
        $this->db->query('SELECT * FROM Les ORDER BY Tijd ASC');
        return $this->db->resultSet();
    }


    public function getLesById($id)
    {
        $this->db->query('SELECT * FROM Les WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addLes($data)
    {
        $this->db->query('INSERT INTO Les (titel, beschrijving, docent, datum, tijd, locatie) VALUES(:titel, :beschrijving, :docent, :datum, :tijd, :locatie)');
        $this->db->execute($data);

        return http_response_code(200);
    }

    public function updateLes($data)
    {
        $this->db->query('UPDATE Les SET titel = :titel, beschrijving = :beschrijving, docent = :docent, datum = :datum, tijd = :tijd, locatie = :locatie WHERE id = :id');
        $this->db->execute($data);

        return http_response_code(200);
    }

    public function deleteLes($id)
    {
        $this->db->query('DELETE FROM Les WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();

        return http_response_code(200);
    }

}
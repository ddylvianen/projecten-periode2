<?php

class lessenModel {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllLessen()
    {
        
        $this->db->query('SELECT * FROM Les ORDER BY Datum ASC, Tijd ASC');
        return $this->db->resultSet();
    }

    public function getLesById($id)
    {
        $this->db->query('SELECT * FROM Les WHERE Id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addLes($data)
    {
        $this->db->query('INSERT INTO Les (Naam, Datum, Tijd, MinAantalPersonen, MaxAantalPersonen, Beschikbaarheid, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd) VALUES(:Naam, :Datum, :Tijd, :MinAantalPersonen, :MaxAantalPersonen, :Beschikbaarheid, :IsActief, :Opmerking, :DatumAangemaakt, :DatumGewijzigd)');
        $this->db->execute($data);
        return http_response_code(200);
    }

    public function updateLes($data)
    {
        $this->db->query('UPDATE Les SET Naam = :Naam, Datum = :Datum, Tijd = :Tijd, MinAantalPersonen = :MinAantalPersonen, MaxAantalPersonen = :MaxAantalPersonen, Beschikbaarheid = :Beschikbaarheid, IsActief = :IsActief, Opmerking = :Opmerking, DatumGewijzigd = :DatumGewijzigd WHERE Id = :Id');
        $this->db->execute($data);
        return http_response_code(200);
    }

    public function deleteLes($id)
    {
        $this->db->query('DELETE FROM Les WHERE Id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        return http_response_code(200);
    }
}

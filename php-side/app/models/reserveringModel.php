<?php

Class reserveringModel{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getReserveringen(){

        // has to be ordered by date and group by date by also by week

        $sql = 'SELECT LesId, Nummer, Datum,Tijd, Reserveringstatus,opmerking FROM Reservering GROUP BY datum, tijd, nummer, LesId, Reserveringstatus, opmerking HAVING LesId = 1;';

        $this->db->query($sql);

        $result = $this->db->resultSet();
        $data = $this->group_data($result);
        return $data;
    }

    private function getWeek($date)
    {
        $date = new DateTime($date);
        return $date->format('W');
    }

    private function group_data($data)
    {
        // Group data by week and day
        // so we can display it in a table

        $week = $this->getWeek($data[0]->Datum);
        $lesdatum = $data[0]->Datum;
        $newData = [[]];

        foreach ($data as $row) {
            $date = new DateTime($row->Datum);
            $dayOfWeek = $date->format('l'); // Get the day of the week

            if (!($row->Datum == $lesdatum && $week == $date->format('W'))) {
                $lesdatum = $row->Datum;
                $week = date('W', strtotime($lesdatum));
            }

            $newData[$week][$dayOfWeek][] = $row;
        }

        return $newData;
    }

    public function getReserveringById($id){
        $this->db->query('SELECT * FROM Reservering WHERE id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }

    public function addReservering($data){
        $this->db->query('INSERT INTO Reservering (naam, email, telefoonnummer, datum, tijd, aantal_personen) VALUES(:naam, :email, :telefoonnummer, :datum, :tijd, :aantal_personen)');
        $this->db->execute($data);
        return http_response_code(200);
    }

    public function updateReservering($data){
        $this->db->query('UPDATE Reservering SET naam = :naam, email = :email, telefoonnummer = :telefoonnummer, datum = :datum, tijd = :tijd, aantal_personen = :aantal_personen WHERE id = :id');
        $this->db->execute($data);
        return http_response_code(200);
    }

    public function deleteReservering($id){
        $this->db->query('DELETE FROM Reservering WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        return http_response_code(200);
    }
}
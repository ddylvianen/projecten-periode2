<?php

class LidModel
{
    private $db;

    public function __construct()
    {
        /** Door het maken van een database instantie
         *  kunnen we de database functies gebruiken
         *  en hebben we een verbinding met de database
         */
        $this->db = new Database();
    }

    public function getAllLeden()
    {
        $sql = 'SELECT  Lid.Relatienummer
                       ,Lid.Email
                FROM Lid';

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}
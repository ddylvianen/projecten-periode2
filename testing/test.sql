SELECT Reservering.LesId, Reservering.Nummer, Reservering.Datum, Reservering.Tijd, Reservering.opmerking, WEEK(Reservering.Datum, 3) AS weeknummer, DATE_FORMAT(Reservering.Datum, "%W") AS dag, Les.Naam AS lesnaam
            FROM Reservering
            Left JOIN Les ON Reservering.LesId = Les.Id
            WHERE WEEK(Reservering.Datum, 3) = 7 
            ORDER BY Reservering.Datum, Reservering.Tijd
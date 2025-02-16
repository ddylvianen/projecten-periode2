-- Date: 2021-01-01
-- author: Dylan Vianen
-- description: Fitforfun database
-- ** startup **
DROP DATABASE IF EXISTS fitforfun;

CREATE DATABASE fitforfun;

USE fitforfun;

-- ** startup **
-- ** tabel Persoon **
CREATE TABLE
    Persoon (
        Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        Voornaam VARCHAR(50) NOT NULL,
        Tussenvoegsel VARCHAR(10) NULL,
        Achternaam VARCHAR(50) NOT NULL,
        Geboortedatum DATE NOT NULL,
        IsActief BIT NOT NULL,
        Opmerking VARCHAR(250) NULL,
        DatumAangemaakt DATETIME(6) NOT NULL,
        DatumGewijzigd DATETIME(6) NOT NULL,
        PRIMARY KEY (Id)
    ) ENGINE = InnoDB;

INSERT INTO
    Persoon (
        Voornaam,
        Tussenvoegsel,
        Achternaam,
        Geboortedatum,
        IsActief,
        Opmerking,
        DatumAangemaakt,
        DatumGewijzigd
    )
VALUES
    (
        'test1',
        'test1',
        'test1',
        '2021-01-01',
        1,
        'test1',
        '2021-01-01 12:00:00',
        '2021-01-01 12:00:00'
    ),
    (
        'test2',
        'test2',
        'test2',
        '2021-02-01',
        1,
        'test2',
        '2021-02-01 12:00:00',
        '2021-02-01 12:00:00'
    ),
    (
        'test3',
        'test3',
        'test3',
        '2021-03-01',
        1,
        'test3',
        '2021-03-01 12:00:00',
        '2021-03-01 12:00:00'
    );

-- ** tabel Persoon **
-- ** tabel Gebruiker **
CREATE TABLE
    Gebruiker (
        Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        PersoonId INT UNSIGNED NOT NULL,
        Gebruikersnaam VARCHAR(50) NOT NULL,
        Wachtwoord VARCHAR(50) NOT NULL,
        IsIngelogd BIT NOT NULL,
        Ingelogd DATE NULL,
        Uitgelogd DATE NULL,
        IsActief BIT NOT NULL,
        Opmerking VARCHAR(250) NULL,
        DatumAangemaakt DATETIME(6) NOT NULL,
        DatumGewijzigd DATETIME(6) NOT NULL,
        PRIMARY KEY (Id)
    ) ENGINE = InnoDB;

INSERT INTO
    Gebruiker (
        PersoonId,
        Gebruikersnaam,
        Wachtwoord,
        IsIngelogd,
        Ingelogd,
        Uitgelogd,
        IsActief,
        Opmerking,
        DatumAangemaakt,
        DatumGewijzigd
    )
VALUES
    (
        1,
        'test',
        'test',
        1,
        '2021-01-01 12:00:00',
        '2021-01-01 12:00:00',
        1,
        'test',
        '2021-01-01 12:00:00',
        '2021-01-01 12:00:00'
    );

-- ** tabel Gebruiker **
-- ** tabel Rol **
CREATE TABLE
    Rol (
        Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        GebruikerId INT UNSIGNED NOT NULL,
        Naam VARCHAR(50) NOT NULL,
        IsActief BIT NOT NULL,
        Opmerking VARCHAR(250) NULL,
        DatumAangemaakt DATETIME(6) NOT NULL,
        DatumGewijzigd DATETIME(6) NOT NULL,
        PRIMARY KEY (Id)
    ) ENGINE = InnoDB;

INSERT INTO
    Rol (
        GebruikerId,
        Naam,
        IsActief,
        Opmerking,
        DatumAangemaakt,
        DatumGewijzigd
    )
VALUES
    (
        1,
        'test',
        1,
        'test',
        '2021-01-01 12:00:00',
        '2021-01-01 12:00:00'
    );

-- ** tabel Rol **
-- ** tabel Medewerker **
CREATE TABLE
    Medewerker (
        Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        PersoonId INT UNSIGNED NOT NULL,
        Nummer MEDIUMINT NOT NULL,
        Medewerkersoort VARCHAR(20) NOT NULL,
        Opmerking VARCHAR(250) NULL,
        DatumAangemaakt DATETIME(6) NOT NULL,
        DatumGewijzigd DATETIME(6) NOT NULL,
        PRIMARY KEY (Id)
    ) ENGINE = InnoDB;

INSERT INTO
    Medewerker (
        PersoonId,
        Nummer,
        Medewerkersoort,
        Opmerking,
        DatumAangemaakt,
        DatumGewijzigd
    )
VALUES
    (
        1,
        1,
        'test',
        'test',
        '2021-01-01 12:00:00',
        '2021-01-01 12:00:00'
    );

-- ** tabel Medewerker **
-- ** tabel Lid **
CREATE TABLE
    Lid (
        Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        PersoonId INT UNSIGNED NOT NULL,
        Relatienummer MEDIUMINT NOT NULL,
        Modiel VARCHAR(20) NOT NULL,
        Email VARCHAR(100) NOT NULL,
        IsActief BIT NOT NULL,
        Opmerking VARCHAR(250) NULL,
        DatumAangemaakt DATETIME(6) NOT NULL,
        DatumGewijzigd DATETIME(6) NOT NULL,
        PRIMARY KEY (Id)
    ) ENGINE = InnoDB;

INSERT INTO
    Lid (
        PersoonId,
        Relatienummer,
        Modiel,
        Email,
        IsActief,
        Opmerking,
        DatumAangemaakt,
        DatumGewijzigd
    )
VALUES
    (
        1,
        1,
        'test',
        'test',
        1,
        'test',
        '2021-01-01 12:00:00',
        '2021-01-01 12:00:00'
    );

-- ** tabel Lid **
-- ** tabel Les **
CREATE TABLE
    Les (
        Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        Naam VARCHAR(50) NOT NULL,
        Datum DATE NOT NULL,
        Tijd TIME NOT NULL,
        MinAantalPersonen TINYINT NOT NULL,
        MaxAantalPersonen TINYINT NOT NULL,
        Beschikbaarheid VARCHAR(50) NOT NULL,
        IsActief BIT NOT NULL,
        Opmerking VARCHAR(250) NULL,
        DatumAangemaakt DATETIME(6) NOT NULL,
        DatumGewijzigd DATETIME(6) NOT NULL,
        PRIMARY KEY (Id)
    ) ENGINE = InnoDB;

INSERT INTO
    Les (
        Naam,
        Datum,
        Tijd,
        MinAantalPersonen,
        MaxAantalPersonen,
        Beschikbaarheid,
        IsActief,
        Opmerking,
        DatumAangemaakt,
        DatumGewijzigd
    )
VALUES
    (
        'cardiospinning',
        '2025-02-10',
        '10:00:00',
        1,
        10,
        'beschikbaar',
        1,
        'opmerking1',
        '2021-01-01 12:00:00',
        '2021-01-01 12:00:00'
    ),
    (
        'test2',
        '2025-10-02',
        '10:00:00',
        1,
        10,
        'beschikbaar',
        1,
        'opmerking2',
        '2021-02-01 12:00:00',
        '2021-02-01 12:00:00'
    ),
    (
        'test3',
        '2025-10-03',
        '12:00:00',
        1,
        10,
        'beschikbaar',
        1,
        'opmerking3',
        '2021-03-01 12:00:00',
        '2021-03-01 12:00:00'
    );

-- ** tabel Les **
-- ** tabel Reservering **
CREATE TABLE
    Reservering (
        Id INT NOT NULL AUTO_INCREMENT,
        LidId INT NOT NULL,
        LesId INT NOT NULL,
        Nummer MEDIUMINT NOT NULL,
        Datum DATE NOT NULL,
        Tijd TIME NOT NULL,
        Reserveringstatus VARCHAR(20) NOT NULL,
        IsActief BIT NOT NULL,
        Opmerking VARCHAR(250) NULL,
        DatumAangemaakt DATETIME(6) NOT NULL,
        DatumGewijzigd DATETIME(6) NOT NULL,
        PRIMARY KEY (Id)
    ) ENGINE = InnoDB;

INSERT INTO
    Reservering (
        LidId,
        LesId,
        Nummer,
        Datum,
        Tijd,
        Reserveringstatus,
        IsActief,
        Opmerking,
        DatumAangemaakt,
        DatumGewijzigd
    )
VALUES
    (
        1,
        1,
        1,
        '2025-02-10',
        '10:00:00',
        'test1',
        1,
        'test1',
        '2021-01-01 12:00:00',
        '2021-01-01 12:00:00'
    ),
    (
        1,
        1,
        1,
        '2025-02-10',
        '12:00:00',
        'test2',
        1,
        'test2',
        '2021-01-01 12:00:00',
        '2021-01-01 12:00:00'
    ), 
    (
        1,
        1,
        1,
        '2025-02-11',
        '10:00:00',
        'test3',
        1,
        'test3',
        '2021-01-01 12:00:00',
        '2021-01-01 12:00:00'
    ), 
    (
        1,
        1,
        1,
        '2025-02-12',
        '12:00:00',
        'test4',
        1,
        'test4',
        '2021-01-01 12:00:00',
        '2021-01-01 12:00:00'
    );

-- 
-- ** tabel Reservering **
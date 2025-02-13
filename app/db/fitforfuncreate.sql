-- Date: 2021-01-01
-- author: Dylan Vianen
-- description: Fitforfun database

----------------- startup ------------------

DROP DATABASE IF EXISTS fitforfun;
CREATE DATABASE fitforfun;
USE fitforfun;

----------------- startup ------------------

------------- tabel Persoon ------------------
CREATE TABLE
    Persoon(
        Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        Voornaam VARCHAR(50) NOT NULL,
        Tussenvoegsel VARCHAR(10) NULL,
        Achternaam VARCHAR(50) NOT NULL,
        Geboortedatum DATE NOT NULL,
        IsActief BIT NOT NULL,
        Opmerking VARCHAR(250) NULL,
        DatumAangemaakt DATETIME(6) NOT NULL,
        DatumGewijzigd DATETIME(6) NOT NULL
    ) ENGINE=InnoDB, pk=Id;

INSERT INTO Persoon(
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
    'test',
    'test',
    'test',
    '2021-01-01',
    1,
    'test',
    '2021-01-01 12:00:00',
    '2021-01-01 12:00:00'
)

------------- tabel Persoon ------------------

------------- tabel Gebruiker ------------------

CREATE TABLE
    Gebruiker(
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
        DatumGewijzigd DATETIME(6) NOT NULL
    ) ENGINE=InnoDB, pk=Id;

INSERT INTO Gebruiker(
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
)

------------- tabel Gebruiker ------------------


-------------  tabel Rol ------------------

CREATE TABLE
    Rol(
        Id INT UNSIGNED NOT NULL AUTO_INCREMENT, --primary key
        GebruikerId INT UNSIGNED NOT NULL, --verwijzing naar Gebruiker
        Naam VARCHAR(50) NOT NULL, --lid, medewerker en administrator 
        IsActief BIT NOT NULL,
        Opmerking VARCHAR(250) NULL,
        DatumAangemaakt DATETIME(6) NOT NULL,
        DatumGewijzigd DATETIME(6) NOT NULL
    ) ENGINE=InnoDB, pk=Id;

INSERT INTO Rol(
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
)

------------- tabel Rol ------------------


------------- tabel Medewerker ------------------

CREATE TABLE
    medewerker(
        Id INT UNSIGNED NOT NULL AUTO_INCREMENT, --primary key
        PersoonId INT UNSIGNED NOT NULL, --verwijzing naar Persoon
        Nummer MEDIUMINT NOT NULL,
        Medewerkersoort VARCHAR(20) NOT NULL,  --Manager, Beheerder en Diskmedewerker
        Opmerking VARCHAR(250) NULL,
        DatumAangemaakt DATETIME(6) NOT NULL,
        DatumGewijzigd DATETIME(6) NOT NULL
    ) ENGINE=InnoDB, pk=Id;

INSERT INTO medewerker(
    PersoonId,
    GebruikerId,
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
    'test',
    '2021-01-01 12:00:00',
    '2021-01-01 12:00:00'
)

------------- tabel Medewerker ------------------



------------- tabel Lid ------------------

CREATE TABLE
    Lid(
        Id INT UNSIGNED NOT NULL AUTO_INCREMENT, --primary key
        PersoonId INT UNSIGNED NOT NULL, --verwijzing naar Persoon
        Relatienummer MEDIUMINT NOT NULL, --uniek nummer
        Modiel VARCHAR(20) NOT NULL,
        Email VARCHAR(100) NOT NULL,
        IsActief BIT NOT NULL,
        Opmerking VARCHAR(250) NULL,
        DatumAangemaakt DATETIME(6) NOT NULL,
        DatumGewijzigd DATETIME(6) NOT NULL
    ) ENGINE=InnoDB, pk=Id;

INSERT INTO Lid(
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

------------- tabel Lid ------------------


------------- tabel Les ------------------

CREATE TABLE
    les (
        Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        Naam VARCHAR(50) NOT NULL,
        Datum DATE(6) NOT NULL,
        Tijd TIME NOT NULL,
        MinAantalPersonen TINYINT NOT NULL,
        MaxAantalPersonen TINYINT NOT NULL,
        Beschikbaarheid VARCHAR(50) NOT NULL,
        IsActief BIT NOT NULL,
        Opmerking VARCHAR(250) NULL,
        DatumAangemaakt DATETIME(6) NOT NULL,
        DatumGewijzigd DATETIME(6) NOT NULL
    ) ENGINE=InnoDB;


INSERT INTO 
    Les(
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
        'test',
        '2021-01-01',
        '12:00:00',
        1,
        10,
        'test',
        1,
        'test',
        '2021-01-01 12:00:00',
        '2021-01-01 12:00:00'
    )

-------------- tabel Les ------------------


------------- tabel Reservering ------------------
CREATE TABLE
    Reservering(
        Id INT NOT NULL AUTO_INCREMENT,
        LidId INT NOT NULL,
        LesId INT NOT NULL,
        Nummer MEDIUMINT NOT NULL,
        Datum   DATE   NOT NULL,
        Tijd TIME NOT NULL,
        Reserveringstatus VARCHAR(20) NOT NULL,
        IsActief BIT    NOT NULL,
        Opmerking VARCHAR(250)  NULL,
        DatumAangemaakt DATETIME(6) NOT NULL,
        DatumGewijzigd DATETIME(6) NOT NULL 
    ) ENGINE=InnoDB;

INSERT INTO Reservering(
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
    1,
    '2021-01-01',
    '12:00:00',
    'test',
    1,
    'test',
    '2021-01-01 12:00:00',
    '2021-01-01 12:00:00'
)

------------- tabel Reservering ------------------
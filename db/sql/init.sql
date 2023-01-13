

begin

declare @database_name = "gestion_inscription"
IF EXISTS (SELECT name FROM sys.databases WHERE name = @database_name)
BEGIN
    DROP DATABASE @database_name;
    CREATE DATABASE @gestion_inscription;
    USE @gestion_inscription;
END

end

go

CREATE TABLE dbo.users
(
    user_id INT IDENTITY(1,1) PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    tele VARCHAR(50) NOT NULL,
    pass varchar(50) NOT NULL,
    nom_role varchar(50) NOT NULL
);
go
CREATE TABLE dbo.inscriptions
(
    inscription_id INT IDENTITY(1,1) PRIMARY KEY,
    date_inscription DATE,
    nom_doc VARCHAR(50),
    status VARCHAR(50) NOT NULL,
    staff_id INT NOT NULL,
    condidat_id INT NOT NULL,
    spec VARCHAR NOT null,
    FOREIGN KEY(staff_id) REFERENCES dbo.users(user_id),
    FOREIGN KEY(condidat_id) REFERENCES dbo.users(user_id)

);
go
CREATE TABLE dbo.notifications
(
    notification_id INT IDENTITY(1,1) PRIMARY KEY,
    date_notification DATE,
    titre_notification VARCHAR(255),
    text_notification TEXT,
    staff_id INT NOT NULL,
    FOREIGN KEY(staff_id) REFERENCES dbo.users(user_id)
);
go

insert into dbo.users(nom, prenom, email, tele, pass, nom_role) values
 ('mahdi', 'boughrous', 'mahdibough@gmail.com', '0628183887', '.', 'staff'),
 ('chadia', 'kharmoudi', 'mahdibough@gmail.com', '0628183887', '.', 'staff'),
 ('ahmed', 'aboutaib', 'mahdibough@gmail.com', '0628183887', '.', 'staff'),
 ('omar', 'foo', 'omar@gmail.com', '0628183887', '.', 'condidat'),
 ('mouhssine', 'bar', 'mouhssine@gmail.com', '0628183887', '.', 'condidat'),
 ('amal', 'foobar', 'amal@gmail.com', '0628183887', '.', 'condidat'),
 ('reda', 'asap', 'reda@gmail.com', '0628183887', '.', 'condidat');
 go


 create proc dbo.updateInscriptionStatus
 @user_id int,
 @status VARCHAR(50)
 as 
 begin 
    update dbo.inscriptions
    SET status = @status
    WHERE condidat_id = @user_id;
 end
 go
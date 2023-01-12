CREATE DATABASE gestion_inscription;
go
USE gestion_inscription;
GO

CREATE TABLE roles
(
    role_id INT IDENTITY(1,1) PRIMARY KEY,
    nom_role VARCHAR(50)
);
CREATE TABLE users
(
    users_id INT IDENTITY(1,1) PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    tele VARCHAR(50) NOT NULL,
    pass varchar(50) NOT NULL,
    roleid int NOT NULL,
    FOREIGN KEY(roleid) REFERENCES dbo.roles(role_id)
);
CREATE TABLE inscriptions
(
    inscription_id INT IDENTITY(1,1) PRIMARY KEY,
    date_inscription DATE,
    nom_doc VARCHAR(50),
    status VARCHAR(50) NOT NULL,
    staff_id INT NOT NULL,
    condidat_id INT NOT NULL,
    FOREIGN KEY(staff_id) REFERENCES dbo.users(users_id),
    FOREIGN KEY(condidat_id) REFERENCES dbo.users(users_id)

);
CREATE TABLE notifications
(
    notification_id INT IDENTITY(1,1) PRIMARY KEY,
    date_notification DATE,
    titre_notification VARCHAR(255),
    text_notification TEXT,
    staff_id INT NOT NULL,
    FOREIGN KEY(staff_id) REFERENCES dbo.users(users_id)
);
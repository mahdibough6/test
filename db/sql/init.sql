

IF NOT EXISTS (SELECT 1 FROM sys.databases WHERE name = 'gestion_inscription')
BEGIN
    CREATE DATABASE gestion_inscription;
    USE gestion_inscription;
END

   
go
create proc dbo.deleteAllTables 
AS

IF OBJECT_ID('dbo.notfication', 'U') IS NOT NULL
BEGIN
    DROP TABLE dbo.notifications;
END
IF OBJECT_ID('dbo.inscriptions', 'U') IS NOT NULL
BEGIN
    DROP TABLE dbo.inscriptions;
END
BEGIN
    IF OBJECT_ID('dbo.users', 'U') IS NOT NULL
BEGIN
    DROP TABLE dbo.users;
END


end
 exec dbo.deleteAllTables;
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
    spec VARCHAR(50) NOT null,
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
    nom_doc_not VARCHAR(255),
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

-- pour modifier le status d'inscription par example encours -> phase1
-- aussi is le nouveau status est phase2 donc le condidat est admit et on va changer son role a 'doctorant'
 create proc dbo.updateInscriptionStatus
 @user_id int,
 @status VARCHAR(50)
 as 
 begin 
    update dbo.inscriptions
    SET status = @status
    WHERE condidat_id = @user_id;
    if @status= 'phase2'
    BEGIN

    update dbo.users
    SET nom_role = 'doctorant'
    WHERE user_id = @user_id;
    end
 end
 go

--retourner le staff qui a le plus petits condidats

create function dbo.getStaffHasLessCondidats()
returns int
begin 
return(
    select f.user_id from (
select top 1 AA.user_id,count(condidat_id) as cn 
from dbo.users as AA,dbo.inscriptions as AD 
where AD.staff_id = AA.user_id and nom_role='staff' 
group by AA.user_id
order by cn asc)as f);
end
go
-- retourner tout inscription encours

create function dbo.getAllInscriptions(
)
returns table
as
return
    select i.condidat_id, u.nom,u.prenom, u.email, u.tele, u.pass, i.inscription_id, i.date_inscription, i.[status], i.spec ,i.nom_doc   
    from dbo.inscriptions as i , dbo.users as u 
    where i.condidat_id = u.user_id
go

--cree une notification
create proc dbo.createNotification
@date_notification date,
@titre_notification VARCHAR(255),
@text_notification text,
@nom_doc_not VARCHAR(255),
@staff_id int
as
begin
insert into dbo.notifications(date_notification, titre_notification, text_notification, nom_doc_not, staff_id) VALUES (@date_notification, @titre_notification, @text_notification, @nom_doc_not, @staff_id);
end

go
-- pour afficher toutes les notifications 

create function dbo.getAllNotifications()
returns table
begin
    return
        select * from dbo.notifications;
    

end
go


    CREATE DATABASE gestion_inscription;
    go
    USE gestion_inscription;

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
 ('admin', 'admin', 'admin@gmail.com', '066666666', 'ffffff', 'staff'),
 ('omar', 'aatik', 'omar@gmail.com', '066666666', 'aaaaaa', 'condidat'),
 ('hmed', 'bouga', 'hmed@gmail.com', '0628183887', 'bbbbbb', 'condidat'),
 ('moha', 'agoub', 'moha@gmail.com', '0628183887', 'cccccc', 'condidat');
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
 /*


 */

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
--retourner le staff qui a le plus petits condidats
create proc dbo.getIdAdmin
as
begin 
if exists(select f.user_id from (
select top 1 AA.user_id,count(condidat_id) as cn 
from dbo.users as AA,dbo.inscriptions as AD 
where AD.staff_id = AA.user_id and nom_role='staff' 
group by AA.user_id
order by cn asc)as f)
begin
select f.user_id from (
select top 1 AA.user_id,count(condidat_id) as cn 
from dbo.users as AA,dbo.inscriptions as AD 
where AD.staff_id = AA.user_id and nom_role='staff' 
group by AA.user_id
order by cn asc)as f
end
else 
select top 1 AA.user_id  from dbo.users as AA where nom_role='staff'
end
go
---precuder qui return le nombre de document exist 
create proc dbo.setDocument(@Doc varchar(50))
as
begin
select count(*) from dbo.inscriptions where nom_doc=@Doc 
end
go
--- insertion du document
create proc insertDocument(@dat varchar(20),@documen varchar(20),@spc varchar(20),@idadmin int ,@id int)
as
insert into dbo.inscriptions(date_inscription,nom_doc,spec,status,staff_id,condidat_id)
     values(@dat,@documen,@spc,'encours',@idadmin,@id)
go
--retun numbre users
create proc dbo.nbrusers(@email varchar(20),@mot varchar(20))
as
select count(*) from dbo.users where email=@email and pass=@mot
go
---return users 
CREATE PROC dbo.selectUsers(
    @email varchar(20),
    @mot varchar(20)
)
AS
    SELECT * FROM dbo.users WHERE email=@email AND pass=@mot
GO
--return nombre d'email exist
CREATE PROC getNbEmail(
    @email varchar(20)
)
AS
BEGIN
    SELECT count(*) FROM dbo.users WHERE email=@email
END
GO
/*

pour verifier le nomvre dun email exist dans la base de donnees , cette procedure est utiliser pour inderdire l'utilisateur de s'incrire avec un email deja utiliser

*/
--insert  users
create proc setNewUsres(
    @nom varchar(20),
    @prenom varchar(20),
    @tel varchar(20),
    @email varchar(20),
    @mot varchar(20)
)
as
insert into dbo.users(nom,prenom,tele,email,pass,nom_role)
     values(@nom,@prenom,@tel,@email,@mot,'candidat');
go
/*
num:1

cette procedure permet de creer un utilisateur de type candidat par defaut


*/


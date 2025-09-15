create database crud;

use crud;

create table client (
    id              int PRIMARY KEY AUTO_INCREMENT,
    nom             varchar(30) NOT NULL,
    prenom          varchar(30) NOT NULL,
    date_naissance1 date        NOT NULL,
    date_naissance2 datetime    ,
    age             int         ,
    total           decimal(5,2)
);

select * from client;

insert into client 
(prenom, nom, date_naissance1)
values 
('toto', 'titi', '2000-01-15'),('toto', 'titi', '2000-01-15');

insert into client 
(prenom, nom, age, date_naissance1, date_naissance2, id)
values 
('toto', 'titi', 12, '1980-02-20', '1970-10-25 15:30:25', 6);


delete from client where id=103;

update client 
set 
    nom='blabla', prenom='poipoi'
where id=112;


update client 
set 
    nom='blabla', prenom='poipoi'
where id=112;
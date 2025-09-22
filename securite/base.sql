drop database securite;

create database securite;

use securite;

create table client (
    id      int   PRIMARY KEY AUTO_INCREMENT,
    nom     varchar(255),
    prenom     varchar(255)
);


insert into client (nom, prenom) values ('nnn', 'ppp');

select * from client;
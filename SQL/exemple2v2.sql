select * from employe;

select * from dept;

select *
from employe
join dept on employe.nodep=dept.nodept;

select *
from employe, dept
where employe.nodep=dept.nodept;



-- 33. Rechercher le prénom des employés et le numéro de la région de leur département.
select employe.prenom, dept.noregion
from employe
join dept on employe.nodep=dept.nodept;



-- 34. Rechercher le numéro du département, le nom du département, le nom des employés classés par numéro de département (renommer les tables utilisées).
select d.nodept, d.nom
from employe as e
join dept as d on e.nodep=d.nodept
order by 1;


-- 35. Rechercher le nom des employés du département Distribution.
select e.nom, d.nom
from employe e
join dept d on e.nodep=d.nodept
where d.nom='distribution';



-- 36. Rechercher le nom et le salaire des employés qui gagnent plus que leur patron, et le nom et le salaire de leur patron.
select employe.prenom as 'subordonné', employe.salaire,  chef.prenom as 'chef', chef.salaire
from employe
join employe chef on employe.nosup=chef.noemp
where employe.salaire>chef.salaire;


-- 37. Rechercher le nom et le titre des employés qui ont le même titre que Amartakaldire.

select * 
from employe 
where titre= (
    select titre 
    from employe 
    where nom='amartakaldire'
);


-- 38. Rechercher le nom, le salaire et le numéro de département des employés qui gagnent plus qu'un seul employé du département 31, classés par numéro de département et salaire.
select * from employe where salaire > ANY (
    select salaire from employe where nodep=31
);


-- 39. Rechercher le nom, le salaire et le numéro de département des employés qui gagnent plus que tous les employés du département 31, classés par numéro de département et salaire.
select * from employe where salaire > ALL (
    select salaire from employe where nodep=31
);


-- 40. Rechercher le nom et le titre des employés du service 31 qui ont un titre que l'on trouve dans le département 32.

select * from employe where titre IN (
    select titre from employe where nodep=32
);



-- 41. Rechercher le nom et le titre des employés du service 31 qui ont un titre l'on ne trouve pas dans le département 32.
select * from employe where titre NOT IN (
    select titre from employe where nodep=32
);


-- 43. Rechercher le numéro de département, le nom du département, le nom des employés, en affichant aussi les départements dans lesquels il n'y a personne, classés par numéro de département
select * from dept LEFT join employe on employe.nodep=dept.nodept;




select MAX(salaire) from employe;


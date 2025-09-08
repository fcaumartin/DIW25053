select * from employe;

select * from dept;

select *
from employe
join dept on dept.nodept=employe.nodep;




select *
from employe, dept where dept.nodept=employe.nodep;



-- 33. Rechercher le prénom des employés et le numéro de la région de leur département.
select e.prenom, d.noregion, e.nom, d.nom
from employe e
join dept d on e.nodep=d.nodept;


-- 35. Rechercher le nom des employés du département Distribution.
select e.nom
from employe e
join dept d on e.nodep=d.nodept
where d.nom='distribution';





select salarie.prenom, chef.prenom as 'chef'
from employe chef
join employe salarie on salarie.nosup=chef.noemp;


-- 36. Rechercher le nom et le salaire des employés qui gagnent plus que leur patron, et le nom et le salaire de leur patron.

select nmoinsun.prenom, nmoinsun.salaire, patron.prenom, patron.salaire
from employe patron
join employe nmoinsun on patron.noemp=nmoinsun.nosup
where nmoinsun.salaire>patron.salaire;
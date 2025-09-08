-- Afficher toutes les informations concernant les employés 
select * 
from employe;

-- Afficher toutes les informations concernant les départements.
select *
from dept;


-- Afficher le nom, la date d'embauche, le numéro du supérieur, le numéro de département et le salaire de tous les employés
select nom, dateemb, nosup, nodep, salaire
from employe;


select nom, dateemb 'Date d''embauche', nosup as 'Numéro du supèrieur', nodep, salaire
from employe;


-- 4. Afficher le titre de tous les employés
select titre from employe;

-- 5. Afficher les différentes valeurs des titres des employés
select distinct titre from employe;




-- 6. Afficher le nom, le numéro d'employé et le numéro du département des employés dont le titre est « Secrétaire »
select nom, noemp, nodep, titre
from employe
where titre='secrétaire';

-- 7. Afficher le nom et le numéro de département dont le numéro de département est supérieur à 40.
select nom, nodep
from employe
where nodep > 40;


-- 8. Afficher le nom et le prénom des employés dont le nom est alphabétiquement antérieur au prénom.
select nom, prenom
from employe
where nom < prenom;

-- 9. Afficher le nom, le salaire et le numéro du département des employés dont le titre est « Représentant », le numéro de département est 35 et le salaire est supérieur à 20000

select nom, salaire, nodep, titre
from employe
where titre='representant' AND nodep=35 AND salaire>20000;

-- 10. Afficher le nom, le titre et le salaire des employés dont le titre est « Représentant » ou dont le titre est « Président ».
select nom, titre, salaire
from employe
where titre='representant' OR titre='president';
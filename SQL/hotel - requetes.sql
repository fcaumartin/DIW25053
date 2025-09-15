-- 1 - Afficher la liste des hôtels. Le résultat doit faire apparaître le nom de l’hôtel et la ville
select hot_nom, hot_ville 
from hotel;


-- 2 - Afficher la ville de résidence de Mr White Le résultat doit faire apparaître le nom, le prénom, et l'adresse du client
select cli_nom, cli_prenom, cli_ville, cli_adresse
from client
where cli_nom='white';

-- 3 - Afficher la liste des stations dont l’altitude < 1000 Le résultat doit faire apparaître le nom de la station et l'altitude
select sta_nom, sta_altitude
from station
where sta_altitude < 1000;

-- 4 - Afficher la liste des chambres ayant une capacité > 1 Le résultat doit faire apparaître le numéro de la chambre ainsi que la capacité
select cha_numero, cha_capacite
from chambre
where cha_capacite > 1;

-- 5 - Afficher les clients n’habitant pas à Londre Le résultat doit faire apparaître le nom du client et la ville
select cli_nom, cli_ville
from client
where cli_ville != 'Londre';

-- 6 - Afficher la liste des hôtels située sur la ville de Bretou et possédant une catégorie>3 Le résultat doit faire apparaître le nom de l'hôtel, ville et la catégorie
select hot_nom, hot_ville, hot_categorie
from hotel
where hot_categorie>3 AND hot_ville='bretou';



--  7 - Afficher la liste des hôtels avec leur station Le résultat doit faire apparaître le nom de la station, le nom de l’hôtel, la catégorie, la ville)

select sta_nom, hot_nom, hot_categorie, hot_ville
from station
join hotel on sta_id=hot_sta_id;








-- 8 - Afficher la liste des chambres et leur hôtel Le résultat doit faire apparaître le nom de l’hôtel, la catégorie, la ville, le numéro de la chambre)

select hot_nom, hot_categorie, hot_ville, cha_numero
from hotel
join chambre on hot_id=cha_hot_id;






-- 9 - Afficher la liste des chambres de plus d'une place dans des hôtels situés sur la ville de Bretou Le résultat doit faire apparaître le nom de l’hôtel, la catégorie, la ville, le numéro de la chambre et sa capacité)

select hot_nom, hot_categorie, hot_ville, cha_numero, cha_capacite
from hotel
join chambre on hot_id=cha_hot_id
where cha_capacite>1 AND hot_ville='bretou';







-- 10 - Afficher la liste des réservations avec le nom des clients Le résultat doit faire apparaître le nom du client, le nom de l’hôtel, la date de réservation

select cli_nom, hot_nom, res_date
from client
join reservation on cli_id=res_cli_id
join chambre on cha_id=res_cha_id
join hotel on hot_id=cha_hot_id; 









-- 11 - Afficher la liste des chambres avec le nom de l’hôtel et le nom de la station Le résultat doit faire apparaître le nom de la station, le nom de l’hôtel, le numéro de la chambre et sa capacité)

select sta_nom, hot_nom, cha_numero, cha_capacite
from station
join hotel on sta_id=hot_sta_id
join chambre on hot_id=cha_hot_id;







-- 12 - Afficher les réservations avec le nom du client et le nom de l’hôtel Le résultat doit faire apparaître le nom du client, le nom de l’hôtel, la date de début du séjour et la durée du séjour


select cli_nom, hot_nom, res_date_debut, DATEDIFF(res_date_fin, res_date_debut)
from client
join reservation on cli_id=res_cli_id
join chambre on cha_id=res_cha_id
join hotel on hot_id=cha_hot_id;

select * from reservation;





--  13 - Compter le nombre d’hôtel par station

select sta_nom as 'nom de la station', count(*) as 'nombre d''hotels'
from station
join hotel on sta_id=hot_sta_id
group by sta_nom;











-- 14 - Compter le nombre de chambre par station

select sta_nom, count(*)
from station
join hotel on sta_id=hot_sta_id
join chambre on hot_id=cha_hot_id
group by sta_nom;







-- 15 - Compter le nombre de chambre par station ayant une capacité > 1


select sta_nom, count(*)
from station
join hotel on sta_id=hot_sta_id
join chambre on hot_id=cha_hot_id
where cha_capacite>1
group by sta_nom;






-- 16 - Afficher la liste des hôtels pour lesquels Mr Squire a effectué une réservation


select distinct hot_nom, hot_ville
from client
join reservation on cli_id=res_cli_id
join chambre on cha_id=res_cha_id
join hotel on hot_id=cha_hot_id
where cli_nom='squire';










-- 17 - Afficher la durée moyenne des réservations par station


select sta_nom, AVG(DATEDIFF(res_date_fin, res_date_debut))
from reservation
join chambre on cha_id=res_cha_id
join hotel on hot_id=cha_hot_id
join station on sta_id=hot_sta_id
group by sta_nom;
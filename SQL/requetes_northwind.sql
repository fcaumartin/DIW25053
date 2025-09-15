use northwind;


-- Liste des clients français (Nom, Adresse, Ville, Code postal, Pays)
select `ContactName`, `Address`, `City`, `PostalCode`, `Country`
from `Customers` 
where `Country`='France';




-- Liste des clients français dans le département 75 (Nom, Adresse, Ville, Code postal, Pays)
select `ContactName`, `Address`, `City`, `PostalCode`, `Country`
from `Customers` 
where `Country`='France' AND SUBSTR(`PostalCode`, 1, 2) = '75';


-- Combien y a-t-il de clients français
select count(*)
from `Customers` 
where `Country`='France';








-- Liste des produits (Id, Nom, Prix unitaire, unité en stock, niveau de réapprovisionnement, abandonné)
select `ProductID`, `ProductName`, `UnitPrice`, `UnitsInStock`, `ReorderLevel`, `Discontinued`
from `Products`;




-- Liste des produits dont le stock est inférieur au niveau de réapprovisionnement
select `ProductID`, `ProductName`, `UnitPrice`, `UnitsInStock`, `ReorderLevel`, `Discontinued`
from `Products`
where `UnitsInStock`<`ReorderLevel`;

-- Liste des produits abandonnés
select `ProductID`, `ProductName`, `UnitPrice`, `UnitsInStock`, `ReorderLevel`, `Discontinued`
from `Products`
where `Discontinued`=1;




-- Quels sont les produits vendus par le fournisseur "Exotic Liquids"
select *
from `Products` pro
join `Suppliers` s on pro.`SupplierID`=s.`SupplierID`
where s.`CompanyName`='Exotic Liquids';






-- Pour chaque fournisseur français, afficher le nombre de produits vendus, dans l’ordre décroissant
select count(distinct p.`ProductID`)
from `OrderDetails` od
join `Products` p on od.`ProductID`=p.`ProductID`
join `Suppliers` s on s.`SupplierID`=p.`SupplierID`
where s.`Country`='france';





select * from Orders;
select * from `OrderDetails` where `OrderID`=10249;




-- Afficher la liste des clients français ayant plus de 10 commandes
select c.`ContactName`, count(*)
from `Orders` o
join `Customers` c on o.`CustomerID`=c.`CustomerID`
where c.`Country`='france'
group by c.`ContactName`
having count(*)>10;




-- Afficher la liste des clients ayant un chiffre d’affaires > 30000
select c.`ContactName`, sum(od.`UnitPrice`*od.`Quantity`)
from `Orders` o
join `OrderDetails` od on o.`OrderID`=od.`OrderID`
join `Customers` c on c.`CustomerID`=o.`CustomerID`
group by c.`ContactName`
having sum(od.`UnitPrice`*od.`Quantity`) > 30000
order by 2 desc;




select * from `OrderDetails` where `OrderID`=10248;


-- Afficher la liste des pays dont les clients ont passé commande de produits fournis par "Exotic Liquids"
select distinct c.`Country`
from `Suppliers` s
join `Products` p on s.`SupplierID`=p.`SupplierID`
join `OrderDetails` od on p.`ProductID`=od.`ProductID`
join `Orders` o on o.`OrderID`=od.`OrderID`
join `Customers` c on c.`CustomerID`=o.`CustomerID`
where s.`CompanyName`='Exotic Liquids';


-- Montant des ventes de 1997
select sum(od.`UnitPrice`*od.`Quantity`)
from `Orders` o
join `OrderDetails` od on o.`OrderID`=od.`OrderID`
where YEAR(o.`OrderDate`)=1997;






-- Montant des ventes de 1997 mois par mois
select MONTH(o.`OrderDate`), sum(od.`UnitPrice`*od.`Quantity`)
from `Orders` o
join `OrderDetails` od on o.`OrderID`=od.`OrderID`
where YEAR(o.`OrderDate`)=1997
group by MONTH(o.`OrderDate`);






-- Depuis quelle date le client "Du monde entier" n’a plus commandé ?
select MAX(o.`OrderDate`)
from `Customers` c
join `Orders` o on c.`CustomerID`=o.`CustomerID`
where c.`CompanyName`='du monde entier';




-- Quel est le délai moyen de livraison en jours
select AVG(DATEDIFF(`ShippedDate`, `OrderDate`))
from `Orders`;


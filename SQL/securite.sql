
create user frc@localhost identified by 'SuperSecret';

grant all privileges on *.* to frc@localhost ;

grant all privileges on crud.client to frc@localhost;

grant select on crud.client to frc@localhost;

flush privileges;

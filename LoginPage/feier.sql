create database weihnachtsfeier;
use weihnachtsfeier; 
alter table feier auto_increment=1;
create table feier(
Anmeldenummer int not null auto_increment start=1, 
Vorname varchar(25) not null,
Nachname varchar(25) not null,
primary key(Anmeldenummer)

);
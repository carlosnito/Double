
-- --------------------------------------------------------------------------------------------------
--		Gestion de Tickets
-- --------------------------------------------------------------------------------------------------
--		Script de creacion de Base de Datos
-- --------------------------------------------------------------------------------------------------
--		modelo BD
--		Autor: Carlos Cortes 
-- --------------------------------------------------------------------------------------------------
--		Motor: MySql
-- 		Esquema: tickets
-- 		Version Esquema: Rev:
-- 		Comentarios Esquema: 
-- 		Version Script: 
-- 		Comentarios Script: 
-- -------------------------------------------------------------------------------------------------
set names 'latin1';

-- -------------------------------------------------------------------------------------------------
--                     Creacion y Seleccion de la base de datos                                   --
-- -------------------------------------------------------------------------------------------------

-- Borrado de la base de datos (opcional)
-- -------------------------------------------------------------------------------------------------

-- drop database tickets;


--  Creacion y seleccion de la base de datos
-- -------------------------------------------------------------------------------------------------
create database if not exists tickets default character set latin1;
use tickets;

-- -------------------------------------------------------------------------------------------------
--                           Creacion del usuario de la base de datos                             --
-- -------------------------------------------------------------------------------------------------
grant all privileges on tickets.* to 'root' identified by '1q2w3e4r';
grant all privileges on tickets.* to 'root'@'localhost' identified by '1q2w3e4r';

grant process on *.* to 'root';
grant process on *.* to 'root'@'localhost';

-- -------------------------------------------------------------------------------------------------
--                                   Creacion de tablas                                           --
-- -------------------------------------------------------------------------------------------------

-- Creacion de la tabla GestionTickets
-- -------------------------------------------------------------------------------------------------
create Table if not exists `gestiontickets` (
	`GtId` integer not null auto_increment comment 'Id_Ticket',
	`GtUsuario` varchar(50) null comment 'Usuario',
	`GtEstatus` varchar(50) null comment 'Estatus',
	`GtFechaCreacion` date null comment 'Fecha Creacion',
	`GtFechaActualizacion` date null comment 'Fecha Actualizacion',
	
	primary key (`GtId`)
) engine=InnoDB default charset=latin1;


-- -------------------------------------------------------------------------------------------------
--                                   Creacion de Constraints                                      --
-- -------------------------------------------------------------------------------------------------

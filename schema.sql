drop table if exists pizza_types;
drop table if exists orders;

create table pizza_types (
  type_id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  PRIMARY KEY(type_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

create table orders (
  order_id int(11) NOT NULL AUTO_INCREMENT,
  buyer_name varchar(255) NOT NULL,
  type_name varchar(255) NOT NULL,
  spicyness varchar(255) NULL,
  date_created datetime NOT NULL,
  last_updated datetime NOT NULL,
  PRIMARY KEY(order_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

insert into pizza_types (name) values ('Pepperoni');
insert into pizza_types (name) values ('Meat');
insert into pizza_types (name) values ('Hawaiian');

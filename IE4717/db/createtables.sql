create table orders
(
	customerID int unsigned not null auto_increment primary key,
	customerName char(50) not null,
	datePurchased date,
	blackAdamQty int unsigned,
	topGunQty int unsigned,
	spiderManQty int unsigned,
	wereWolfQty int unsigned,
	totalPrice float(4,2)
);
create table movies
(	
	movieID int unsigned not null auto_increment primary key,
	movieName char(50) not null,
	price float(4, 2),
	image_PathLocation varchar(1024),
	video_PathLocation varchar(1024)
);
create table locations
(	
	locationID int unsigned not null auto_increment primary key,
	locationName varchar(1024),
	map_PathLocation varchar(1024)
);
create table timeSlots
(	
	movieID int unsigned not null auto_increment primary key,
	movieName char(50) not null,
	timeSlotsStart int unsigned not null,
	timeSlotEnd int unsigned not null
);
create table enquiries
(
	enqID int unsigned not null auto_increment primary key,
	enqName char(50),
	enqContactNo char(8),
	enqEmail char(100),
	enqType char(30),
	enqDate date,
	enqDesc text
)
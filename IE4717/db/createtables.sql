create table confirmedPurchases
(
	customerID int unsigned not null auto_increment primary key,
	customerName char(50) not null,
	customerEMAIL char(50) not null,
	datePurchased date not null,
	movieName char(50) not null,
	locationAndTime char(75) not null,
	showDate date not null,
	Seats char(80) not null,
	ticketQty int unsigned,
	totalPrice float(4,2) not null
);
create table movies
(	
	movieID int unsigned not null auto_increment primary key,
	movieName char(50) not null,
	price float(4, 2) not null,
	image_PathLocation varchar(1024) not null,
	video_PathLocation varchar(1024) not null,
	genre varchar(300) not null,
	director char(50) not null,
	movieDate date not null,
	movieLanguage char(100) not null,
	duration int not null,
	synopsis text not null
);
create table locations
(	
	locationID int unsigned not null auto_increment primary key,
	locationName varchar(1024) not null,
	map_PathLocation varchar(1024) not null
);
create table timeSlots
(	
	movieID int unsigned not null auto_increment primary key,
	movieName char(50) not null,
	locationName char(75) not null,
	timeSlotStart int unsigned not null,
	timeSlotEnd int unsigned not null
);
create table enquiries
(
	enqID int unsigned not null auto_increment primary key,
	enqName char(50) not null,
	enqContactNo char(8) not null,
	enqEmail char(100) not null,
	enqType char(30) not null,
	enqDate date not null,
	enqDesc text not null
);

create table seatings
(	
	movieName char(50) not null,
	locationAndTime char(75) not null,
	seatID char(4)
)
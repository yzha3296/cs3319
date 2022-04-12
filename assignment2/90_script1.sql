

SHOW DATABASES;
DROP DATABASE IF EXISTS 90_assign2db;
CREATE DATABASE 90_assign2db;
USE 90_assign2db;
SHOW TABLES;

CREATE TABLE bus (
    License_Plate_number CHAR(7) NOT NULL, 
    capacity VARCHAR(3), 
    PRIMARY KEY(License_Plate_number)
);

CREATE TABLE busTrip (
    trip_id INT NOT NULL, 
    trip_name VARCHAR(50),
    begin_date DATE,
    end_date DATE, 
    visit_country VARCHAR(30), 
    License_Plate_number CHAR(7), 
    PRIMARY KEY(trip_id),
    FOREIGN KEY (License_Plate_number) REFERENCES bus(License_Plate_number)
);

CREATE TABLE passenger(
    passenger_id INT NOT NULL, 
    first_name VARCHAR(20), 
    last_name VARCHAR(20), 
    PRIMARY KEY(passenger_id)
);

CREATE TABLE passport(
    passport_num CHAR(4) NOT NULL,
    citizenship VARCHAR(30),
    exp_date DATE,
    birth_date DATE,
    passenger_id INT NOT NULL,
    PRIMARY KEY(passport_num),
    FOREIGN KEY(passenger_id) 
        REFERENCES passenger(passenger_id)
        ON DELETE CASCADE
);

CREATE TABLE tripBooking(
    passenger_id INT NOT NULL,
    trip_id INT NOT NULL,
    price DECIMAL(10,2),
    FOREIGN KEY (trip_id)
        REFERENCES busTrip(trip_id),
    FOREIGN KEY (passenger_id) 
        REFERENCES passenger(passenger_id)
        ON DELETE CASCADE
);

SHOW TABLES;


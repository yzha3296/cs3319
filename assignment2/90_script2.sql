USE 90_assign2db;

SELECT * FROM bus;

LOAD DATA LOCAL INFILE 'loaddatafall2021.txt'
INTO TABLE bus FIELDS TERMINATED BY ",";

SELECT * FROM bus;

SELECT * FROM passenger;
INSERT INTO passenger (passenger_id, first_name, last_name) VALUES
(11, "Homer", "Simpson"),
(22, "Marge", "Simpson"),
(33, "Bart", "Simpson"),
(34, "Lisa", "Simpson"),
(35, "Maggie", "Simpson"),
(44, "Ned", "Flanders"),
(45, "Todd", "Flanders"),
(66, "Heidi", "Klum"),
(77, "Michael", "Scott"),
(78, "Dwight", "Schrute"),
(79, "Pam", "Beesly"),
(80, "Creed", "Bratton"),
(90, "John", "Reed");
SELECT * FROM passenger;

SELECT * FROM passport;

INSERT INTO passport (passport_num, citizenship, exp_date, birth_date, passenger_id) VALUES
("US10", "USA", '2025-1-1', '1970-2-19', 11),
("US12", "USA", '2025-1-1', '1972-8-12', 22),
("US13", "USA", '2025-1-1', '2001-5-12', 33),
("US14", "USA", '2025-1-1', '2004-3-19', 34),
("US15", "USA", '2025-1-1', '2012-9-17', 35),
("US22", "USA", '2030-4-4', '1950-6-11', 44),
("US23", "USA", '2018-3-3', '1940-6-24', 45),
("GE11", "Germany", '2027-1-1', '1970-7-12', 66),
("US88", "Canada", '2030-2-13', '1979-4-25', 77),
("US89", "Canada", '2022-2-2', '1976-4-8', 78),
("US90", "Italy", '2020-2-28', '1980-4-4', 79),
("US91", "Germany", '2030-1-1', '1959-2-2', 80),
("US99", "Canada", '2030-1-1', '1970-1-1', 90);

SELECT * FROM passport;

SELECT * FROM busTrip;

INSERT INTO busTrip (trip_id, trip_name, begin_date, end_date, visit_country, License_Plate_number) VALUES
(1, "Castles of Germany", '2022-1-1', '2022-1-17', "Germany", "VAN1111"),
(2, "Tuscany Sunsets", '2022-3-3', '2022-3-14', "Italy", "TAXI222"),
(3, "California Wines", '2022-5-5', '2022-5-10', "USA", "VAN2222"),
(4, "Beaches Galore", '2022-4-4', '2022-4-14', "Bermuda", "TAXI222"),
(5, "Cottage Country", '2022-6-1', '2022-6-22', "Canada", "CAND123"),
(6, "Arrivaderci Roma", '2022-7-5', '2022-7-15', "Italy", "TAXI111"),
(7, "Shetland and Orkney", '2022-9-9', '2022-9-29', "UK", "TAXI111"),
(8, "Disney World and Sea World", '2022-6-10', '2022-6-20', "USA", "VAN2222"),
(9, "Alpine", '2024-2-13', '2024-2-28', "Germany", "VAN1111"),
(10, "Worst Tour", '2022-2-22', '2022-3-1', "Canada", "TAXI111");

SELECT * FROM busTrip;

SELECT * FROM tripBooking;

INSERT INTO tripBooking (passenger_id, trip_id, price) VALUES
(11, 1, 500.00),
(22, 1, 500.00),
(33, 1, 200.00),
(34, 1, 200.00),
(35, 1, 200.00),
(66, 1, 600.99),
(44, 8, 400.00),
(45, 8, 200.00),
(78, 4, 600.00),
(80, 4, 600.00),
(78, 1, 550.00),
(33, 8, 300.00),
(34, 8, 300.00),
(11, 6, 600.00),
(22, 6, 600.00),
(33, 6, 100.00),
(34, 6, 100.00),
(35, 6, 100.00),
(11, 7, 300.00),
(44, 7, 400.00),
(77, 7, 500.00),
(90, 10, 1000.99);

SELECT * FROM tripBooking;

select * From passenger INNER join passport on passenger.passenger_id = passport.passenger_id;
UPDATE passport, passenger
SET passport.citizenship = "Germany"
WHERE passport.passenger_id = passenger.passenger_id 
AND passenger.first_name = "Dwight" AND passenger.last_name = "Schrute";

select * From passenger INNER join passport on passenger.passenger_id = passport.passenger_id;

SELECT * FROM busTrip;
UPDATE busTrip SET License_Plate_number = "VAN1111" WHERE visit_country = "USA";
SELECT * FROM busTrip;

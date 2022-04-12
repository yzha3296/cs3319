USE 90_assign2db;

-- Query 1
SELECT trip_name FROM busTrip WHERE visit_country = "Italy";

-- Query 2
SELECT DISTINCT last_name FROM passenger;

-- Query 3
SELECT * FROM busTrip ORDER BY trip_name;

-- Query 4
SELECT trip_name, visit_country, begin_date FROM busTrip WHERE begin_date > '2022-04-30';

-- Query 5
SELECT first_name, last_name, birth_date FROM passenger INNER JOIN passport
ON passenger.passenger_id = passport.passenger_id WHERE passport.citizenship = "USA";

-- Query 6
SELECT trip_name, capacity FROM busTrip INNER JOIN bus
ON busTrip.License_Plate_number = bus.License_Plate_number
WHERE '2022-09-01'> busTrip.begin_date AND busTrip.begin_date >= '2022-04-01';

-- Query 7
SELECT * FROM passenger INNER JOIN passport
ON passenger.passenger_id = passport.passenger_id
WHERE exp_date < CURRENT_DATE() 
OR exp_date BETWEEN CURRENT_DATE() AND DATE_ADD(CURRENT_DATE(), INTERVAL 1 YEAR);

-- Query 8
SELECT first_name, last_name, trip_name FROM tripBooking 
    INNER JOIN busTrip ON tripBooking.trip_id = busTrip.trip_id
    INNER JOIN passenger ON passenger.passenger_id = tripBooking.passenger_id
WHERE passenger.last_name LIKE "S%";

-- Query 9
SELECT COUNT(tripBooking.trip_id) AS total_passenger, busTrip.trip_name, tripBooking.trip_id 
FROM busTrip
    INNER JOIN tripBooking ON tripBooking.trip_id = busTrip.trip_id
WHERE trip_name = "Castles of Germany";

-- Query 10
SELECT SUM(price), visit_country
FROM tripBooking
    INNER JOIN busTrip ON tripBooking.trip_id = busTrip.trip_id
GROUP BY visit_country;

-- Query 11
SELECT first_name, last_name, citizenship, trip_name, visit_country
FROM tripBooking
    INNER JOIN busTrip ON tripBooking.trip_id = busTrip.trip_id
    INNER JOIN passenger ON passenger.passenger_id = tripBooking.passenger_id
    INNER JOIN passport ON passenger.passenger_id = passport.passenger_id
WHERE NOT visit_country = citizenship;

-- Query 12
SELECT trip_id, trip_name
FROM busTrip WHERE trip_id NOT IN (SELECT trip_id FROM tripBooking);

-- Query 13
CREATE VIEW totalByPassenger AS
SELECT first_name, last_name, citizenship, SUM(price) AS total
FROM tripBooking
    INNER JOIN passenger ON passenger.passenger_id = tripBooking.passenger_id
    INNER JOIN passport ON passenger.passenger_id = passport.passenger_id
GROUP BY tripBooking.passenger_id;
SELECT first_name, last_name, citizenship, MAX(total) FROM totalByPassenger;

-- Query 14

SELECT busTrip.trip_name, COUNT(tripBooking.trip_id) AS total_passenger
FROM busTrip
    INNER JOIN tripBooking ON tripBooking.trip_id = busTrip.trip_id
GROUP BY busTrip.trip_name
HAVING total_passenger < 4;

-- Query 15
CREATE VIEW passenger_num AS
SELECT busTrip.trip_id, busTrip.trip_name, COUNT(tripBooking.trip_id) AS total_passenger
FROM busTrip
    INNER JOIN tripBooking ON tripBooking.trip_id = busTrip.trip_id
GROUP BY busTrip.trip_name;

SELECT busTrip.trip_name AS 'Bus Trip Name', 
total_passenger AS 'Current Number of Passengers',
busTrip.License_Plate_number AS 'Current Bus Assigned License Plate', 
capacity AS 'Capacity of Assigned Bus'
FROM passenger_num
    INNER JOIN busTrip ON passenger_num.trip_id = busTrip.trip_id
    INNER JOIN bus ON busTrip.License_Plate_number = bus.License_Plate_number
WHERE total_passenger > capacity;


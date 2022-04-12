USE 90_assign2db;

CREATE VIEW passenger_who_take_trip AS
SELECT first_name, last_name, trip_name, visit_country, price
FROM tripBooking
    INNER JOIN passenger ON passenger.passenger_id = tripBooking.passenger_id
    INNER JOIN busTrip ON tripBooking.trip_id = busTrip.trip_id;

SELECT * FROM passenger_who_take_trip;

SELECT * FROM passenger_who_take_trip
WHERE trip_name like '%Castles%'
ORDER BY price;

SELECT * FROM bus;

DELETE FROM bus
WHERE License_Plate_number LIKE '%UWO%';

SELECT * FROM bus;

SELECT * FROM passport;
SELECT * FROM passenger;

DELETE FROM passport
WHERE citizenship = "Canada";
-- The number of rows in passenger and passport are no longer same because we didn't not include
-- foreign key in passenger table and use "ON DELETE CASCADE". there is nothing to do with passenger table
SELECT * FROM passport;
SELECT * FROM passenger;

SELECT * FROM busTrip;

DELETE FROM busTrip
WHERE trip_name = "California Wines";

SELECT * FROM busTrip;

DELETE FROM busTrip
WHERE trip_name = "Arrivaderci Roma";

-- there are passengers already spend moeny in this trip, trip id for "Arrivaderci Roma" already as 
-- a foreign key in some other tables. you cannot delete it if you did not mention "ON DELETE CASCADE" on other table

SELECT * FROM passenger;

DELETE FROM passenger
WHERE first_name = "Pam";

SELECT * FROM passenger;

SELECT * FROM passenger_who_take_trip;

DELETE FROM passenger
WHERE last_name = "Simpson";

SELECT * FROM passenger_who_take_trip;

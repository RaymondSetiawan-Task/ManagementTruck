ALTER TABLE drivers ADD COLUMN statusDriver  ENUM('Available', 'Unavailable') DEFAULT 'Available';

SELECT t.trip_id ,d.driver_id, d.name, t.trip_date
FROM drivers d
JOIN trip t ON d.driver_id = t.driver_id
WHERE d.statusDriver = 'Unavailable' AND t.trip_date = CURDATE();

SELECT d.driver_id, d.name
FROM drivers d
WHERE d.statusDriver = 'Available' 
AND d.driver_id NOT IN (
    SELECT t.driver_id
    FROM trip t
    WHERE t.trip_date = CURDATE()
);

-- Mendapatkan driver_id yang tersedia
SET @new_driver_id = (
    SELECT d.driver_id
    FROM drivers d
    WHERE d.statusDriver = 'Available'
    AND d.driver_id NOT IN (
        SELECT t.driver_id
        FROM trip t
        WHERE t.trip_date = CURDATE()
    )
    LIMIT 1
);

-- Update trip dengan driver_id yang baru
UPDATE trip
SET driver_id = @new_driver_id
WHERE trip_id = 25;  


ALTER TABLE trucks MODIFY COLUMN status ENUM('Available', 'On Trip', 'Maintenance');

SELECT t.trip_id ,tr.truck_id , tr.license_plate, t.trip_date
FROM trucks tr  
JOIN trip t ON tr.truck_id = t.truck_id
WHERE tr.status = 'Maintenance' AND t.trip_date = CURDATE();

SELECT tr.truck_id, tr.license_plate 
FROM trucks tr
WHERE tr.status = 'Available' 
AND tr.truck_id NOT IN (
    SELECT t.truck_id
    FROM trip t
    WHERE t.trip_date = CURDATE()
);

-- Mendapatkan truck_id yang tersedia
SET @new_truck_id = (
    SELECT tr.truck_id
    FROM trucks tr
    WHERE tr.status = 'Available'
    AND tr.truck_id NOT IN (
        SELECT t.truck_id
        FROM trip t
        WHERE t.trip_date = CURDATE()
    )
    LIMIT 1
);

-- Update trip dengan driver_id yang baru
UPDATE trip
SET truck_id  = @new_truck_id
WHERE trip_id = 25;  


ALTER TABLE trip ADD COLUMN  status_trip ENUM('Active', 'Cancelled', 'Valid') DEFAULT 'Active';


-- Memperbarui status_trip menjadi 'Valid' untuk trip yang sedang 'On Trip'

UPDATE trip t
JOIN trucks tr ON t.truck_id = tr.truck_id
SET t.status_trip = 'Valid'
WHERE t.status_trip = 'Active'
AND tr.status = 'On Trip';



SELECT COUNT(t.trip_id) AS Trip_Valid FROM trip t WHERE status_trip ='Valid';




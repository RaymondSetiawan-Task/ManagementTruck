SELECT d.driver_id, d.name, COUNT(t.trip_id) AS total_trips
FROM drivers d
JOIN trip t ON d.driver_id = t.driver_id
WHERE t.trip_date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
GROUP BY d.driver_id, d.name
HAVING total_trips > 5;
  

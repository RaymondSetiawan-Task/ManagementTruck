DELIMITER //
CREATE TRIGGER before_update_truck_status
BEFORE UPDATE ON trucks
FOR EACH ROW
BEGIN
    DECLARE tripCount INT;
    IF NEW.status = 'On Trip' then
    	-- Memeriksa jumlah trip yang berjalan pada hari ini
        SELECT COUNT(*) INTO tripCount 
        FROM trip
        WHERE truck_id = NEW.truck_id 
        AND trip_date = CURDATE();  
       -- Kondisi jika terdapat trip yang lebih dari 1 pada hari ini maka akan muncul pesan error
        IF tripCount > 0 THEN
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Truck is currently on another trip';
        END IF;
    END IF;
END; //
DELIMITER ;

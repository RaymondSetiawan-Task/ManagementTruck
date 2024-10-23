DROP DATABASE dbtruck

CREATE  DATABASE dbtruck

CREATE TABLE trucks (
    truck_id INT AUTO_INCREMENT PRIMARY KEY,
    license_plate VARCHAR(100) NOT NULL,
    model VARCHAR(100) NOT NULL,
    capacity DECIMAL(7,2) NOT NULL,
    exp_kir DATE NOT NULL,
    status ENUM('Available', 'On Trip') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE drivers (
    driver_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    license_number VARCHAR(50) NOT NULL,
    exp_sim DATE NOT NULL,
    experience_years INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE trip (
    trip_id INT AUTO_INCREMENT PRIMARY KEY,
    truck_id INT,
    driver_id INT,
    start_location VARCHAR(255) NOT NULL,
    end_location VARCHAR(255) NOT NULL,
    distance DECIMAL(7,2) NOT NULL,
    trip_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (truck_id) REFERENCES trucks(truck_id) ON DELETE CASCADE,
    FOREIGN KEY (driver_id) REFERENCES drivers(driver_id) ON DELETE CASCADE
);


-- Menambahkan index table Trucks
CREATE INDEX idx_truck_id ON trucks(truck_id);
CREATE INDEX idx_license_plate ON trucks(license_plate);
CREATE INDEX idx_model ON trucks(model);
CREATE INDEX idx_capacity ON trucks(capacity);
CREATE INDEX idx_exp_kir ON trucks(exp_kir);
CREATE INDEX idx_status ON trucks(status);

-- Menambah index table Drivers
CREATE INDEX idx_driver_id ON drivers(driver_id);
CREATE INDEX idx_name ON drivers(name);
CREATE INDEX idx_license_number ON drivers(license_number);
CREATE INDEX idx_exp_sim ON drivers(exp_sim);
CREATE INDEX idx_experience_years ON drivers(experience_years);

-- Menambah index table Trip
CREATE INDEX idx_trip_id ON trip(trip_id);
CREATE INDEX idx_start_location ON trip(start_location);
CREATE INDEX idx_end_location ON trip(end_location);
CREATE INDEX idx_distance ON trip(distance);
CREATE INDEX idx_trip_date ON trip(trip_date);


-- Insert Data
INSERT INTO trucks (license_plate, model, capacity, exp_kir, status, created_at) VALUES
('B 6670 CD', 'Isuzu', 60.00, '2024-11-24', 'Available', NOW()),
('B 6870 AD', 'Honda', 60.00, '2024-10-27', 'Available', NOW()),
('B 6980 BD', 'Suzuki', 60.00, '2025-01-29', 'On Trip', NOW()),
('B 7070 ED', 'Mitsubishi', 75.00, '2024-10-27', 'Available', NOW()),
('B 7170 FD', 'Toyota', 80.00, '2024-10-10', 'On Trip', NOW());


INSERT INTO drivers (name, license_number, exp_sim, experience_years, created_at) VALUES
('John Doe', 'B1234XYZ', '2024-12-25', 5, NOW()),
('Thomas', 'K6789ABC', '2025-01-14', 3, NOW()),
('Alpha', 'K6789BDS', '2024-10-31', 4, NOW()),
('Jane Smith', 'L1234XYZ', '2024-11-20', 6, NOW()),
('Bob Brown', 'M5678ABC', '2024-10-15', 2, NOW());


INSERT INTO trip (truck_id, driver_id, start_location, end_location, distance, trip_date, created_at) VALUES
    (1, 1, 'Location A', 'Location B', 120, '2024-01-01', NOW()),
    (3, 3, 'Location C', 'Location D', 100, '2024-10-27', NOW()),
    (2, 2, 'Location E', 'Location F', 200, '2024-10-24', NOW()),
    (3, 1, 'Location M', 'Location N', 210, '2024-05-15', NOW()),
    (4, 3, 'Location EE', 'Location FF', 140, '2024-10-20', NOW()),
    (2, 3, 'Location GG', 'Location HH', 130, '2024-10-22', NOW()),
    (3, 3, 'Location II', 'Location JJ', 150, '2024-10-23', NOW()),
    (5, 2, 'Location O', 'Location P', 220, '2024-10-30', NOW()),
    (3, 2, 'Location Q', 'Location R', 160, '2024-10-15', NOW()),
    (1, 2, 'Location S', 'Location T', 130, '2024-10-20', NOW()),
    (1, 3, 'Location 1', 'Location 2', 110, '2024-10-05', NOW()),
    (2, 3, 'Location 3', 'Location 4', 125, '2024-10-10', NOW()),
    (4, 1, 'Location G', 'Location H', 150, '2024-02-15', NOW()),
    (5, 1, 'Location I', 'Location J', 180, '2024-03-10', NOW()),
    (2, 1, 'Location K', 'Location L', 90, '2024-04-22', NOW()),
    (4, 5, 'Location KK', 'Location LL', 160, '2024-10-24', NOW()),
    (3, 3, 'Location 5', 'Location 6', 140, '2024-10-12', NOW()),
    (4, 3, 'Location 7', 'Location 8', 155, '2024-10-18', NOW()),
    (3, 4, 'Location Y', 'Location Z', 250, '2024-09-20', NOW()),
    (2, 4, 'Location AA', 'Location BB', 140, '2024-10-01', NOW()),
    (5, 4, 'Location CC', 'Location DD', 90, '2024-10-15', NOW()),
    (1, 2, 'Location U', 'Location V', 170, '2024-09-05', NOW()),
    (5, 2, 'Location W', 'Location X', 180, '2024-10-28', NOW()),
    (5, 3, 'Location 9', 'Location 10', 160, '2024-10-21', NOW());



-- Pencobaan Trigger
UPDATE trucks SET status = 'On Trip' WHERE truck_id = 2;

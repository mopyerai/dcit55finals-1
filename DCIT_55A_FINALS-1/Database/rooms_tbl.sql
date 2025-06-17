CREATE TABLE rooms_tbl (
    room_id INT AUTO_INCREMENT PRIMARY KEY,
    room_name VARCHAR(100),
    room_type VARCHAR(100),
    bed_info VARCHAR(100),
    view_info VARCHAR(100),
    guest_capacity INT,
    price_per_night DECIMAL(10, 2),
    availability BOOLEAN DEFAULT TRUE,
    image_path VARCHAR(255)
);
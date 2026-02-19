CREATE TABLE table_appointment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    booking_date DATE NOT NULL,
    booking_time TIME NOT NULL,
    number_of_people INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    file_upload VARCHAR(255) NOT NULL,
    app_status INT DEFAULT 1,
    gcashref_number VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
DROP TABLE IF EXISTS table_appointment;



app_status
gcashref_number

INSERT INTO table_appointment 
(name, email, contact_number, booking_date, booking_time, number_of_people, price, file_upload, app_status, gcashref_number)
VALUES
('John Doe', 'john@example.com', '09171234567', '2026-02-20', '14:00:00', 4, 1200.00, 'file1.pdf', 1, 'GC123456789'),
('Jane Smith', 'jane@example.com', '09181234567', '2026-02-21', '10:30:00', 2, 600.00, 'file2.pdf', 1, 'GC987654321'),
('Mark Johnson', 'mark@example.com', '09201234567', '2026-02-22', '16:00:00', 6, 1800.00, 'file3.pdf', 2, NULL),
('Lucy Brown', 'lucy@example.com', '09301234567', '2026-02-23', '12:00:00', 3, 900.00, 'file4.pdf', 1, 'GC112233445');

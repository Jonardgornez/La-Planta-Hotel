<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resort_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $booking_date = $_POST['booking_date'];
    $booking_time = $_POST['booking_time'];
    $number_of_people = $_POST['number_of_people'];
    $price = $_POST['price'];

    // ==========================
    // FILE UPLOAD
    // ==========================
    $target_dir = "uploads/";
    
    // Create folder if not exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_name = $_FILES["fileUpload"]["name"];
    $file_tmp = $_FILES["fileUpload"]["tmp_name"];
    $file_size = $_FILES["fileUpload"]["size"];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $allowed = array("jpg", "jpeg", "png", "pdf");

    if (!in_array($file_ext, $allowed)) {
        die("Invalid file type. Only JPG, PNG, and PDF allowed.");
    }

    // Rename file to prevent duplicate
    $new_file_name = time() . "_" . uniqid() . "." . $file_ext;
    $target_file = $target_dir . $new_file_name;

    if (!move_uploaded_file($file_tmp, $target_file)) {
        die("File upload failed.");
    }

    // ==========================
    // INSERT INTO DATABASE
    // ==========================
    $stmt = $conn->prepare("INSERT INTO table_appointment 
        (name, email, booking_date, booking_time, number_of_people, price, file_upload) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssids", 
        $name, 
        $email, 
        $booking_date, 
        $booking_time, 
        $number_of_people, 
        $price, 
        $target_file
    );

    if ($stmt->execute()) {
        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Booking Successful!',
                    text: 'Your table has been reserved successfully.',
                    confirmButtonColor: '#3cbeee'
                }).then(() => {
                    window.location.href = '../index.php';
                });
            </script>
        </body>
        </html>
        ";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Booking Failed',
                text: 'Something went wrong. Please try again.'
            }).then(() => {
                window.history.back();
            });
        </script>
        ";
    }

    $stmt->close();
}

$conn->close();
?>

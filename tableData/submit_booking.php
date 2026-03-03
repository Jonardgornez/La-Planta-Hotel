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

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $contact_number = $_POST['contact_number'] ?? '';
    $booking_date = $_POST['booking_date'] ?? '';
    $booking_time = $_POST['booking_time'] ?? '';
    $number_of_people = $_POST['number_of_people'] ?? 0;
    $price = $_POST['price'] ?? 0;

    // Payment Reference Number
    $gcashref_number = $_POST['gcashref_number'] ?? null;
    $gcashref_number = trim((string)$gcashref_number);
    if ($gcashref_number === '') {
        $gcashref_number = null;
    }

    // Force app_status to 1
    $app_status = 1;

    // ==========================
    // FILE UPLOAD
    // ==========================
    $target_dir = "uploads/";

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (!isset($_FILES["fileUpload"]) || $_FILES["fileUpload"]["error"] !== UPLOAD_ERR_OK) {
        die("File upload failed. Please try again.");
    }

    $file_name = $_FILES["fileUpload"]["name"];
    $file_tmp  = $_FILES["fileUpload"]["tmp_name"];
    $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $allowed = array("jpg", "jpeg", "png", "pdf");

    if (!in_array($file_ext, $allowed)) {
        die("Invalid file type. Only JPG, PNG, and PDF allowed.");
    }

    $new_file_name = time() . "_" . uniqid() . "." . $file_ext;
    $target_file = $target_dir . $new_file_name;

    if (!move_uploaded_file($file_tmp, $target_file)) {
        die("File upload failed.");
    }

    // ==========================
    // INSERT INTO DATABASE
    // ==========================
    $stmt = $conn->prepare("INSERT INTO table_appointment 
        (name, email, contact_number, booking_date, booking_time, number_of_people, price, file_upload, app_status, gcashref_number) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "sssssidsis",
        $name,
        $email,
        $contact_number,
        $booking_date,
        $booking_time,
        $number_of_people,
        $price,
        $target_file,
        $app_status,
        $gcashref_number
    );

    if ($stmt->execute()) {

        // ✅ NEW: get the newly inserted booking id
        $new_id = $conn->insert_id;

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
                    text: 'Opening your receipt for printing...',
                    confirmButtonColor: '#3cbeee'
                }).then(() => {

                    // ✅ NEW: open receipt PDF in a NEW TAB
                    window.open('table_receipt_pdf.php?id={$new_id}', '_blank');

                    // go back to homepage (optional)
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
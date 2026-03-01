<?php
include "main_header.php";

if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

$link = ""; // default blank iframe

if (isset($_POST['search'])) {

    // Verify CSRF Token
    if (!empty($_POST['csrftoken']) && hash_equals($_SESSION['token'], $_POST['csrftoken'])) {

        // Get inputs (uppercase + trim)
        $AUTO_NUMBER = strtoupper(trim($_POST['AUTO_NUMBER']));
        $FIRSTNAME   = strtoupper(trim($_POST['FIRSTNAME']));
        $MIDDLENAME  = strtoupper(trim($_POST['MIDDLENAME']));
        $LASTNAME    = strtoupper(trim($_POST['LASTNAME']));

        // Search record (case insensitive for names)
        $stmt = $conn->prepare("
            SELECT APP_ID, AUTO_NUMBER, FIRSTNAME, MIDDLENAME, LASTNAME
            FROM tbl_appointment
            WHERE AUTO_NUMBER=?
              AND UPPER(FIRSTNAME)=?
              AND UPPER(MIDDLENAME)=?
              AND UPPER(LASTNAME)=?
            LIMIT 1
        ");
        $stmt->bind_param('ssss', $AUTO_NUMBER, $FIRSTNAME, $MIDDLENAME, $LASTNAME);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Save APP_ID to session (PDF will use this)
            $_SESSION['admin'] = $row['APP_ID'];

            // Only load PDF if found
            $link = "main_receipt_pdf.php";

            $_SESSION['success'] = "1 result found!";
        } else {
            // IMPORTANT: keep link empty so iframe will not load "Not Found"
            $link = "";
            $_SESSION['error'] = "No record found";
        }

    } else {
        $link = "";
        $_SESSION['error'] = "Invalid request. Please refresh the page and try again.";
    }
}
?>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar sticky-top px-4 py-2 py-lg-0">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="index.php?home=home" class="navbar-brand p-0">
                <h1 class="fs-5 text-dark fw-bold">
                    <?php if($SYS_LOGO==""){ ?>
                        <img src="dist/img/Logo.png" class="brand-image img-circle" alt="Water Land Logo">
                    <?php } else { ?>
                        <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($SYS_LOGO); ?>" class="brand-image img-circle">
                    <?php } ?>
                    <?=$SYS_NAME;?>
                </h1>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="index.php?home=home" class="nav-item nav-link active">Home</a>
                    <a href="index.php?#about" class="nav-item nav-link">About</a>
                    <a href="index.php?#ourservices" class="nav-item nav-link">Service</a>
                    <a href="index.php?#cottages" class="nav-item nav-link">Rooms</a>
                    <a href="index.php?#tables" class="nav-item nav-link">Tables</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="index.php?#attractions" class="dropdown-item">Foods</a>
                            <a href="main_feedback.php?#feedback" class="dropdown-item">Feedback</a>
                        </div>
                    </div>

                    <a href="main_contact.php?#nav-item_nav-link=contact" class="nav-item nav-link">Contact</a>
                </div>

                <a href="main_receipt.php?home=home" class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0"><span class="fa fa-search"></span> My Reservation</a> &nbsp;
                <a href="book_form.php?home=home" class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0"><span class="fa fa-calendar-alt"></span> Book Now</a>
            </div>
        </nav>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">View Reservation</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php?breadcrumb-item=home">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-primary">Reservation</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="bg-light p-5 rounded h-100">
                        <h4 class="text-primary mb-4">View existing Reservation</h4>
                        <p>To view your existing appointment. Please ensure that you provide complete and accurate information.</p>

                        <form method="POST" autocomplete="off">
                            <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />

                            <div class="row g-4">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-1" name="AUTO_NUMBER" required>
                                        <label>Reference Number</label>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-1" name="FIRSTNAME" required>
                                        <label>First Name</label>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-1" name="MIDDLENAME" required>
                                        <label>Middle Name</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-1" name="LASTNAME" required>
                                        <label>Last Name</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" name="search" class="btn btn-primary w-100 py-3">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-xl-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div>
                        <div class="pb-1">
                            <h4 class="text-primary">
                                <?php
                                if (isset($_SESSION['error'])) {
                                    echo "
                                    <div id='alert' class='alert alert-danger'>
                                        <h4><i class='icon fa fa-warning'></i> ERROR!</h4>
                                        ".$_SESSION['error']."
                                    </div>
                                    ";
                                    unset($_SESSION['error']);
                                }

                                if (isset($_SESSION['success'])) {
                                    echo "
                                    <div class='alert bg-primary text-white' id='alert'>
                                        <h4><i class='icon fa fa-check'></i> FOUND!</h4>
                                        ".$_SESSION['success']."
                                    </div>
                                    ";
                                    unset($_SESSION['success']);
                                }
                                ?>
                            </h4>
                        </div>

                        <div>
                            <?php if ($link != "") { ?>
                                <iframe class="rounded w-100 embed-responsive-item"
                                    style="height: 820px;"
                                    src="<?= $link; ?>"
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    allowfullscreen="true"></iframe>
                            <?php } ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php include "main_footer.php"; ?>
<?php include "main_copyright.php"; ?>
<?php include "main_footer_script.php"; ?>
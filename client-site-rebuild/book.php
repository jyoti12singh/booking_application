<?php
include('includes/header.php');
include('db.php');

// Flag to detect success
$bookingSuccess = false;

// Form submission handling
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name         = mysqli_real_escape_string($conn, $_POST['name']);
    $email        = mysqli_real_escape_string($conn, $_POST['email']);
    $phone        = mysqli_real_escape_string($conn, $_POST['phone']);
    $travel_date  = mysqli_real_escape_string($conn, $_POST['travel_date']);
    $passengers   = mysqli_real_escape_string($conn, $_POST['passengers']);
    $pickup_point = mysqli_real_escape_string($conn, $_POST['pickup_point']);
    $package_name = mysqli_real_escape_string($conn, $_POST['package_name']);

    $insertQuery = "INSERT INTO bookings (name, email, phone, travel_date, passengers, pickup_point, package_name) 
                    VALUES ('$name', '$email', '$phone', '$travel_date', '$passengers', '$pickup_point', '$package_name')";

    if (mysqli_query($conn, $insertQuery)) {
        $bookingSuccess = true;
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<?php
$query = "SELECT * FROM book_online LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0):
    $data = mysqli_fetch_assoc($result);
?>

<div class="container booking-page" style="max-width: 800px; margin: 40px auto;">
    <h1 class="mb-4"><?= htmlspecialchars($data['title']) ?></h1>
    <p><?= nl2br(htmlspecialchars($data['description'])) ?></p>

    <h2 class="mt-4">Program Details From Chennai</h2>
    <p><?= nl2br(htmlspecialchars($data['program_details'])) ?></p>

    <h3>Chennai Boarding Points:</h3>
    <p><?= nl2br(htmlspecialchars($data['boarding_points'])) ?></p>

    <h3>Note:</h3>
    <p><?= nl2br(htmlspecialchars($data['notes'])) ?></p>

    <h3>Dress Code:</h3>
    <p><?= nl2br(htmlspecialchars($data['dress_code'])) ?></p>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger mt-4"><?= $error ?></div>
    <?php endif; ?>

    <!-- Booking Form -->
    <h3 class="mt-5">Book Now</h3>
    <form id="bookingForm" method="POST" action="" class="booking-form mt-3">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Mobile Number:</label>
            <input type="tel" name="phone" class="form-control" pattern="\d{10}" placeholder="Enter 10-digit mobile number" required>
        </div>

        <div class="form-group">
            <label for="email">Email ID:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="travel_date">Journey Date:</label>
            <input type="date" name="travel_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="package_name">Select Package:</label>
            <select name="package_name" class="form-control" required>
                <option value="">Select...</option>
                <option value="<?= htmlspecialchars($data['title']) ?>"><?= htmlspecialchars($data['title']) ?></option>
            </select>
        </div>

        <div class="form-group">
            <label for="passengers">Number of Persons:</label>
            <input type="number" name="passengers" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="pickup_point">Pickup Point:</label>
            <select name="pickup_point" class="form-control" required>
                <option value="">Select Pickup Point</option>
                <option value="Velachery">Velachery</option>
                <option value="Chrompet">Chrompet</option>
                <option value="Guindy">Guindy</option>
                <option value="T-Nagar">T-Nagar</option>
                <option value="Koyembedu">Koyembedu</option>
                <option value="Poonamallee KFC">Poonamallee KFC</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit Booking</button>
    </form>
</div>

<!-- Success Modal -->
<?php if ($bookingSuccess): ?>
<div class="modal fade show" id="successModal" tabindex="-1" role="dialog" style="display: block; background-color: rgba(0,0,0,0.5);">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title">Booking Successful</h5>
      </div>
      <div class="modal-body">
        <p>Thank you for your booking! We'll contact you shortly.</p>
      </div>
      <div class="modal-footer">
        <a href="book.php" class="btn btn-success">OK</a>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<script>
// Reset form after submission
<?php if ($bookingSuccess): ?>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("bookingForm").reset();
    });
<?php endif; ?>
</script>

<?php else: ?>
    <div class="container">
        <p>No package data found.</p>
    </div>
<?php endif; ?>

<?php include('includes/footer.php'); ?>

<?php
require 'vendor/autoload.php';

use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;

$phoneNumberUtil = PhoneNumberUtil::getInstance();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $phoneNumberString = $_POST["phone"];

    $phoneNumber = $phoneNumberUtil->parse($phoneNumberString, 'KE');

    if ($phoneNumberUtil->isValidNumber($phoneNumber)) {
        $formattedNumber = $phoneNumberUtil->format($phoneNumber, PhoneNumberFormat::INTERNATIONAL);
        echo "Formatted Phone Number: " . $formattedNumber;
    } else {
        echo 'Invalid phone number.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Giggsey Library</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Enter your Phone Number</div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

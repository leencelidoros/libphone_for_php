<?php
require 'vendor/autoload.php';

use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;

$phoneNumberUtil = PhoneNumberUtil::getInstance();

// Replace $phoneNumberString with the actual phone number you want to format.
$phoneNumberString = '0785460260'; // Kenyan phone number

$phoneNumber = $phoneNumberUtil->parse($phoneNumberString, 'KE');

if ($phoneNumberUtil->isValidNumber($phoneNumber)) {
    // Format Kenyan numbers without the '+' sign.
    $formattedNumber = $phoneNumberUtil->format($phoneNumber, PhoneNumberFormat::INTERNATIONAL);
    echo $formattedNumber;
} else {
    // Handle invalid numbers here.
    echo 'Invalid phone number.';
}

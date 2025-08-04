<?php

require_once 'vendor/autoload.php';

use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

if (! isset($_GET['text'])) {
    http_response_code(400);
    exit('Missing text parameter.');
}

$text = $_GET['text'];

// Buat QR Code
$qr = QrCode::create($text)
    ->setSize(300)
    ->setMargin(10)
    ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh); // Gunakan tingkat koreksi tinggi

$writer = new PngWriter;

// Tambahkan logo
$logoPath = __DIR__.'/logo.png';
if (file_exists($logoPath)) {
    $logo = Logo::create($logoPath)->setResizeToWidth(60); // Sesuaikan ukuran logo
    $result = $writer->write($qr, null, $logo);
} else {
    $result = $writer->write($qr);
}

header('Content-Type: image/png');
echo $result->getString();

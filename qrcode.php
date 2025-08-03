<?php
require_once 'vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

if (!isset($_GET['text'])) {
    http_response_code(400);
    exit('Missing text parameter.');
}

$text = $_GET['text'];
$qr = QrCode::create($text)->setSize(150)->setMargin(10);
$writer = new PngWriter();
$result = $writer->write($qr);

header('Content-Type: image/png');
echo $result->getString();
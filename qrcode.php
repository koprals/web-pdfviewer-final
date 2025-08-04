<?php

require_once 'vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

if (! isset($_GET['text'])) {
    http_response_code(400);
    exit('Missing text parameter.');
}

$text = $_GET['text'];

// QR Code configuration using Builder
$builder = new Builder(
    writer: new PngWriter,
    writerOptions: [],
    validateResult: false,
    data: $text,
    encoding: new Encoding('UTF-8'),
    errorCorrectionLevel: ErrorCorrectionLevel::High,
    size: 300,
    margin: 10,
    roundBlockSizeMode: RoundBlockSizeMode::Margin,
    logoPath: __DIR__.'/logo.png',
    logoResizeToWidth: 80,
    logoPunchoutBackground: true,
);

$result = $builder->build();

header('Content-Type: image/png');
echo $result->getString();
exit;

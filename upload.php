<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdf_file'])) {
    $file = $_FILES['pdf_file'];

    if ($file['type'] !== 'application/pdf') {
        die("Only PDF files are allowed.");
    }

    $uuid = bin2hex(random_bytes(16));
    $filename = $uuid . '.pdf';
    $destination = __DIR__ . '/files/' . $filename;

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        $stmt = $pdo->prepare("INSERT INTO files (uuid, filename) VALUES (?, ?)");
        $stmt->execute([$uuid, $filename]);
        header("Location: list.php");
        exit;
    } else {
        echo "<p class='error'>Failed to upload file.</p>";
    }
}
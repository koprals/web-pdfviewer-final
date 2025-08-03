<?php
require 'db.php';

$stmt = $pdo->query('SELECT * FROM files ORDER BY created_at DESC');
$files = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>List of Uploaded PDFs</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; background: #f8f8f8; }
    .top-bar { display: flex; justify-content: space-between; align-items: center; }
    .upload-btn {
      text-decoration: none;
      background-color: #28a745;
      color: white;
      padding: 10px 16px;
      border-radius: 6px;
      font-weight: bold;
    }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 12px; border-bottom: 1px solid #ccc; text-align: left; }
    th { background-color: #f0f0f0; }
    img.qr { width: 80px; height: 80px; }
  </style>
</head>
<body>
  <div class="top-bar">
    <h2>List of Uploaded PDFs</h2>
    <a href="index.php" class="upload-btn">+ Upload Baru</a>
  </div>
  <table>
    <tr>
      <th>ID</th>
      <th>Filename</th>
      <th>Link</th>
      <th>QR Code</th>
    </tr>
    <?php foreach ($files as $file) { ?>
      <?php $url = getenv('APP_URL').'/files/'.$file['filename']; ?>
      <tr>
        <td><?= htmlspecialchars($file['id']) ?></td>
        <td><?= htmlspecialchars($file['filename']) ?></td>
        <td><a href="<?= $url ?>" target="_blank">Open PDF</a></td>
        <td><img src="qrcode.php?text=<?= urlencode($url) ?>" class="qr" alt="QR Code"></td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
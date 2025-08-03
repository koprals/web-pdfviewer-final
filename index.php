<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Upload PDF</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; background: #f2f2f2; }
    .container { max-width: 500px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; }
    input[type="file"], button {
      width: 100%; padding: 12px; margin-top: 10px; font-size: 16px;
    }
    .success { color: green; }
    .error { color: red; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Upload PDF</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="pdf_file" accept="application/pdf" required>
      <button type="submit">Upload</button>
    </form>
  </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Splash Screen</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/splash.css">

  
  <style>
    body {
      height: 100vh;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f1a3bc; /* Background color */
    }

    .splash-screen {
      text-align: center;
    }

    .splash-logo {
      max-width: 250px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="splash-screen">
    <!-- Logo -->
    <img src="img/Loading.png" alt="Logo" class="splash-logo">
    <!-- Teks -->
    <p class="splash-text">Suitestyle</p>
    <script>
    // Menghubungkan ke halaman home selama 3 detik
    setTimeout(function() {
      window.location.href = "index.php"; 
    }, 3000);
  </script>
  </div>
</body>
</html>
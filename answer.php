<!DOCTYPE html>
<!-- ICS2O-Unit6-03-PHP-MDL -->
<html lang="en-ca">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="API & JSON weather app" />
  <meta name="keywords" content="mths, icd2o" />
  <meta name="author" content="Benjamin" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" />
  <link rel="stylesheet" href="./style.css" />
  <title>API & JSON weather app</title>
</head>

<body>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">API & JSON weather app</span>
      </div>
    </header>
    <main class="mdl-layout__content">
      <div class="page-content">The current weather in ottawa</div>
      <br />
      <?php
      // API URL
      $apiKey = "fe1d80e1e103cff8c6afd190cad23fa5";
      $lat = "45.4211435";
      $lon = "-75.6900574";
      $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$apiKey&units=metric";
    
      // Fetching data
      $response = file_get_contents($url);
      if ($response === FALSE) {
        echo "<p>Unable to retrieve weather data. Please try again later.</p>";
      } else {
        $data = json_decode($response, true);
    
        $temp = round($data["main"]["temp"]);
        $description = ucfirst($data["weather"][0]["description"]);
        $iconCode = $data["weather"][0]["icon"];
        $iconUrl = "https://openweathermap.org/img/wn/$iconCode@2x.png";
    
        echo "<p>Temperature: $temp °C</p>";
        echo "<p>Condition: $description</p>";
        echo "<img src='$iconUrl' alt='Weather Icon'>";
      }
    ?>
      <br />
      <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" href="./index.php">
        Go back to form
      </a>
      <br />
    </main>
  </div>
</body>

</html>
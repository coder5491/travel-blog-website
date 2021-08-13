<?php
$apiKey = "eefd17181640093941f51105f466825e";
$cityId = "1273293";
if (!empty($_POST))
{$cityId=$_POST["id"];
}




$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();

$search1= $data->weather[0]->description;
//echo $search1;

$url1="https://pixabay.com/api/?key=20743735-f3bd333808500b6a6855ac185&q=$search1&image_type=photo&pretty=true&";
$jsona=file_get_contents($url1);
$obj1=json_decode($jsona);
//var_dump(json_decode($jsona));
//echo $obj1->hits[0]->userImageURL;
?>

<!doctype html>
<html>

<head>
  <style media="screen">
    body{
        background-image :url("https://pixabay.com/get/g41cf787e690fc5f35cde465191263726d2bf8b01f6ffccc49e9c196e43a3b2825e201e6d002e30f1bda0cc88ae35910d694acdff2468db40ddb6f2dcda1aa0e2_1280.jpg");
    }
  .report-container{
    margin-top: 5%;
    margin-left: 30%;
    font-size: 20px;
    border-style:solid;
    border-radius: 5px;
    border-color: black;
    padding-left: 10px;
    background-image: url("<?php echo $obj1->hits[1]->largeImageURL; ?>");
    background-repeat: no-repeat;
    background-size: cover;
  }
  </style>
    <title>Forecast Weather using OpenWeatherMap with PHP</title>
</head>




<body>
    <div class="report-container">
        <h2><?php echo $data->name; ?></h2>
        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>°C<span
                class="min-temperature"><?php echo $data->main->temp_min; ?>°C</span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div>
</body>

</html>

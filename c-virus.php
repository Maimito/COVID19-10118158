<?php
$code = $_POST['country'];

function request($url){
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"x-rapidapi-host: covid-19-data.p.rapidapi.com",
			"x-rapidapi-key: 6f45e45d1emshf0080c75c70bd49p1493efjsndd68f5f0fbb0"
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		$result = $err;
	} else {
		$result = $response;
	}
	return $result;
}

$req = request("https://covid-19-data.p.rapidapi.com/country/code?format=json&code=$code");
$data = json_decode($req, TRUE);

$strtime = strtotime($data["0"]["lastChange"]);
$date = getDate($strtime);
?>

<html>
<head>
	<title>Coronavirus Statistic in <?php echo $data["0"]["country"] ?></title>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAH7DcbV5Z12VIi-pXvrYnHvmJS_FEPu-E&callback=initMap" async defer></script>
	<script type="text/javascript">
	function initMap() {
		var map = new google.maps.Map(document.getElementById('show_maps'), {
		  center: {lat: <?php echo $data["0"]["latitude"] ?>, lng: <?php echo $data ["0"]["longitude"] ?>},
		  zoom: 5
		});
	}
</script>
<style>
#corona {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 65%;
}

#corona td, #corona th {
  border: 1px solid #ddd;
  padding: 8px;
}

#corona tr:nth-child(even){background-color: #f2f2f2;}

#corona tr:hover {background-color: #ddd;}

#corona th {
  padding-top: 3px;
  padding-bottom: 3px;
  text-align: center;
  background-color: #2692D1;
  color: white;
}
.myButton {
		box-shadow:inset 0px 1px 0px 0px #54a3f7;
		background:linear-gradient(to bottom, #007dc1 5%, #0061a7 100%);
		background-color:#007dc1;
		border-radius:3px;
		border:1px solid #124d77;
		display:inline-block;
		cursor:pointer;
		color:#ffffff;
		font-family:Arial;
		font-size:13px;
		padding:6px 24px;
		text-decoration:none;
		text-shadow:0px 1px 0px #154682;
	}
	.myButton:hover {
		background:linear-gradient(to bottom, #0061a7 5%, #007dc1 100%);
		background-color:#0061a7;
	}
	.myButton:active {
		position:relative;
		top:1px;
	}
</style>
</head>
<body style="background-color:#f7f7f7">
	<center>
		<h1><b>Coronavirus Statistic</b></h1><br>
	<table id="corona">
		<tr>
			<th>Country</th>
			<th>Confirmed case</th>
			<th>Recovered</th>
			<th>Critical</th>
			<th>Deaths</th>
			<th>Last Update</th>			
		</tr>
		<tr>
			<td><?php echo $data["0"]["country"] ?> (<?php echo $data["0"]["code"] ?>)</td>
			<td><?php echo $data["0"]["confirmed"] ?></td>
			<td><?php echo $data["0"]["recovered"] ?></td>
			<td><?php echo $data["0"]["recovered"] ?></td>
			<td><?php echo $data["0"]["deaths"] ?></td>
			<td><?php echo $date["mday"] ?> <?php echo $date["month"] ?> <?php echo $date["year"] ?>  <?php echo $date["hours"] ?>:<?php echo $date["minutes"] ?> (GMT+7)</td>
		</tr>
	</table>
<br>
<?php echo $data["0"]["country"] ?>'s location:<br>
<div id="show_maps"  style="width:50%;height:60%;"></div>
<br><a href="index.php" class="myButton">Back to country selection</a>
</center>
<footer>
	<center>
		<p>Latest stats by country, are collected from several reliable sources.</p>
		<p><a href="https://rapidapi.com/Gramzivi/api/covid-19-data">COVID-19 data API</a> | Maps provided by Google</p>
	</center>
</footer>
</body>
</html>
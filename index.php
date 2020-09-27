<html>
<head> 
<title>Coronavirus Statistic</title>
<style>
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
	.select {
    position: relative;
    display: inline-block;
    margin-bottom: 15px;
    width: 20%;
	}    .select select {
	        font-family: 'Arial';
	        display: inline-block;
	        width: 100%;
	        cursor: pointer;
	        padding: 10px 12px;
	        outline: 0;
	        border: 0px solid #000000;
	        border-radius: 0px;
	        background: #f0f0f0;
	        color: #7b7b7b;
	        appearance: none;
	        -webkit-appearance: none;
	        -moz-appearance: none;
	    }
	        .select select::-ms-expand {
	            display: none;
	        }
	        .select select:hover,
	        .select select:focus {
	            color: #ffffff;
	            background: #000000;
	        }
	        .select select:disabled {
	            opacity: 0.5;
	            pointer-events: none;
	        }
	.select_arrow {
	    position: absolute;
	    top: 16px;
	    right: 15px;
	    width: 0px;
	    height: 0px;
	    border: solid #7b7b7b;
	    border-width: 0 3px 3px 0;
	    display: inline-block;
	    padding: 3px;
	    transform: rotate(45deg);
	    -webkit-transform: rotate(45deg);
	}
	.select select:hover ~ .select_arrow,
	.select select:focus ~ .select_arrow {
	    border-color: #ffffff;
	}
	.select select:disabled ~ .select_arrow {
	    border-top-color: #cccccc;
	}
</style>
</head>
<body style="background-color:#f7f7f7">
	<form method="post" action="c-virus.php">
		<center>
			<h1>Coronavirus Statistics</h1><br>
			<h3>Select a country</h3>
			<div class="select">
				<select name="country" id="country">
					<option value="id">Indonesia</option>
					<option value="vn">Vietnam</option>
					<option value="kh">Cambodia</option>
					<option value="th">Thailand</option>
					<option value="my">Malaysia</option>
					<option value="la">Laos</option>
					<option value="bn">Brunei Darussalam</option>
					<option value="sg">Singapore</option>
					<option value="ph">Philippines</option>
					<option value="tl">East Timor (Timor Leste)</option>
				</select>
				<div class="select_arrow"></div>
			</div>
			<input type="submit" value="Go" class="myButton"><br><br>
			More countries will be added soon
	</center>
</body>
</html>	
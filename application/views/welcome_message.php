<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1{
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 18px;
		font-weight: bold;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#header{
		text-align: center;
	}

	#item{
		text-align: left;
		padding-left: 30px;
	}

	#price{
		text-align: right;
		padding-right: 30px;
	}

	#total{
		text-align: right;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
		font-size: 15px;
		font-weight: bold;
	}


	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: center;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 20px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Invoice Number: 90210</h1>

	<div id="body">
		<h3>Date of Order: January 3, 1990</h3>
		<h4>Noni Rivera | <i>arevirinon@gmail.com</i></h4>
		<h4>88 Hilltop E. Mejia St. Bagong Ilog, Pasig City</h4>
		<hr>
		<code>Payment Method:</code>
		<p>Est tempor nostrud magna aute ut in officia officia duis consectetur cillum mollit ex id aute in irure.</p>
		<br>
		<table border="0" width="100%">
			<tr id="header">
				<td><code>Item</code></td>
				<td><code>Price</code></td>
			</tr>
			<tr>
				<td id="item">banana</td>
				<td id="price">100</td>
			</tr>
			<tr>
				<td id="item">banana</td>
				<td id="price">100</td>
			</tr>
			<tr>
				<td id="item">banana</td>
				<td id="price">100</td>
			</tr>
			<tr>
				<td colspan="2" id="total">Total: ₱ 909090</td>
			</tr>
		</table>
	</div>

	<p class="footer">abrietoCart &copy;2018</p>
</div>

</body>
</html>
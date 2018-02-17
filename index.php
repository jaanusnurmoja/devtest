<?php
require_once(__DIR__ . '/calculator.php');
$calculator = new calculator();
?>

<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<title>Calculator</title>
	<script src="calculator.js" type="text/javascript">
	</script>
</head>
<body>
	<h1>Calculate price for car insurance</h1>
	Solution by Jaanus Nurmoja. Some details:
	<ul>
	<li>Initially I made this using html and javascript only, w.o. php. </li>
	<li>Invisible div with unixtimestamp is just FYI :) Yes, I hoped to get it with javascript (got it) and make used by php but ... </li>
	<li>It seems to be outside of the scope but I TRIED to get some validations working - submission button would be enabled only when BOTH car value and tax fields have correct values inside. Thanks in advance for hints :)</li>
	</ul>
	<hr>
	<table border="1" style="border:1px solid black;width:500px;" summary="The car insurance calculator will output price of the policy">
		<caption id="caption"></caption>
		<thead style="border: 1px solid black">
			<tr>
				<th>Instalment</th>
				<th>Base premium</th>
				<th>Commission</th>
				<th style="width: 75px;">Tax</th>
				<th style="width: 75px;">Total</th>
			</tr>
		</thead>
		<tfoot id="totals"></tfoot>
		<tbody id="eachInstalment"></tbody>
	</table>
	<hr>
	<div style="display:none" id="now">
	</div>
	<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;">
		<form method="post">
			<p>Base % from car value: 11%<br>
			<span style="font-size:14px;">(Fridays at 15-20 o&rsquo;clock&nbsp;- 13%)</span><br>
			Currently: <span style="font-size:14px;" id="base"></span>%<br>
			<span style="width: 215px;">Commission added to base price:&nbsp;</span><span id="commission"><?php echo $calculator->commission; ?></span>%
			<br>
			<label for="carvalue">
			<span style="width: 215px;">Estimated value of the car: </span>&nbsp;&nbsp;
			<input id="carvalue" name="carvalue" size="6" type="text" oninput="Ranges();" value />&nbsp;&nbsp;
			<span id="cvMinMax" style="color: red;"></span>
			</label>
			<br>
			
			<label for="tax">
			<span style="width: 215px;">Tax added to base price (%)</span>
			</label>
			<input id="tax" name="tax" size="6" list="taxOpts" oninput="Ranges()" value />
			<span id="taxMsg" style="color: red"></span>
<br>
			  <datalist id="taxOpts" onchange="Ranges()" > 
				<?php echo $calculator->taxOpts();?>				
			  </datalist> 

			<label for="instalments"><span style="width: 215px;">How many instalments (1-12)</span></label> <select id="instalments" name="instalments">
				<?php echo $calculator->instOpts(); ?>				
			</select><br>
			<button id="button" onclick="calculate();return false;" style="background:#fff;" value="calculate" disabled>Let&#39;s calculate</button></p>
			<script type="text/javascript">
				var cvmin = <?php echo $calculator->cvmin;?>;
				var cvmax = <?php echo $calculator->cvmax;?>;
				fridayEvening();
			</script>
		</form>
	</div>
	<p></p>
	<hr>
	<p>Write a simple car insurance calculator which will output price of the policy using vanilla PHP and JavaScript:</p>
	1. Create HTML form with fields: 
	<ul>
	<li> Estimated value of the car (100 - 100 000 EUR) </li>
	<li> Tax percentage (0 - 100%) </li>
	<li> Number of instalments (count of payments in which client wants to pay for the policy (1 &ndash; 12)) </li>
	<li> Calculate button</li>
	</ul>
	2. Build calculator logic in PHP using OOP:
	<ul>
	<li> Base price of policy is 11% from entered car value, except every Friday 15-20 o&rsquo;clock (user time) when it is 13% </li>
	<li> Commission is added to base price (17%) </li>
	<li> Tax is added to base price (user entered) </li>
	<li> Calculate different payments separately (if number of payments are larger than 1) </li>
	<li> Installment sums must match total policy sum- pay attention to cases where sum does not divide equally </li>
	<li> Output is rounded to two decimal places</li>
	</ul>
	3. Final output (price matrix):
	<ul>
	<li> Base price </li>
	<li> Price with commission and tax (every instalment separately) </li>
	<li> Tax amount (separately with every instalment) </li>
	<li> Grand totals (sum of all instalments): Price with commission and tax, total tax sum. </li>
	<li> Example with 2 instalments:</li>
	</ul> 
	<img src="calculation_payment.png">
	<hr>

	<script type="text/javascript">
	       calculate();
	</script>
</body>
</html>
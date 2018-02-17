	function Ranges()
	{
		var cvrange = (document.getElementById("carvalue").value >= cvmin && document.getElementById("carvalue").value <= cvmax);
		var taxrange = (document.getElementById("tax").value >= 0 && document.getElementById("tax").value <= 100);

		if (cvrange && taxrange)
		{
			document.getElementById("button").disabled = false;
			document.getElementById("cvMinMax").innerHTML = "OK";
			document.getElementById("taxMsg").innerHTML = "OK";
		}
		else
		{
			document.getElementById("button").disabled = true;
			
			if (!cvrange)
			{
				document.getElementById("cvMinMax").innerHTML = " Must be between 100 and 100000!";
			}
			else
			{
				document.getElementById("cvMinMax").innerHTML = "OK";
			}
			
			if (!taxrange)
			{
				document.getElementById("taxMsg").innerHTML = " Must be between 0 and 100!";
			}
			else
			{
				document.getElementById("taxMsg").innerHTML = "OK";
			}

		}
	}


	function calculate() 
	{
	var d = new Date();
	var timestamp = parseInt(d.getTime() / 1000);
	console.log(timestamp);
	document.getElementById("now").innerHTML = timestamp;
	var f = (d.getDay() == 5 && d.getHours() >= 15 && d.getHours() < 20);
	document.getElementById("base").innerHTML = f ? 13 : 11;
	//document.getElementById("commission").value = 17;
	var base = document.getElementById("base").innerHTML;
	var commission = document.getElementById("commission").innerHTML;
	var carvalue = document.getElementById("carvalue").value;

	document.getElementById("caption").innerHTML = "<p style='text-align: left;'>Calculation for car with value of " + carvalue + "<p>";
	var tax = document.getElementById("tax").value;

	var instalments = Number(document.getElementById("instalments").value);
	console.log(instalments);
	console.log(carvalue);
	var baseTotal = base * carvalue / 100;
	console.log(baseTotal);
	var commissionTotal = commission * baseTotal / 100;
	console.log(commissionTotal);
	var taxTotal = tax * baseTotal / 100;
	console.log(taxTotal);
	var basepremium = baseTotal / instalments;
	console.log(basepremium);
	var commissionVal = commissionTotal / instalments;
	console.log(commissionVal);
	var taxValue = taxTotal / instalments;
	console.log(taxValue);
	var total = baseTotal + commissionTotal + taxTotal;
	var rowTotal = basepremium + commissionVal + taxValue;
	console.log(total);
	var totals = "<tr><td style='border-color: rgb(187, 187, 187);' text-align: center;'>Total</td><td style='border-color: rgb(187, 187, 187);'>" + baseTotal.toFixed(2) + "</td><td style='border-color: rgb(187, 187, 187);'>" + commissionTotal.toFixed(2) + "</td><td style='border-color: rgb(187, 187, 187);'>" + taxTotal.toFixed(2) + "</td><td style='border-color: rgb(187, 187, 187);'>" + total.toFixed(2) + "</td></tr>";
	document.getElementById("totals").innerHTML = totals;
	console.log(totals);
	var rows = new Array();
	for (i = 0; i < instalments; i++) {
		rows[i] = "<tr><td>Instalment " + (i + 1) + "</td><td>" + basepremium.toFixed(2) + "</td><td>" + commissionVal.toFixed(2) + "</td><td>" + taxValue.toFixed(2) + "</td><td>" + rowTotal.toFixed(2) + "</td></tr>";
	}
	console.log(rows.join('\n'));
	document.getElementById("eachInstalment").innerHTML = rows.join('\n');
}
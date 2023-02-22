<!DOCTYPE html>
<html>
	<?php session_start();?>
	<head>
		<meta charset="utf-8" />
		<title>BILL</title>
		<link rel="stylesheet" href="css/bill.css">
	</head>
	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="8">
						<table>
							<tr>
								<td class="title">
									electra <br> erp
								</td>

								<td>Invoice No.
									<b><?php if(isset($_SESSION['invno'])) echo $_SESSION['invno']; ?></b> <br />
									Created: <b><?php if(isset($_SESSION['invdate'])) echo $_SESSION['invdate']; ?></br> <br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="8">
						<table>
							<tr>
								<td>
									Sparksuite, Inc.<br />
									12345 Sunny Road<br />
									Sunnyville, CA 12345
								</td>

								<td>
									To,<br />
									<b><?php if(isset($_SESSION['cusname'])) echo $_SESSION['cusname']; ?></b>
								</td>
							</tr>
						</table>
					</td>
				</tr>


				<tr class="heading">
					<td>PID</td>
					<td>Brand</td>
					<td>Model</td>
					<td>Price</td>
					<td>Quantity</td>
					<td>Net price</td>
					<td>GST(%)</td>
					<td>M.R.P</td>
				</tr>

				<tr class="item">
					<td><?php if(isset($_SESSION['cpid'])) echo $_SESSION['cpid']; ?></td>
					<td><?php if(isset($_SESSION['cbrand'])) echo $_SESSION['cbrand']; ?></td>
					<td><?php if(isset($_SESSION['cmodel'])) echo $_SESSION['cmodel']; ?></td>
					<td><?php if(isset($_SESSION['bprice'])) echo $_SESSION['bprice']; ?></td>
					<td><?php if(isset($_SESSION['rquantity'])) echo $_SESSION['rquantity']; ?></td>
					<td><?php if(isset($_SESSION['bprice'])&&isset($_SESSION['rquantity']))
					{
						 $_SESSION['netprice']=floatval($_SESSION['rquantity']*$_SESSION['bprice']); 
						 echo $_SESSION['netprice'];
					}?></td>
					<td><?php if(isset($_SESSION['gst'])) echo $_SESSION['gst']; ?></td>
					<td><?php if(isset($_SESSION['bprice'])&&isset($_SESSION['netprice'])) {
						$_SESSION['mrp']=floatval($_SESSION['netprice']+($_SESSION['netprice']*$_SESSION['gst']*0.01));
						 echo "Rs.".$_SESSION['mrp']; }
						 ?></td>
				</tr>

				<tr class="total">
					<td colspan='7'></td>
					<td	><?php if(isset($_SESSION['mrp'])) echo "Rs.".$_SESSION['mrp']; ?></td>

				</tr>
			</table>
			<div id="divToPrint" style="display:none;">
			<div style="width:200px;height:300px;background-color:teal;">
					<?php echo $html; ?>      
			</div>
			</div>
			<div>
			<input type="button" value="print" onclick="PrintDiv();" />
			</div>
			<form action="saleshandler.php" method="post">
				<button name="printbill" type="submit">CONFIRM BILL</button>
			</form>
		</div>


		<script type="text/javascript">     
			function PrintDiv() {    
			var divToPrint = document.getElementById('divToPrint');
			var popupWin = window.open('', '_blank', 'width=300,height=300');
			popupWin.document.open();
			popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
				popupWin.document.close();
					}
		</script>

	</body>
</html>

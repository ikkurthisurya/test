<?php
if(count($_POST)>0) {
	require_once("db.php");
	$sql = "INSERT INTO users (employeename, id, address) VALUES ('" . $_POST["employeename"] . "','" . $_POST["id"] . "','" . $_POST["address"] . "')";
	mysqli_query($conn,$sql);
	$current_id = mysqli_insert_id($conn);
	if(!empty($current_id)) {
		$message = "New Employee Details are Added Successfully";
	}
}
?>
<html>
<head>
<title>Add New Employee</title>

</head>
<body><br><br>
	<div style="text-align: center;"><button><a href="index.php">Show Employees</a></button></div><br><br>
<form name="frmUser" method="post" action="">

<div class="message"><?php if(isset($message)) { echo $message; } ?></div>


<table border="2" cellpadding="10" cellspacing="0" width="600" align="center" >
<td colspan="5" align="center">Add New Employee</td>
<tr>
<td><label>Employee Name</label></td>
<td><input type="text" name="employeename" class="txtField"></td>
</tr>
<tr>
<td><label>ID</label></td>
<td><input type="number" name="id" class="txtField"></td>
</tr>
<tr>
<td><label>Address</label></td>
<td><input type="text" name="address" class="txtField"></td>
</tr>
<tr align="center">
<td colspan="2"><input type="submit" name="submit" value="Submit"></td>
</tr>
</table><br><br><br>

</div>
</form>
</body></html>
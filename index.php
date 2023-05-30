<?php
require_once("db.php");
$sql = "SELECT * FROM users ORDER BY userId DESC";
$result = mysqli_query($conn,$sql);
?>
<html>
<head>
<title>Employee Details</title>

</head>
<body>
	<h2 style="text-align: center;">Employee Details</h2><br>
<form name="frmUser" method="post" action="">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div style="text-align: center;">
	<input type="text" name="search" required value="<?php if(isset($_POST['search'])){echo $_POST['search'];} ?>" placeholder="Search Employee">
	<button type="submit">Search</button>
  <br><br><br>
</div>

<?php
 require_once("db.php");
 if (isset($_POST['search'])) {
  $filternames = $_POST['search'];
  $query = "SELECT * FROM users WHERE CONCAT(employeename) LIKE '%$filternames%' ";
  $query_run = mysqli_query($conn,$query);

  if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $items){

      ?>
      <table border="2" cellpadding="10" cellspacing="1" width="900" align="center">
        <tr>
          <td><?= $items['employeename']; ?></td>
          <td><?= $items['id']; ?></td>
          <td><?= $items['address']; ?></td>
        </tr>
        </table><br><br><br>
      <?php
    }
    }
  
  else
  {
      ?>
      <table border="2" cellpadding="10" cellspacing="1" width="900" align="center">
        <tr>
          <td>Emplyee Not Found</td>
        </tr>
      </table><br><br><br>
      <?php
  }
  }

 ?>

<table border="2" cellpadding="10" cellspacing="1" width="900" align="center">
<tr>
<td>Employee Name</td>
<td>ID</td>
<td>Address</td>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
if($i%2==0)
$classname="evenRow";
else
$classname="oddRow";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row["employeename"]; ?></td>
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["address"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table><br><br><br>
<div style="text-align: center;"><button><a href="add_user.php">Add New Employee</a></button></div>
</form>
</div>
</body>

</html>
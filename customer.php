
<? include 'answer.php';?>
<?
$s_name = $check->servername;
$u_name = $check->username;
$pass = $check->password;
$db = $check->dbname;
?>
<!DOCTYPE html>

<html>
<head>
  <title>Customers details</title>
</head>
<body>
  <h1>COSTOMER'S DETAILS</h1>
  <?php
    $s_name = $check->servername;
    $u_name = $check->username;
    $pass = $check->password;
    $db = $check->dbname;
    $con= mysqli_connect($s_name, $u_name, $pass, $db);
    
      // query statement
    $query = "SELECT * FROM `customer`";

      //connect the query to the database connection
    $result = $con->query($query);

      // check if can fetch data
      if(!$result) echo 'could not fetch data';
     
      //determin the number of rows
      $rows = $result->num_rows;
      echo '<table style=margin-left:30px border=1 cellpadding=10 cellspacing=0>
              <thead>
                <th>Customer Name</th><th>Customer email</th>
                <th>Customer gender</th><th>Customer designer</th>
                <th>Customer explanation</th>
              </thead>
              <tbody>';
              
      for($i = 0;$i< $rows;$i++){
        $result->data_seek($i);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo '<tr>
                <td>'.$row['Customer_name'].'</td> 
                <td> '. $row['Customer_contact']. ' </td>
                <td>'.$row['Customer_gender'].'</td>
                <td> '.$row['Customer_designer'].'</td>
                <td> '.$row['Customer_explanation'] . '</td>
              </tr>';
      }
      echo '</tbody></table>';
  ?>
</body>
</html>
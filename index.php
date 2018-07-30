<!DOCTYPE html>
<html>
<head>
  <title>Customers Form</title>
  <link rel="stylesheet" href="form.css">
</head>
<body>
  <?php
    class Customer{
      public $name;
      public $phone;
      public $email;
      public $gender;
      public $design;
      public $exp;
      public $nameErr;

      function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

        if ($_SERVER["REQUEST_METHOD" == "POST"]){
          $name = test_input($_POST["name"]);
          $email = test_input($POST["email"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = "Invalid email format"; 
          }
          $phone = test_input($POST["phone number"]);
          $gender = test_input($POST["gender"]);
          $design = test_input($POST["design"]);
          $exp = test_input($POST["exp"]);
        }
      }
    }
  ?>
  <div class="header">
    <h1>CUSTOMERS INTEREST FORM </h1>
  </div>
  <div class="form-section">
    <form method = "POST" action="answer.php">
      <ul class="firm">
        <li class="name">Name: <input type="text" name="name" class="fna" required/></li>
        <li class="email">E-mail: <input type="text" name="email" class="em" required/></li>

        <li class="pnum">Phone-Number: <input type="tel" name="tel" class="pm" required/></li>

        <li>Gender: <input type="text" name="gender"></li>

        <li class="design">What kind of designer would you prefer on the frontpage: <input type="text" name="please"> </li>
        <li class="exp">Explain how you would like us to attend to you as a Customer: <textarea name="explanation" id="" cols="30" rows="10"></textarea></li>
        <li></li>
      </ul>
      <input type="submit" name="submit" value="Submit" class="sb">
    </form>
  </div>
  
</body>
</html>

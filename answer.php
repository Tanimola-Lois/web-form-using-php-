<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="answer.css">
  </head>
  <body>
    <h1 class="cust">CUSTOMER'S STATUS PAGE</h1>
    <h1 class="query"><? $query?></h1>

    <?php
      class DB{
    
        public $servername = "localhost";
        public $username = "root";
        public $password = "";
        public $dbname = "CUSTOMER";
    
        public function Connecting(){
          global $conn;
          echo $this->servername.' '.$this->username.' '.$this->password.' '.$this->dbname;

          $conn =  new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      
          if ($conn->connect_error){
            die("Connection error: " .$conn->connect_error);
          } else{
            echo "connection succefull";
            return $conn;
          }
        }
  
      }

     $check = new DB();
     $db = $check->Connecting();
 
      if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
        $name = $_POST["name"];
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $email = "Invalid email format"; 
        }
        $phone = $_POST["tel"];
        $gender = $_POST["gender"];
        $design = $_POST["please"];
        $exp = $_POST["explanation"];
        if($name !=''||$email !=''){
          //Insert Query of SQL
          $query_string ="INSERT INTO  CUSTOMER(Customer_name, Customer_email, Customer_contact, Customer_gender, 
          Customer_designer, Customer_explanation) VALUES ('$name', '$email', '$phone', '$gender', '$design', '$exp')";
          $query = $db->query($query_string);
          echo "<br/><br/><span>Data Inserted successfully...!!</span>";
        }
        else{
          echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
        }
      }
    ?>

    <footer>
      <p class="copu">copyright &copy @lois_macsweetie</p>
    </footer>
  </body>
</html>
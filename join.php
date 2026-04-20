<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AJR_database";

$conn = new mysqli($servername,$username,$password,$dbname);

//check connection
if ($conn->connect_error){
  die("Connection Failed: " . $conn->connect_error);
  }

  //Handle form submission
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $phone = $POST['phone'];

    $stmt = $conn->prepare("INSERT INTO users (name, email, phone) VALUE(?,?,?)");
    $stmt->bind_param("sss",$name,$email,$phone);

    if ($stmt->execute()){
        echo "<p style='color:green;'>Error: " . $stmt->error . "</p>">;
    } else {
        echo "<p style ='color:red;'> Error: " . $stmt->error . "</p>";

    }
    $stmt->close();
  }

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>AJR Foundations</title>
        <link rel ="stylesheet" href="styles.css">    
    </head>
    <body>
        <!--Menu Bar-->
        <div class="navbar">
            <a href="index.html" active>Home</a>
            <a href="services.html">Services</a>
            <a href="gallery.html">Gallery</a>
            <a href="join.html" class="active">Join Us</a>
            <a href="about.html">About</a>
            <a href="contact.html">Contact us</a>
        </div>
        
        <!--Main Content-->
        <div class="Main">
            <centre><h1>Welcome to AJR Foundations</h1></centre>
        </div>

        <div class="form-container">
    <form action="save.php" method="POST">
      <h2>Registration Form</h2>

      <div class="form-group">
        <label for="fname">First Name <span class="required">*</span></label>
        <input type="text" id="fname" name="fname" placeholder="John" required>
      </div>

      <div class="form-group">
        <label for="lname">Last Name <span class="required">*</span></label>
        <input type="text" id="lname" name="lname" placeholder="Doe" required>
      </div>

      <div class="form-group">
        <label for="email">Email Address <span class="required">*</span></label>
        <input type="email" id="email" name="email" placeholder="you@example.com" required>
      </div>

      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="tel" id="phone" name="phone" 
            placeholder="07X XXX XXXX" pattern="07[0-9]{8}"required>
      </div>

      <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" placeholder="dd/mm/yyyy" required>
      </div>

     <div class="form-group">
        <label for="province">Province:</label>
        <select id="province" name="province" required>
          <option value="">Choose Province</option>
          <option value="Central">Central</option>
          <option value="Eastern">Eastern</option>
          <option value="Northern">Northern</option>
          <option value="North Central">North Central</option>
          <option value="North Western">North Western</option>
          <option value="Sabaragamuwa">Sabaragamuwa</option>
          <option value="Southern">Southern</option>
          <option value="Western">Western</option>
          <option value="Uva">Uva</option>
        </select>
      </div>


        </select>
      </div>

      <div class="button-group">
        <button type="reset" class="reset-btn">Reset</button>
        <button type="submit" class="submit-btn">Submit</button>
      </div>

    </form>
        </div>
          <!-- Footer -->
    <footer>
        © 2026 My Website | All Rights Reserved
    </footer>
    
     
    </body>
</html>
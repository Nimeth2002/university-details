<?php

// Connect to database 
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "db name";
// connect according to your database 
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// search form
$student_type = $_POST["student-type"];
$course_name = $_POST["course-name"];
$study_field = $_POST["study-field"];
$sql = "SELECT * FROM universities WHERE student_type='$student_type' AND course_name LIKE '%$course_name%' AND study_field LIKE '%$study_field%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table>
         <tr>
           <th>University Name</th>
           <th>Student Type</th>
           <th>Course Name</th>
           <th>Study Field</th>
           
         </tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["university_name"] . "</td>
            <td>" . $row["student_type"] . "</td>
            <td>" . $row["course_name"] . "</td>
            
          </tr>";
  }
  echo "</table>";
} else {
  echo "No results found.";
}

$conn->close();

?>


<?php
 if($_POST['password'] == 'password' && $_POST['username'] == 'username') {
 session_start();
 $_SESSION['username']='username';
 redirect("list.php");
 } else {
 echo 'Login failed';
 }
 function redirect($url) {
 ob_start();
 header('Location: '.$url);
 ob_end_flush();
 die();
 }
?>

<?php
session_start();
if($_SESSION['username'] == 'username') {
 include "connect.php";
 print("<html>");
 $conn = connect_db();
 $sql = "SELECT * FROM Addresses";
 $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
 echo $row["id"] . " ";
 echo $row["name"] . " ";
 echo $row["street_address"] . " ";
 echo $row["zip"] . " ";
 echo $row["city"] . " ";
 echo $row["state"] . " ";
 echo $row["country"] . " ";
 print("<br>");
 }
 } else {
 echo "0 results";
 }
 print("</html>");
 mysqli_close($conn);
} else {
 print("No access.");
}
?>

<?php
session_start();
if($_SESSION['username'] == 'username') {
 include "connect.php";
 print("<html>");
 $conn = connect_db();
 $sql = "SELECT * FROM Addresses";
 $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
 echo $row["id"] . " ";
 echo $row["name"] . " ";
 echo $row["street_address"] . " ";
 echo $row["zip"] . " ";
 echo $row["city"] . " ";
 echo $row["state"] . " ";
 echo $row["country"] . " ";
 echo "<a href=\"delete.php?id=" . $row["id"] . "\">DELETE</a>";
 print("<br>");
 }
 } else {
 echo "0 results";
GIT Exercises 8 (13)
29.12.2018
 }
 print("<br><br>");
 print("Insert new");
 print("<form action=\"save.php\" method=\"post\">");
 print("<br>");
 print("Name: ");
 print("<input type=\"text\" name=\"name\">");
 print("<br>");
 print("Street address: ");
 print("<input type=\"text\" name=\"street_address\">");
 print("<br>");
 print("ZIP: ");
 print("<input type=\"text\" name=\"zip\">");
 print("<br>");
 print("City: ");
print("<input type=\"text\" name=\"city\">");
 print("<br>");
 print("State: ");
 print("<input type=\"text\" name=\"state\">");
 print("<br>");
 print("Country: ");
 print("<input type=\"text\" name=\"country\">");
 print("<br>");
 print("");
 print("<input type=\"submit\" name=\"submit\" value=\"Save\" >");
 print("</form>");
 print("</html>");
 mysqli_close($conn);
} else {
 print("No access.");
}
?>



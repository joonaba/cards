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
 }
 print("<br><br>");
 print("</html>");
 mysqli_close($conn);
} else {
 print("No access.");
}
?>


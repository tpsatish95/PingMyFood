 <?php
 session_start();
require('database.php');
 $loc = $_SESSION["locality"];
 $result = $mysqli->query("select * from comments where locality='$loc'");
while($row = $result->fetch_array())
{
echo $row["user"] ."^". $row["comment"] ."^". $row["locality"] . "#";

}

?>
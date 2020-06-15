<?php require_once("includes/db.php"); ?>
<?php
function Redirect_to($New_Location){
  header("Location:".$New_Location);
  exit;
}


function Login_Attempt($UserName,$Password){
  global $ConnectingDB;
  $sql = "SELECT * FROM ab_users WHERE username=:userName AND md5_pass=md5(:passWord) LIMIT 1";
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':userName',$UserName);
  $stmt->bindValue(':passWord',$Password);
  $stmt->execute();
  $Result = $stmt->rowcount();
  if ($Result==1) {
    return $Found_Account=$stmt->fetch();
  }else {
    return null;
  }
}


function Confirm_Login(){
if (isset($_SESSION["UserId"])) {
  return true;
}  else {
  $_SESSION["ErrorMessage"]="Prosím přihlašte se!";
  Redirect_to("login.php");
}
}

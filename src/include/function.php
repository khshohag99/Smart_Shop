<?php require_once("include/DB.php"); ?>
<?php
function Redirect_to($New_Location){
  header("Location:".$New_Location);
  exit;


}
function CheckUsernameExistsOrNot($name){
  global $connectingdb ;
  $sql = "SELECT name FROM client WHERE name=:NamE";
  $stmt = $connectingdb->prepare($sql);
  $stmt->bindValue(':NamE',$name);
  $stmt -> execute();
  $result = $stmt ->rowcount();
  if ($result==1) {
    return true;
  }else {
    return false;
  }


}
function CheckemailExistsOrNot($email){
  global $connectingdb ;
  $sql = "SELECT name FROM client WHERE email=:EmaiL";
  $stmt = $connectingdb->prepare($sql);
  $stmt->bindValue(':EmaiL',$email);
  $stmt -> execute();
  $result = $stmt ->rowcount();
  if ($result==1) {
    return true;
  }else {
    return false;
  }


}
function Login_Attempt( $email,$password){
  global $connectingdb;
  $sql = "SELECT *FROM client where email=:EmaiL AND password=:passWord LIMIT 1 ";
  $stmt = $connectingdb->prepare($sql);
  $stmt->bindValue('EmaiL', $email );
  $stmt->bindValue(':passWord',$password);
  $stmt->execute();
  $result = $stmt ->rowcount();
  if ($result==1) {
    return $Found_Account=$stmt->fetch();
  }else {
    return null;
  }

}

//admin verfication functions starts from here
function CheckadminnameExistsOrNot($name){
  global $connectingdb ;
  $sql = "SELECT name FROM admin WHERE name=:NamE";
  $stmt = $connectingdb->prepare($sql);
  $stmt->bindValue(':NamE',$name);
  $stmt -> execute();
  $result = $stmt ->rowcount();
  if ($result==1) {
    return true;
  }else {
    return false;
  }
}

function CheckadminemailExistsOrNot($email){
  global $connectingdb ;
  $sql = "SELECT name FROM admin WHERE email=:EmaiL";
  $stmt = $connectingdb->prepare($sql);
  $stmt->bindValue(':EmaiL',$email);
  $stmt -> execute();
  $result = $stmt ->rowcount();
  if ($result==1) {
    return true;
  }else {
    return false;
  }


}

function Admin_Login_Attempt( $email,$password){
  global $connectingdb;
  $sql = "SELECT *FROM admin where email=:EmaiL AND password=:passWord LIMIT 1 ";
  $stmt = $connectingdb->prepare($sql);
  $stmt->bindValue('EmaiL', $email );
  $stmt->bindValue(':passWord',$password);
  $stmt->execute();
  $result = $stmt ->rowcount();
  if ($result==1) {
    return $Found_Account=$stmt->fetch();
  }else {
    return null;
  }

}
//admin verfication functions Ends here

//Fucntion to make a page password protected(admin)
function confirm_login(){
if (isset($_SESSION["UserId"])){
  return true;
}else {
  $_SESSION["ErrorMessage"]="Login Required ";
  Redirect_to("admin_login.php");
}

}
//Fucntion to make a page password protected(user)
function confirm_login2(){
if (isset($_SESSION["UserId"])){
  return true;
}else {
  $_SESSION["ErrorMessage"]="Login Required ";
  Redirect_to("login_UI.php");
}

}


 ?>

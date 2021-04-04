<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Validating Forms</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<?php
$name = "";
$email = "";
$username = "";
$password = "";
$pass_conf = "";
$date_of_birth = "";
$gender = "";
$marital_status = "";
$address = "";
$city = "";
$post_code = "";
$home_phone = "";
$mob_phone = "";
$ccn = "";
$ccn_date = "";
$salary = "";
$web_site = "";
$gpa = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $pass_conf = $_REQUEST["passconf"];
    $date_of_birth = $_REQUEST["date_time"];
    $gender = $_REQUEST["gender"];
    $marital_status = $_REQUEST["marital_status"];
    $address = $_REQUEST["address"];
    $city = $_REQUEST["city"];
    $post_code = $_REQUEST["postal_code"];
    $home_phone = $_REQUEST["home_phone"];
    $mob_phone = $_REQUEST["mobile_phone"];
    $ccn = $_REQUEST["ccn"];
    $ccn_date = $_REQUEST["ccn_date"];
    $salary = $_REQUEST["salary"];
    $web_site = $_REQUEST["url"];
    $gpa = $_REQUEST["gpa"];

    $isNameValid = "yes";
    $isEmailValid = "no";
    $isUsernameValid = "yes";
    $isPasswordValid = "yes";
    $isPasswordMatches = "yes";
    $isDateValid = "no";
    $isGenderValid = "no";
    $isStatusValid = "no";
    $isPostCodeValid = "yes";
    $isHomePhoneValid = "yes";
    $isMobPhoneValid = "yes";
    $isCCNValid = "yes";
    $isCCNdateValid = "no";
    $isSalaryValid = "no";
    $isWebSiteValid = "no";
    $isGPAValid = "yes";
}
if(strlen($name) < 2 || preg_match('/[^A-Za-z]/', $name)){
    $isNameValid = "no";
}
if(preg_match('/[a-z0-9]+\@\w*\w*\.+\w*/', $email)) {
    $isEmailValid = "yes";
}
if(strlen($username) < 5){
    $isUsernameValid ="no";
}
if(strlen($password) < 8){
    $isPasswordValid = "no";
}
if($pass_conf != $password){
    $isPasswordMatches = "no";
}
if(preg_match('/[0-9]{1,2}\.[0-9]{1,2}\.[0-9]{4}/',
    $date_of_birth)){
    $isDateValid = "yes";
}
if($gender == "Male" || $gender == "Female"){
    $isGenderValid = "yes";
}
if($marital_status == "Single" || $marital_status == "Married" ||
    $marital_status == "Divorced" || $marital_status == "Widowed"){
    $isStatusValid = "yes";
}
if(!is_int($post_code) && strlen($post_code) != 6){
    $isPostCodeValid = "no";
}
if(!is_int($home_phone) && strlen($home_phone) != 9){
    $isHomePhoneValid = "no";
}
if(!is_int($mob_phone) && strlen($mob_phone) != 9){
    $isMobPhoneValid = "no";
}
if(!is_long($ccn) && strlen($ccn) != 16){
    $isCCNValid = "no";
}
if(preg_match('/^\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.((?:19|20)\d{2})\s*$/',
    $ccn_date)){
    $isCCNdateValid = "yes";
}
if(preg_match('/^[A-Z]{1,3}\s\d{1,8}(\.\d{1,4})$/', $salary)){
    $isSalaryValid = "yes";
}
if(preg_match('/http:\/\/+\w*\.+\w*|https:\/\/+\w*\.+\w*/', $web_site)){
    $isWebSiteValid = "yes";
}
if(!is_float($gpa) && $gpa > 4.5){
    $isGPAValid = "no";
}
?>
<body>
<h1>Registration Form</h1>

<p>
    This form validates user input and then displays "Thank You" page.
</p>

<hr />

<h2>Please, fill below fields correctly</h2>
<form action="index.php" method = "post">
    <dl>
        <dt>Name</dt>
        <dd><input type="text" name="name" value="<?= $name ?>"></dd>
        <?php if($isNameValid == "no"){ ?>
            <div>Please enter the valid name</div>
        <?php }?>
        <dt>Email</dt>
        <dd><input type="text" name="email" value="<?= $email ?>"></dd>
        <?php if($isEmailValid == "no"){ ?>
            <div>Please enter the valid email</div>
        <?php }?>
        <dt>Username</dt>
        <dd><input type="text" name="username" value="<?= $username ?>"></dd>
        <?php if($isUsernameValid == "no"){ ?>
            <div>Please enter the valid username</div>
        <?php }?>
        <dt>Password</dt>
        <dd><input type="password" name="password" value="<?= $password ?>"></dd>
        <?php if($isPasswordValid == "no"){ ?>
            <div>Please enter the valid password</div>
        <?php }?>
        <dt>Confirm Password</dt>
        <dd><input type="password" name="passconf" value="<?= $password ?>"></dd>
        <?php if($isPasswordMatches == "no"){ ?>
            <div>Password doesn't match!!!</div>
        <?php }?>
        <dt>Date of Birth</dt>
        <dd><input type="text" name="date_time" value="<?= $date_of_birth ?>"></dd>
        <?php if($isDateValid == "no"){ ?>
            <div>Please enter the date using following format: dd.MM.yyyy</div>
        <?php }?>
        <dt>Gender</dt>
        <dd><input type="text" name="gender" value="<?= $gender ?>"></dd>
        <?php if($isGenderValid == "no"){ ?>
            <div>Please enter either Male or Female !</div>
        <?php }?>
        <dt>Marital Status</dt>
        <dd><input type="text" name="marital_status" value="<?= $marital_status ?>"></dd>
        <?php if($isStatusValid == "no"){ ?>
            <div>Please enter the valid option</div>
        <?php }?>
        <dt>Address</dt>
        <dd><input type="text" name="address" value="<?= $address ?>"></dd>

        <dt>City</dt>
        <dd><input type="text" name="city" value="<?= $city ?>"></dd>

        <dt>Postal Code</dt>
        <dd><input type="text" name="postal_code" value="<?= $post_code ?>"></dd>
        <?php if($isPostCodeValid == "no"){ ?>
            <div>Please enter the valid post code</div>
        <?php }?>
        <dt>Home Phone</dt>
        <dd><input type="text" name="home_phone" value="<?= $home_phone ?>"></dd>
        <?php if($isHomePhoneValid == "no"){ ?>
            <div>Please enter the valid home phone</div>
        <?php }?>
        <dt>Mobile Phone</dt>
        <dd><input type="text" name="mobile_phone" value="<?= $mob_phone ?>"></dd>
        <?php if($isMobPhoneValid == "no"){ ?>
            <div>Please enter the valid mobile phone</div>
        <?php }?>
        <dt>Credit Card Number</dt>
        <dd><input type="text" name="ccn" value="<?= $ccn ?>"></dd>
        <?php if($isCCNValid == "no"){ ?>
            <div>Please enter the valid credit card number</div>
        <?php }?>
        <dt>Credit Card Expiry Date</dt>
        <dd><input type="text" name="ccn_date" value="<?= $ccn_date ?>"></dd>
        <?php if($isCCNdateValid == "no"){ ?>
            <div>Please enter the date using following format: dd.MM.yyyy</div>
        <?php }?>
        <dt>Monthly Salary</dt>
        <dd><input type="text" name="salary" value="<?= $salary ?>"></dd>
        <?php if($isSalaryValid == "no"){ ?>
            <div>Please enter your monthly salary using following format: UZS 200000.00</div>
        <?php }?>
        <dt>Web Site URL</dt>
        <dd><input type="text" name="url" value="<?= $web_site ?>"></dd>
        <?php if($isWebSiteValid == "no"){ ?>
            <div>Please enter your web site using following format: https://example.com</div>
        <?php }?>
        <dt>Overall GPA</dt>
        <dd><input type="text" name="gpa" value="<?= $gpa ?>"></dd>
        <?php if($isGPAValid == "no"){ ?>
            <div>Please enter your valid GPA</div>
        <?php }?>
    </dl>
    <div>
        <input type="submit" value="Register" />
    </div>
</form>
</body>
</html>
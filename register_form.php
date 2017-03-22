<meta charset="utf-8" />
<?php
$host = "localhost";
$user = "it58160421";
$passwd = "27798619l30x";
$dbname = "it58160421";
$conn = new mysqli($host,$user,$passwd,$dbname);
$conn->query('SET NAMES UTF8');
$query ="SELECT * FROM provinces";
$result = $conn->query($query);
?>
<html>
<head>
<meta charset="utf-8">
<title> validation </title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
    /* Add a gray background color and some padding to the footer */
   .black-ribbon {
  position: fixed;
  z-index: 9999;
  width: 70px;
}
@media only all and (min-width: 768px) {
  .black-ribbon {
    width: auto;
  }
}
.stick-left { left: 0; }
.stick-right { right: 0; }
.stick-top { top: 0; }
.stick-bottom { bottom: 0; }
  </style>
</head>
<body>
<img src="http://image.coolz-server.com/s/VgJDQdCt" class="black-ribbon stick-top stick-left"/>
<div class="jumbotron">
  <div class="container text-center">
    <h1>Web Programmings</h1>      
    <p>Lab 7, Register , Dopost & Show Register</p>
  </div>
</div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="er.png">ER Diagram</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://angsila.cs.buu.ac.th/~58160421/887371/lab07/register_form.php">Home</a></li>
        <li><a href="SourceCode/register_form.txt">register_form.php</a></li>
        <li><a href="SourceCode/dopost.txt">dopost.php</a></li>
        <li><a href="SourceCode/show_register.txt">show_register.php</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://angsila.cs.buu.ac.th/~58160421/887371/lab01/aboutme.html"><span class="glyphicon glyphicon-user">
        </span> My Account</a></li>
      </ul>
    </div>
  </div>
</nav>
<center><h3>แบบฟอร์มลงทะเบียน</h3></center>
<center><table border="0" width="200" height="60%" >
<form action="dopost.php" method="post" class="a">
<tr >
      <td ><p>ชื่อ:</p></td>
      <td><input type="text" class="text" name="name" id="name"  /></td>
</tr>
<tr>
      <td><p>อีเมล์:</p></td>
      <td><input type="email" class="text" name="email" id="email" /></td>
</tr>
<tr>
      <td><p>เพศ:</p></td>
      <td><input type="radio" class="radio" name="sex" id="sex" value="Male"  > ชาย </td>
      <td><input type="radio" class="radio" name="sex" id="sex" value="Female" > หญิง </td>
</tr>
<tr>
      <td><p>ความสนใจ:</p></td>
      <td><input type="checkbox" class="checkbox" name="intr1" id="intr1" value="เรียน"  /> เรียน </td>
      <td><input type="checkbox" class="checkbox" name="intr2" id="intr2" value="เกมส์"  /> เล่นเกม </td>
</tr>
<tr >
      <td><p>ที่อยู่:</p></td>
      <td><textarea class="text" name="address" id="address" rowspan="4" colspan="50" ></textarea></td>
</tr>
<tr>
<td><p>จังหวัด:</p>
<td><select name="province" id="province">
<option value="">---เลือกจังหวัด---</option>
<?php while($row = $result->fetch_array()) { ?>
 <option value="<?php echo $row['PROVINCE_ID']; ?>"> <?php echo $row['PROVINCE_NAME']; ?></option>
<?php } ?>
</select></tr></td>
<tr>
<td><input type="submit" id="submit" value="Submit" name="submit" /></td>
</tr>
</form>
</table></center>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
$('#submit').on('click',function(event) {
    var valid = true;
    errorMessage = "";
    if($('#name').val() == '') {
        errorMessage = "โปรดป้อนชื่อ-นามสกุล \n";
        valid = false;
    }
    if($('#email').val() == '') {
        errorMessage += "โปรดป้อน email\n";
        valid = false;
    }else if (!(($('#email').val().indexOf(".") > 0) && ($('#email').val().indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test($('#email').val())) {
                      errorMessage+="โปรดป้อน email ให้ถูกต้อง\n";
                      valid=false;
      }
    if($('#sex').prop("checked")==false && $('#sex').prop("checked")==true){
                  errorMessage += "โปรดเลือก เพศ \n";
                  valid = false;
       }
      if($('#intr1').prop("checked")==false && $('#intr2').prop("checked")==false){
                  errorMessage += "โปรดเลือกความสนใจอย่างน้อย 1 อย่าง \n";
                  valid = false;
      }
    if($('#address').val() == '') {
        errorMessage += "โปรดป้อนที่อยู่\n";
        valid = false;
    }
    if($('#province').val()==''){
                        errorMessage += "โปรดเลือกจังหวัด \n";
                        valid = false;
      }
    if( !valid && errorMessage.length > 0) {
        alert(errorMessage);
        event.preventDefault();
    }
});
</script>
</body>
</html>
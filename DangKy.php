
<?php
        require_once("./db.php"); 
    $ten= $ten1 = $email = $pass = $re_pass= $number ="" ;
        // setcookie("ten" ,"ten", time() + 60, "/");
        if(!empty($_POST)){
          
            $email = $_POST['re_name'];
            $re_pass = $_POST['re_pass'];
            // $number = $_POST['number'];
            
                    if(isset($_POST['name'])){
                      $ten = $_POST['name'];
                    }
                    if(isset($_POST['pass'])){
                      $pass = $_POST['pass'];
            
                    }

        }

        // setcookie("name",$ten, time() + 600 , '/');
      //  setcookie("re_name",$email , time() + 600 , '/');
      //   setcookie("pass",$pass, time() + 600 , '/');
      //    setcookie("re_pass",$re_pass, time() + 600 , '/');
      //   setcookie("number",$number , time() + 600 , '/');


        
      
      if(isset($_POST['submit'])){
        
        // $dbb = new mysqli("localhost" , "root" , "" , "vay");

        
        mysqli_set_charset($connet,"utf8");
        
        if($connet->connect_error){
            var_dump($connet->connect_error);
            die();
        }else{
            
            // echo "luu thanhf coong";
        }
        
       
        $sqlCT = "SELECT * FROM test_login ";
       $test =  mysqli_query($connet , $sqlCT);
        
        while($row = mysqli_fetch_assoc($test)) {?>

            <?php $gmail = $row['email'];
         
            if($row['email'] == $email ){
             echo '<script>  alert("Gmail đã được đăng ký !!"); </script>';
             break;
            }
            
         

            ?>
         <?php } 



                  
          $queryy = "INSERT INTO test_login
          VALUES( '".$ten."'  ,'".$email."', '".$pass."' )";
            mysqli_query ($connet, $queryy);

            
            if($pass == $re_pass && $ten != "" && strlen($pass) >= 6 ){
                 header("Location: DangNhap.php");
              die();
          }
          else {
            echo "<p class='dk'>Mật Khẩu Gồm 6 kí tự </p>";
          }
        
        
            // $trung = "DELETE n1
            // FROM test_login n1, test_login n2
            // WHERE n1.email = n2.email and n1.Stt < n2.Stt";
            // mysqli_query ($dbb , $trung); 
            



            // $dbb->close();
 
    }
     

       

   
  
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Simple registration form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="icon" href="./img/bia.jpg"> 

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <style>
      html, body {
     
      
      }
      .box{
        display: grid;
         grid-template-columns: 36% 30%  30%;
         /* grid-column-gap: 20px; */
      }
      body, div, h1, form, input, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #666;
      }
      h1 {
      padding: 10px 0;
      font-size: 32px;
      font-weight: 300;
      text-align: center;
      }
      p {
      font-size: 12px;
      }
      hr {
      color: #a9a9a9;
      opacity: 0.3;
      }
      .main-block {
        /* width: 340px; */
      /* max-width: 340px; 
      min-height: 460px;  */
      padding: 10px 0;
      margin: auto;
      border-radius: 5px; 
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
      background: #ebebeb; 
      margin-top: 60px;
      }
      form {
      margin: 0 30px;
      }
      .account-type, .gender {
      margin: 15px 0;
      }
      input[type=radio] {
      display: none;
      }
      label#icon {
      margin: 0;
      border-radius: 5px 0 0 5px;
      }
      label.radio {
      position: relative;
      display: inline-block;
      padding-top: 4px;
      margin-right: 20px;
      text-indent: 30px;
      overflow: visible;
      cursor: pointer;
      }
      label.radio:before {
      content: "";
      position: absolute;
      top: 2px;
      left: 0;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: #1c87c9;
      }
      label.radio:after {
      content: "";
      position: absolute;
      width: 9px;
      height: 4px;
      top: 8px;
      left: 4px;
      border: 3px solid #fff;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      input[type=text], input[type=password] , input[type=gmail] {
      width: calc(100% - 57px);
      height: 36px;
      margin: 13px 0 0 -5px;
      padding-left: 10px; 
      border-radius: 0 5px 5px 0;
      border: solid 1px #cbc9c9; 
      box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
      background: #fff; 
      }
      input[type=password] {
      margin-bottom: 15px;
      }
      #icon {
      display: inline-block;
      padding: 9.3px 15px;
      box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
      background: #1c87c9;
      color: #fff;
      text-align: center;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 100%;
      padding: 10px 0;
      margin: 10px auto;
      border-radius: 5px; 
      border: none;
      background: #1c87c9; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #26a9e0;
      }
      .dk {
        font-size: 12px;
        margin-top:385px;
        margin-left:-60px;
        z-index: 10;
        position: absolute;
      }
@media only screen and (max-width: 768px) {
     .box{
    width: 100%;
        display: grid;
         grid-template-columns: 1% 90%  1%;
         /* grid-column-gap: 20px; */
      }
      .main-block {
        /* width: 1400px; */
   
      }
@media only screen and (min-width: 768px) and (max-width: 1024px)  {
  .box{
        width: 100%;
        display: grid;
         grid-template-columns: 1% 90%  1%;
         /* grid-column-gap: 20px; */
      }

}
}
    </style>
  </head>
  <body>
    <div class="box">
    <div></div>
    <div class="main-block">
      <h1>Đăng Ký</h1>
      <form action="" method="post">
        <hr>
        <div class="account-type">
          <input type="radio" value="none" id="radioOne" name="account" checked/>
          <label for="radioOne" class="radio">Personal</label>
          <input type="radio" value="none" id="radioTwo" name="account" />
          <label for="radioTwo" class="radio">Company</label>
        </div>
        <hr>
        <label id="icon" for="name"><i class="fas fa-envelope"></i></label>
        <input  type="gmail" name="name" id="name" placeholder="Email" required/>
        <label id="icon" for="re_name"><i class="fas fa-user"></i></label>
        <input type="text" name="re_name" id="re_name" placeholder="Name" required/>
        <label id="icon" for="pass"><i class="fas fa-unlock-alt"></i></label>
        <input type="password" name="pass" id="pass" placeholder="Password" required/>
        <label id="icon" for="re_pass"><i class="fas fa-unlock-alt"></i></label>
        <input type="password" name="re_pass" id="re_pass" placeholder="Password" required/>
        <hr>
        <div class="gender">
          <input type="radio" value="none" id="male" name="gender" checked/>
          <label for="male" class="radio">Male</label>
          <input type="radio" value="none" id="female" name="gender" />
          <label for="female" class="radio">Female</label>
        </div>
        <hr>
        <div class="btn-block">
          <p>Bạn Đã Có Tài Khoản Vui lòng Nhấn Vào Dây Để <a href="DangNhap.php">Đăng Nhập</a>.</p>
         
          <button type="submit" name="submit" id="submit" >Đăng Ký</button>
          

        </div>
      </form>
    </div>
<div></div>
</div>
  </body>
      <script>
              var pass = document.getElementById("pass").value;
              var re_pass = document.getElementById("re_pass").value;
              if(pass.length > 6 && pass === re_pass){

              }
        </script>

</html>
  
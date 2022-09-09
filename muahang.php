<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require  './PHPMailer/src/SMTP.php';

        session_start();
        $ten = $img = $Gia = $soluong = $soluongnew = "";
      
        $tt ="";
        if(isset($_COOKIE['name']) ) {
            $tenDN = $_COOKIE['name'];
        }
    
        if(!isset($_SESSION['giohang'])) $_SESSION['giohang'] =[];
        // xóa rỗng
        if(isset($_GET['submit']) && ($_GET['submit']==1 )) unset($_SESSION['giohang']);

        // xóa sản phẩm
        if(isset($_GET['delete']) && ($_GET['delete'] >= 0)) {
            array_splice($_SESSION['giohang'],  $_GET['delete'] , 1);
        }


        if(isset($_POST['submit']) && $_POST['submit']) {
                $img = $_POST['img'];
                $ten = $_POST['tensp'];
                $Gia = $_POST['Gia'];
                $soluong = $_POST['soluong'];
                $mau = $_POST['mau'];
                $size = $_POST['size'];
                $fl =0;
                //kiểm tra
                for($i = 0 ; $i <sizeof($_SESSION['giohang']) ; $i++ ){
                    if($_SESSION['giohang'][$i][0]==$img){

                        $fl =1;
                        $soluongnew = $soluong + $_SESSION['giohang'][$i][2];
                        $_SESSION['giohang'][$i][2] = $soluongnew;
                        break;
                    }
                }
                if($fl == 0){

                    //thêm sp
                    $sp = [$img , $ten , $soluong ,$Gia , $mau, $size];
                    $_SESSION['giohang'][] = $sp;
                }
                // var_dump($_SESSION['giohang']);
        }
        $dem= 0;
        $conten ='';
        function show(){
            if (isset($_SESSION['giohang']) &&  (is_array($_SESSION['giohang']))) {
                $tong = 0;
                $conten = '<table class="gmail" ">';
                $conten .= '<tr>
                <td>Stt </td>
                <td>ẢNh </td>
                <td>Tên Sản phẩm </td>
                <td>Số Lượng </td>
                <td>Giá</td>
                <td>Thành Tiền </td>
                
                </tr>';
                for($i= 0; $i < sizeof($_SESSION['giohang']); $i++) {
             
                 

                    $tt = $_SESSION['giohang'][$i][3] * $_SESSION['giohang'][$i][2]  . ".000";
                    $tong += $tt;

                      $conten  .=' <tr>  
                    <td>'.($i+1).'</td>
                    <td><img style="width:70px;heigth:70px;" src="./img/'.$_SESSION['giohang'][$i][0].'" /> </td>
                    <td>'.$_SESSION['giohang'][$i][1].'<br>(Màu: '.$_SESSION['giohang'][$i][4].')<br>(Size:'.$_SESSION['giohang'][$i][5].') </td>
                    <td>'.$_SESSION['giohang'][$i][2].'</td>
                    <td>'.$_SESSION['giohang'][$i][3].'</td>
                    <td>'.$tt.' </td>
                   </tr> ' ; 
                 echo ' <tr>
                <td>'.($i+1).'</td>
                <td><img style="width:70px;heigth:70px;" src="./img/'.$_SESSION['giohang'][$i][0].'" /> </td>
              
                <td>'.$_SESSION['giohang'][$i][2].'<br>(Màu: '.$_SESSION['giohang'][$i][4].')<br>(Size:'.$_SESSION['giohang'][$i][5].') </td>

                <td>'.$_SESSION['giohang'][$i][3].'</td>
                <td>'.$tt. '</td>
                <td> <a href="muahang.php">Mua </a> </td>
                <td><a href="giohang.php?delete='.$i.'"><i class="fa-solid fa-trash-can"></i> </a></td> 
                
               
                </tr>' ;   
                
              
            }
             echo '  
             </tr>
             <tr>
             <td> </td>
             <td> </td>
             <td> </td>
             <td> </td>
            
               <td>'.$tong.'</td>
               <td> <a href="#">Mua Tất Cả  </a> </td>
             <td> <a href="giohang.php?submit=1"> Xóa Tất Cả </a> </td>

             </tr>
             ';

            }
            $conten .= '<table>';
            
    $mail = new PHPMailer(true);
    // print_r($mail);

  
    $gmail = $name = $diachi =$sdt =$thongtin= "";
    if(isset($_POST['diachi'])){
        $diachi = $_POST['diachi'];
      }
      if(isset($_POST['diachi'])){
        $sdt = $_POST['sdt'];
      }

      if(isset($_POST['thongtin'])){
        $thongtin = $_POST['thongtin'];
      }
     
    //   if(isset($_POST['gmail'])){

    //   $checkG = '/[@gmail.com]{10}/';
    //   $checkGmail = preg_match($checkG ,$gmail );
    //   if(!empty($checkGmail)){
    //     echo "là gmail";
    //   }
    //   else{
    //     echo "k là gnmail";
    //   }
    //   }
     
     
      if(isset($_POST['sdt'])){
        $checkSdt = '/^0[0-9]{9}$/';
        $checkS = preg_match($checkSdt ,$sdt );
        
      if(!empty($checkS)  ){
       
        try {
            $mail->SMTPDebug = 0;  
            $mail->isSMTP();          
            $mail->CharSet = 'UTF-8';                                  //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';  
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'StantioShop1812@gmail.com';                     //SMTP username
            $mail->Password   = 'roxstutpkwenusmg';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;  
    
        
            if(isset($_POST['gmail'])){
          
            $gmail = $_POST['gmail'];
            }
            
            if(isset($_POST['name'])){
        
            $name = $_POST['name'];
            }
            
            if(isset($_POST['diachi'])){
    
            $diachi = $_POST['diachi'];
            }
            if(isset($_POST['sdt'])){
    
            $sdt = $_POST['sdt'];
            }
    
            $thongtin = $name . " - ". $diachi . " - " . $sdt;
        
            // echo $gmail;
            // $mail->setFrom('StantioShop1812@gmail.com', 'Mailer');
            $mail->setFrom(  $gmail,  $name);
    
            $mail->addAddress('ngoxuanquy1812@gmail.com', 'XuanQuy'); 
            // $mail->addAddress($gmail, $name);    //Add a recipient
            $mail->addAddress('nguyenthidieulinh1212@gmail.com');  
           
    
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject =  $thongtin;
            $mail->Body    = $conten;
    
            $mail->send();
            echo '<script>  alert("Cảm Ơn Bạn Đã Mua Hàng!!"); </script>';
        }
        catch (Exception $e) {
            // echo "Lỗi . Mailer Error: {$mail->ErrorInfo}";
        }
    
      }
      else {
        echo '<script>  alert("Vui lòng nhập đúng SĐT !!"); </script>';
      }
    }

    $diachi = $sdt = $thongtin = '';
   
    // echo $conten;

        } 


     
        
    //Gửi Gmail


        //Lưu database

              
      if(isset($_POST['submit'])){
        
        
        $dbb = new mysqli("localhost" , "root" , "" , "giohang");
        
        
        mysqli_set_charset($dbb,"utf8");
        
        if($dbb->connect_error){
            var_dump($dbb->connect_error);
            die();
        }else{
            
            // echo "luu thanhf coong";
        }
        

            $queryy = "INSERT INTO ds_giohang (STT, Tên , Gia , img, SoLuong , id_vay) 
         VALUE('' , '".$Ten."', '".$_SESSION['giohang'][$i][2]* $soluong."', '".$_SESSION['giohang'][$i][0]."', '".$soluong."' , '".$Stt."')";
            mysqli_query ($dbb , $queryy);

        
       
        
        
            $trung = "DELETE n1
            FROM ds_giohang n1, ds_giohang n2
            WHERE n1.img = n2.img AND n1.STT > n2.STT";
            mysqli_query ($dbb , $trung); 
            



            $dbb->close();
 
    }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/cssgh.css">
    <link rel="stylesheet" href="./css/cssmh.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="./img/bia.jpg"> 

    
</head>
<style>
   
  
    </style>
<body>

<div class="header" id="header" style=' width: 100%;background-color: azure;  z-index: 10000000;'>
       <div>

           <a href="index.php">
               <img class="title" style="" src="./img/bia.jpg"> 
            </a>
        </div>
                 <div>

                     <a href="index.php" style="text-decoration: none;"> 
                        
                        <h2 class="h2" style=" color: black;  text-decoration: none; " >
                            Trang Chủ
                        </h2>
                    </a>
                </div>
              <div>

                  
                  <a href="phanloai.php" style=" color: black;text-decoration: none;">
                    <h2 class="h2" id="showw" >Phân Loại</h2> 
                </a>
            </div>
                      
                    
              <div>

                  <h2 class="h2">Về Chúng Tôi</h2>
               
            </div>
               
                    <h2 class="h2">Sự Kiện</h2>
               <div>

                   <form method="post" id="post" >
                      
                           <input type="submit" value="Tìm"  style=" " name="submit" id="submit"  >
                       
                          
                               <input type="text" style=" " name="Tim" id="Tim">
                         
                               
                               <i class="fa-solid fa-magnifying-glass" id="cc_tim" style=" "></i>
                            </form>
                        </div>
              <div>

                  <a href = "giohang.php">
                      <i class="fa-solid fa-cart-arrow-down" id="gio" style="margin-top:30px;  font-size: 25px; color: coral  "></i>
                    </a>
                    <!-- <div class="phuthem"> Thêm vào thành công </div> -->
                
            </div>
            <div >

             
                    
                    <a class="dn" > 
                        <?php if($ten == "") { 

                        echo "
                        <i class='fa-solid fa-phone' id='phone'></i>
                        <a id='dn_test'> 
                        0925964759 </a>";
                    }
                    else { 
                         
                        // echo '<a class="tendn">'.$ten.'</a>';

                    }
                    ?>
             
                </a>
                </div>
                    <div>

                        <label class="menu" id="menu" onclick="menu()">
                            <!-- <i class="fa-solid fa-bars" id="bacham"></i> -->
                        </label>
                        
                    </div>
          
    </div>
    
    <table class="table">
        <tr>
                <td> STT </td>
                <td> Ảnh </td>
           
                <td> Số Lượng </td>
                <td> Giá </td>
                <td> Thành Tiền</td>
                <td> Mua</td>
                <td> Xóa</td>

        </tr>
    <?php show(); ?>

       
    </table>


    <form action="" method="post" id="post11">
    <fieldset class="for" id="for" >
                    <legend >Thông Tin Cá Nhân </legend>

                    <lable class="lable"> Họ Và Tên 
                        </lable>
                   
                 <input class="input" type="text" placeholder="Tên đầy đủ" name="name" id="name" style="" required> <br>
                 <lable  class="lable"> Số Điện Thoại </lable>

                    <input class="input" type="text" placeholder="Số điện thoại" name="sdt" required> <br>
                    <lable  class="lable"> Gmail </lable>
                    
                    <input class="input" type="email" placeholder="Gmail" name="gmail" id="gmail" required style=""> <br>
                    <lable  class="lable"> Địa Chỉ </lable>
                    <input class="input" type="text" placeholder="Địa chỉ cụ thể" name="diachi" id="diachi" style="" required> <br>
                    <lable  class="lable"> Nội Dung </lable>
                    <input class="input" type="text" placeholder="Nội Dung" name="diachi" id="nd" style="height: 80px; " > <br>
                    <input type="submit" value="Gửi Đơn Hàng" style="" id="submit1">
                </fieldset>
            </form>      
    
   <footer>
     <div class="container">
         <!--Bắt Đầu Nội Dung Giới Thiệu-->
         <div class="noi-dung about">
             <h2>Về Chúng Tôi</h2>
             <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium dolores alias ipsa vel hic
                tempore exercitationem ipsam explicabo repudiandae ut consectetur qui, earum at nostrum perspiciatis
                asperiores necessitatibus facilis esse.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia id possimus quibusdam nihil earum in
                provident enim animi commodi quisquam! Molestiae cupiditate mollitia pariatur error ea, debitis
                eaque quo dolorum.</p>
             <ul class="social-icon">
                 <li><a href=""><i class="fa fa-facebook"></i></a></li>
                 <li><a href=""><i class="fa fa-twitter"></i></a></li>
                 <li><a href=""><i class="fa fa-instagram"></i></a></li>
                 <li><a href=""><i class="fa fa-youtube"></i></a></li>
             </ul>
         </div>
         <!--Kết Thúc Nội Dung Giới Thiệu-->
         <!--Bắt Đầu Nội Dung Đường Dẫn-->
         <div class="noi-dung links">
             <h2>Đường Dẫn</h2>
             <ul>
                 <li><a href="#">Trang Chủ</a></li>
                 <li><a href="#">Về Chúng Tôi</a></li>
                 <li><a href="#">Thông Tin Liên Lạc</a></li>
                 <li><a href="#">Dịch Vụ</a></li>
                 <li><a href="#">Điều Kiện Chính Sách</a></li>
             </ul>
         </div>
         <!--Kết Thúc Nội Dung Đường Dẫn-->
         <!--Bắt Đâu Nội Dung Liên Hệ-->
         <div class="noi-dung contact">
             <h2>Thông Tin Liên Hệ</h2>
             <ul class="info">
                 <li>
                     <span><i class="fa fa-map-marker"></i></span>
                     <span>Đường Số 1<br />
                         Quận Hoàng Mai , Hà Nội<br />
                         Việt Nam</span>
                 </li>
                 <li>
                     <span><i class="fa fa-phone"></i></span>
                     <p><a href="#">0589401978</a>
                         <br />
                         <a href="#">0925964759</a></p>
                 </li>
                 <li>
                     <span><i class="fa fa-envelope"></i></span>
                     <p><a href="#">ngoxuanquy1812@gmail.com</a></p>
                </li>
                 <li>
                     <form class="form">
                         <input type="email" class="form__field" placeholder="Đăng Ký Subscribe Email" />
                         <button type="button" class="btn btn--primary  uppercase">Gửi</button>
                     </form>
                 </li>
             </ul>
         </div>
         <!--Kết Thúc Nội Dung Liên Hệ-->
     </div>
 </footer>
</body>
</html>
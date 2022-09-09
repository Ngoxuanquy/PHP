<?php 

$mau = $size ='';


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
                $mau = $_POST['mau'];
                $size = $_POST['size'];
                
                $soluong = $_POST['soluong'];
                $fl =0;
                //kiểm tra
                for($i = 0 ; $i <sizeof($_SESSION['giohang']) ; $i++ ){
                    if($_SESSION['giohang'][$i][0]==$img && $_SESSION['giohang'][$i][4] == $mau && $_SESSION['giohang'][$i][5] == $size   ){

                        $fl =1;
                        $soluongnew = $soluong + $_SESSION['giohang'][$i][2];
                        $_SESSION['giohang'][$i][2] = $soluongnew;
                        break;
                    }
                }
                if($fl == 0){

                    //thêm sp
                    $sp = [$img , $ten , $soluong ,$Gia, $mau, $size];
                    $_SESSION['giohang'][] = $sp;
                }
                // var_dump($_SESSION['giohang']);
        }
        $dem= 0;
        function show(){
            if (isset($_SESSION['giohang']) &&  (is_array($_SESSION['giohang']))) {
                $tong = 0;
                for($i= 0; $i < sizeof($_SESSION['giohang']); $i++) {   
                    $tt = $_SESSION['giohang'][$i][3] * $_SESSION['giohang'][$i][2] . ".000";
                    $tong += $tt;
                 echo ' <tr>
                <td>'.($i+1).'</td>
                <td><img src="./img/'.$_SESSION['giohang'][$i][0].'" /> </td>
                <td>'.$_SESSION['giohang'][$i][1].'<br>(Màu: '.$_SESSION['giohang'][$i][4].')<br>(Size:'.$_SESSION['giohang'][$i][5].') </td> 
                <td>'.$_SESSION['giohang'][$i][2].'</td>
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
             <td> </td>

               <td>'.$tong. '.000</td>
               <td> <a href="muahang.php">Mua Tất Cả  </a> </td>
             <td> <a href="giohang.php?submit=1"> Xóa Tất Cả </a> </td>

             </tr>
             ';

            }

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

                <a href="DangKy.php">
                    
                    <a class="dn" > 
                        <?php if($ten == "") { 

                        echo "Đăng Ký ";
                    }
                    else { 
                         
                        // echo '<a class="tendn">'.$ten.'</a>';

                    }
                    ?>
                    </a>
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
                <td> Tên Váy </td>
                <td> Số Lượng </td>
                <td> Giá </td>
                <td> Thành Tiền</td>
                <td> Mua</td>
                <td> Xóa</td>

        </tr>
    <?php show(); ?>

       
    </table>



    
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
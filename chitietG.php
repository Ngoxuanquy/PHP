<?php
    require_once('db.php');
    // require_once('index.php');
    $ten = $Gia=$soluong = $img = $Ten = $Stt ="";

    if(isset($_GET['Stt']) ){
        $Stt = $_GET['Stt'];
    }

    if(isset($_POST['soluong']) ){
        $soluong = $_POST['soluong'];
    }
    $mau= $size =$Tim= "";
    
    if (isset($_POST['submit'])) {

        if(isset($_POST['mau']))
        
        {
        
        $mau = $_POST['mau'];  //  Hiển thị giá trị đã chọn
        
        }
    }
    
    
    if (isset($_POST['submit'])) {

        if(isset($_POST['size']))
        
        {
        
        $size = $_POST['size'];  //  Hiển thị giá trị đã chọn
        
        }
    }
   
     
    setcookie("mau", $mau , time() + 30 , '/');
    setcookie("size", $size , time() + 30 , '/');

    // test


    if(isset($_COOKIE['name']) ) {
        $ten = $_COOKIE['name'];
    }
    
    setcookie("Stt", $Stt , time() + 300 , '/');
    setcookie("img", $img , time() + 300 , '/');
    setcookie("soluong", $soluong  , time() + 300 , '/');

    //Lấy database

    $sql = "SELECT * FROM sql_giay where Stt = $Stt ";
    
    $query = mysqli_query($connet , $sql);

    $sql_test = "SELECT * FROM sql_giay where Stt = $Stt ";
    
    $query_test = mysqli_query($connet , $sql_test);
   
    $sqlAll = "SELECT * FROM sql_giay where Stt < 6";
    
    $queryAll = mysqli_query($connet , $sqlAll);

    
    $sqlCT = "SELECT * FROM sql_chitietGiay where Stt = $Stt ";
    
    $queryCT = mysqli_query($connet , $sqlCT);
   
    
   

    //Các Mẫu Váy

    
    // $connetCT = mysqli_connect("localhost", "root" ,"" ,"chitietvmh");

    // if($connetCT){
    //     mysqli_query($connetCT , "SET NAMES 'UTF8' ");
    //     // echo "ket noi thanh cong";
    // }
    // else {
    //     echo "ket noi that bai";
    // }


    // if (isset($_POST['submit'])) {
    //     if($mau == "" || $size = "" ){
    //         header("Location: chitiet.php");
    //         echo "Nhap";
    //     }
    // }
       
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết</title>
    <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="./css/cssct.css">
    <link rel="icon" href="./img/bia.jpg"> 

</head>
<style>
 
      
        </style>
<body>


<body>
    

    
<div class="header" id="header" style=' width: 100%;background-color: azure; position: fixed; z-index: 10000000;'>
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

                  
                  <a href="phanloai.php" style=" color: black; text-decoration: none;">
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
                    <div class="phuthem"> Thêm vào thành công </div>
                
            </div>
            <div >

                <a href="DangKy.php" id="dn">
                    <a class="dn" > 
                        <a href="DangKy.php" style=" color: black;  text-decoration: none; " >
                        <?php if($ten == "") { 

                        echo " <a id='dn'> Đăng Ký </a>";
                    }
                    else { 
                         
   
                     echo '<p class="tendn" style=" margin-top: 30px;">'.$ten.'</p>';

                    }
                    ?>
                    </a>
                    </a>
                </a>
                </div>
                    <div>

                        <label class="menu" id="menu" onclick="menu()">
                            <!-- <i class="fa-solid fa-bars" id="bacham"></i> -->
                        </label>
                        
                    </div>
          
    </div>
   
         <?php
                    while($row = mysqli_fetch_assoc($query)) {?>
          <div class="img_img">
                <img  style="display:block" id="img_fake"   src = './img/<?php echo $img = $row['img'] ?>  '/>
                    </div>
    
                        <table class="conterner" >
        
                        <div class="magnify">
        <!-- <div class="magnifier" style="background-image:url(https://www.teahub.io/photos/full/247-2478341_hd-pics-photos-cartoon-movie-characters-2-desktop.jpg);"></div> -->
                        <tr class="tr">
       
                  
                            <form method="post" action="giohang.php" id="gui">        
                        <td id="zoom" >
                        <div class="magnify" >
                     <div class="magnifier" id="magnifier"  style="background-image:url(./img/<?php echo $row['img'] ?> )">
                     
                    
                    </div>
                    <div class="magnified" >
                   
                 <img style="width: 500px; height: 500px; margin-left: 450px; margin-top:200px;" id="img" src = './img/<?php echo $img = $row['img'] ?>  '/>
                       </div>
                    <p class="output"></p>
                    </div>
               </div>

        
                    

                    </td>
                    <td class="td_left" style="display: block" >
                        <h1 class="title_ten" style="" >
                        <?php echo $Ten = $row['TenGiay'] ?> 
                        <hr style=" " id="hr">
                        </h1>
                       
                       
                            <a class="btn_Gia" id="Gia">
                            <?php
                                echo $Gia = $row['Gia'];
                            ?>
                            </a>
                             
                            <label style="color: coral" id="đ">đ </label>
                   
                            <br>
                                     
                        <?php 
                         if($row['Mau4'] == ''){
                           echo '<script> 
                           document.getElementById("mau4").style.display = "none";
                           </script>';
                         }
                         ?>                    
                           
                            
                            <label style="margin-left: 30px"> Màu </label>
                            <div class="radio_left">
                        <input type="radio" style=" margin-left: 60px;" value="<?=$row['Mau1'] ?>" id="mau1" name="mau" checked> 
                        <label> <?=$row['Mau1'] ?> </label>
                        <input type="radio" style="" value="<?=$row['Mau2'] ?>" id='mau2' name="mau"> 
                        <label>
                        <?=$row['Mau2'] ?>
                         </label>
                        <input type="radio" style=" " value="<?=$row['Mau3'] ?>" id="mau3" name="mau" > 
                        <label> <?=$row['Mau3'] ?> </label>
                        <input type="radio" style="" value="<?=$row['Mau4'] ?>" id='mau4' name="mau"> 
                        <label>
                        <?=$row['Mau4'] ?>
                         </label>
                         </div>
                    
                        <br>
                            <label style="margin-left: 30px"> Size </label>
                            <div class="radio_left">
                            <input type="radio" style=" margin-left: 60px;" value="<?=$row['size1'] ?>" id="size1" name="size" checked> 
                        <label> <?=$row['size1'] ?> </label>
                        <input type="radio" style=" " value="<?=$row['size2'] ?>" id='size2' name="size"> 
                        <label>
                        <?=$row['size2'] ?>
                         </label>
                        <input type="radio" style="" value="<?=$row['size3'] ?>" id="size3" name="size" > 
                        <label> <?=$row['size3'] ?> </label>
                        <input type="radio" style="" value="<?=$row['size4'] ?>" id='size4' name="size"> 
                        <label>
                        <?=$row['size4'] ?>
                        </div>
                        <!-- <br>  -->
                        <div id="box_soluong">

                            
                            
                            <label class="soluong "  style="font-size: 20px;">Số Lượng </label>
                            <div style="" class="test_soluong">

                                <input  type="button" name="" value="+" id="cong" style="color: while;" >
                                <input type="text"  name="soluong"  id="so" value=1> </input>
                                <input type="button" name="" value="-" id="tru">
                            </div>
                        </div>
                        
                        <hr style="width:55%; margin-left: 70px; margin-top:20px;">
                        <p class="GioiThieu">
                        <?php echo $row['GioiThieu'] ?> 
                        </p>
                        <a href="giohang.php?Stt=<?=$Stt=$row['Stt']; ?>">

                        <input type="hidden" name="tensp" value="<?=$Ten=$row['TenGiay'] ?>">
                        <input type="hidden" name="img" value="<?=$img=$row['img'] ?>">
                        <input type="hidden" name="Gia" value="<?=$Gia=$row['Gia'] ?>">
                        
                        <?php $mau ?>
                        <?php $size ?>

                        
                        <input type="submit" name="submit" id="Them" value="Thêm vào giỏ hàng">
                     </a>
                        <lable>
                        <input type="submit" name="submit" id="Mua" value="Mua Ngay">        
                     </lable>
                     </td>
                  
                        
                    
                    <?php } 
                   ?>
                   
<!-- Chi tiết -->

<?php
                    while($rowCT = mysqli_fetch_assoc($queryCT)) {?>
                   
                        <div id="anh_phu">
                        <div>
                            <img src="./img/<?php echo $rowCT['img1'] ?>" class="thu1" id="thu1" onmouseover="changeImage('thu1')">

                        </div>
                        <div>

                            <img src="./img/<?php echo $rowCT['img2'] ?>" class="thu2" id="thu2" onmouseover="changeImage('thu2')">
                        </div>
                        <div>
                            <img src="./img/<?php echo $rowCT['img3'] ?>" class="thu3" id="thu3" onmouseover="changeImage('thu3')">

                        </div>
                        <div>

                            <img src="./img/<?php echo $rowCT['img4'] ?>" class="thu4" id="thu4" onmouseover="changeImage('thu4')">
                        </div>
                        <div>

                            <img src="./img/<?php echo $rowCT['img5'] ?>" class="thu5" id="thu5" onmouseover="changeImage('thu5')">
                        </div>
                    
                     </div>
                    
                    
                    
                    <?php } 
                   ?>

    <!-- text -->
                
        <!-- <input type="submit" id="submit" name="submit" value="CHi Tiết" > -->

</form>
            </div>

                </table>


                <div class="test" style="width: 100%;">
                <form method="post" action="" class="Vay" style="">

                
<?php
            while($row = mysqli_fetch_assoc($queryAll)) {?>
              <?php
             
             ?>
             
             <div class="img_vay" onclick="vay()" style=" ">

             
                       <a href="chitietG.php?Stt=<?=$Stt=$row['Stt'] ?>">
            
                
                 <img style="  margin-left: 20px;" id="img_chinh" src ='./img/<?php echo $img = $row['img'] ?> ' />
            
                </a>
                <br>
                <br>
                
                
                <div style="margin-left:60px; font-size: 17px; width: 200px;" class="TieuDe"> 
                      <?php echo $row['TenGiay'] ?> 
                    </div>
            
                        
                <hr style=" ">
                <p class="gia" style="">
                 <?php echo $row['Gia'] ?>   
            
                </p>


            </div>
            
            <?php } 
        ?>
        </form>
 </div>


            <!-- <img src="a0.jpg">
        </div>
    </div> -->

    <p class="output"></p>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js">
    </script>

        <script src="./js/layanh.js" > </script>
        

 <srcipt src="./js/chitiet.js"> </srcipt>
 <script src="./js/chitiet.js"></script>



        <?php 

        
        

      //lưu database
      
      
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
         VALUES('' , '".$Ten."', '".$Gia* $soluong."', '".$img."', '".$soluong."' , '".$Stt."')";
            mysqli_query ($dbb , $queryy);

        
       
        
        
            $trung = "DELETE n1
            FROM ds_giohang n1, ds_giohang n2
            WHERE n1.img = n2.img AND n1.STT > n2.STT";
            mysqli_query ($dbb , $trung); 
            



            $dbb->close();
 
    }
// check database



?>
   
   

   <footer style="width: 86% ">
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
                 <li><a href="https://www.facebook.com/Stantioshop"><i class="fa fa-facebook"></i></a></li>
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
                 <li><a href="index.php">Trang Chủ</a></li>
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
<script>

function changeImage(id) {
    let Img = document.getElementById(id).getAttribute('src');
    document.getElementById(id).style.border = "3px solid coral";

    document.getElementById("img").setAttribute('src', Img);
    document.getElementById("img_fake").setAttribute('src', Img);
    document.getElementById("magnifier").setAttribute("style", "background-image: url(" + Img + "");

}



    var mau1 = document.getElementById("mau1").value;

if (mau1 == '') {

    document.getElementById("mau1").style.display = "none";
}
var mau2 = document.getElementById("mau2").value;

if (mau2 == '') {

    document.getElementById("mau2").style.display = "none";
}
var mau3 = document.getElementById("mau3").value;

if (mau3 == '') {

    document.getElementById("mau3").style.display = "none";
}
var mau4 = document.getElementById("mau4").value;

if (mau4 === '') {

    document.getElementById("mau4").style.display = "none";
}

//test


//size

var size1 = document.getElementById("size1").value;

if (size1 == '') {

    document.getElementById("size1").style.display = "none";
}
var size2 = document.getElementById("size2").value;

if (size2 == '') {

    document.getElementById("size2").style.display = "none";
}
var size3 = document.getElementById("size3").value;

if (size3 == '') {

    document.getElementById("size3").style.display = "none";
}
var size4 = document.getElementById("size4").value;

if (size4 === '') {

    document.getElementById("size4").style.display = "none";
}

//test


   //Lấy Ảnh
   let thu1 = document.getElementById("thu1").getAttribute('src');
      if(thu1 === './img/') {
        document.getElementById("thu1").style.display = "none";
      }
      let thu2 = document.getElementById("thu2").getAttribute('src');
      if(thu2 === './img/') {
        document.getElementById("thu2").style.display = "none";
      }
      let thu3 = document.getElementById("thu3").getAttribute('src');
      if(thu3 === './img/') {
        document.getElementById("thu3").style.display = "none";
      }
        let thu4 = document.getElementById("thu4").getAttribute('src');
      if(thu4 === './img/') {
        document.getElementById("thu4").style.display = "none";
      }
      let thu5 = document.getElementById("thu5").getAttribute('src');
      if(thu5 === './img/') {
        document.getElementById("thu5").style.display = "none";
      }
       

                var SoLuong= 0;
                var tien =  document.getElementById("Gia").text;
                var cong = document.getElementById("cong");
                var so =  document.getElementById("so").value;
                SoLuong == Number(so);
                SoLuong++;

                cong.addEventListener("click", (e) => {
                    SoLuong++;
                 
                  document.getElementById("so").value = SoLuong;
                //   console.log(SoLuong);
                //   console.log(so++);

                  
                  var thanhtien = tien * SoLuong + ".000";

                  document.getElementById("Gia").innerHTML = thanhtien;
                 // console.log(tien);

                });

                var tru = document.getElementById("tru");
                tru.addEventListener("click", (e) => {
                 
                  SoLuong == Number(so);
                  SoLuong--;
                  document.getElementById("so").value = SoLuong;
                //   console.log(SoLuong);
                //   console.log(so++);    
                  var thanhtien = tien * SoLuong + ".000";
                  document.getElementById("Gia").innerHTML = thanhtien;
                //   console.log(tien);
                  if(SoLuong  < 1){
                      document.getElementById("so").innerHTML = 1;
                        alert("SỐ Lượng Phải Lớn Hơn ");
                        
                  document.getElementById("Gia").innerHTML = tien;
                        
                    }

                });
                
               var img = document.getElementById("img").text;
               var Gia = document.getElementById("Gia").text;

               console.log(img);
               

               //test

                
               
// var them = document.getElementById('Them');
// them.addEventListener("click", (e) => {
//     if(document.getElementById('mau1').checked) {
    
//     }
//     else {
//         window.alert("Nhập Màu");
        
//         // window.location="chitiet.php";
        

//         // document.getElementById("gui").setAttribute('action', "chitiet.php");
//     }
// });

    
// var them = document.getElementById('Them');
// them.addEventListener("click", (e) => {
//     if(document.getElementById('s').checked) {
        
//         }else if(document.getElementById('m').checked) {

//     }else if(document.getElementById('xl').checked) {

// }else if(document.getElementById('xxl').checked) {

// }
//     else {
//         alert("Nhập Size");
//         // return;
//         // window.location="chitiet.php";
//     }
// });



</script>

</html>


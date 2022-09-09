<?php
        require_once("./db.php"); 
        // require 'css/css.css';
        // include("../css/css.css");
        
    $ten = $pass =$Stt = $img= $Tim= "";

    if(isset($_COOKIE['name']) ) {
        $ten = $_COOKIE['name'];
    }
    if(isset($_COOKIE['pass']) ){
        $pass = $_COOKIE['pass'];
    }

        $sql = "SELECT * FROM sql_vay where Stt <'11'";
        $query = mysqli_query($connet , $sql);

       
        // $sql6 = "SELECT * FROM sql_vay where Stt > '5'";
        // $query6 = mysqli_query($connet , $sql6);
   

        setcookie("Stt", $Stt , time() + 30 , '/');
        setcookie("img", $img , time() + 30 , '/');

        // Kết nối database vay du tiec

        // $connetDT = mysqli_connect("localhost", "root" ,"" ,"vaydutiec");

        // if($connetDT){
        //     mysqli_query($connetDT , "SET NAMES 'UTF8' ");
        //     // echo "ket noi thanh cong";
        // }
        // else {
        //     echo "ket noi that bai";
        // }
       

        $sqlDT = "SELECT * FROM sql_vaydutiec where Stt <'11'";
        $queryDT = mysqli_query($connet , $sqlDT);

        
        // Kết nối database Chan Vay

        // $connetCV = mysqli_connect("localhost", "root" ,"" ,"chanvay");

        // if($connetCV){
        //     mysqli_query($connetCV , "SET NAMES 'UTF8' ");
        //     // echo "ket noi thanh cong";
        // }
        // else {
        //     echo "ket noi that bai";
        // }
       

        $sqlCV = "SELECT * FROM sql_chanvay where Stt <'11'";
        $queryCV = mysqli_query($connet , $sqlCV);


        
        $sqlAo = "SELECT * FROM sql_ao where Stt <'11'";
        $queryAo = mysqli_query($connet , $sqlAo);

        
        $sqlTui = "SELECT * FROM sql_tui where Stt <'11'";
        $queryTui = mysqli_query($connet , $sqlTui);

        // Giày

        
        
        // Kết nối database Chan Vay

        // $connetG = mysqli_connect("localhost", "root" ,"" ,"giay");

        // if($connetG){
        //     mysqli_query($connetG , "SET NAMES 'UTF8' ");
        //     // echo "ket noi thanh cong";
        // }
        // else {
        //     echo "ket noi that bai";
        // }
       

        $sqlG = "SELECT * FROM sql_giay where Stt <'11'";
        $queryG = mysqli_query($connet , $sqlG);


        




        //Tìm Kiếm

        if(isset($_POST['Tim'])){
            $Tim = $_POST['Tim'];
        }
        
        
        
        setcookie("Tim", $Tim , time() + 30 );
        
        

        if (isset($_POST['submit'])  && $Tim != ""){
            header("Location: TimKiem.php?Tim=<?=$Tim ?>");
            
        }
      
      
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stantio-Shop</title>
    <link rel="stylesheet" href="./css/css.css">
    <link rel="stylesheet" href="./css/cssindex.css">
    <link rel="icon" href="./img/bia.jpg"> 
    <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    
    

    
</head>
<style>
   

 </style>

<body style="width:100%">
    <div class="phu" id="phu" > </div>
    <div class="phutrang" id="phutrang" style="background-color: azure;"  > 
    <!-- <button class="close" id="close" > X </button> -->
    <br>
    <br>
    <br>
    <h2 style="margin-top: 70px; text-decoration: none;" > <a href="index.php" style="text-decoration: none; color: black;" class="tc" > Trang Chủ </a></h2>
    <h2 ><a href="phanloai.php" style="text-decoration: none;color: black;">  Phân Loại  </a>
    </h2>
    <h2 >Về Chúng Tôi</h2>
    <h2 >Sự Kiện</h2>
    <h3><?php echo $ten ?>
    
</div>

    
    <div class="header" id="header" style=' width: 100%;background-color: azure; position: fixed; z-index: 10000000;'>
       <div>

           <a href="index.php">
               <img class="title" style="" src="./img/bia.jpg"> 
            </a>
        </div>
                 <div>

                     <a href="index.php" style="text-decoration: none;"> 
                        
                       
                        <h2 class="h2" id="tc" style="text-decoration: none; " >
                            Trang Chủ
                        </h2>
                    </a>
                </div>
              <div>

                  
                  <a href="phanloai.php" style="color: black; text-decoration: none;">
                 
                    <h2 class="h2" id="showw" style="color: black;" >Phân Loại 
                    <i class="fa-solid fa-arrow-down"></i>
                    </a>
                    <ul id='menu_ul'>
                   <li>
                        <a href="phanloai.php">Váy Màu Hè </a>
                    </li>
                    <li>          
                    <a href="phanloaiDT.php">Váy Dự Tiệc </a>
                    </li>   
                    <li>          
                    <a href="phanloaiAo.php">Áo </a>
                    </li> 
                    <li>          
                    <a href="phanloaiChanVay.php">Chân Váy + Quần </a>
                    </li> 
                    <li>          
                    <a href="phanloaiTui.php">Túi </a>
                    </li>     
                    </ul>
                    </h2> 
                
            </div>
                      
                    
              <div>

                  <h2 class="h2">Về Chúng Tôi</h2>
               
            </div>
               
                    <h2 class="h2" id='sk'>Sự Kiện</h2>
               <div>

                   <form method="post" id="post" >
                      
                           <input type="submit" value="Tìm"  style=" " name="submit" id="submit"  >
                       
                          
                               <input type="text" style=" " name="Tim" id="Tim">
                         
                               
                               <i class="fa-solid fa-magnifying-glass" id="cc_tim" style=" "></i>
                            </form>
                        </div>
              <div>

                  <a href = "giohang.php">
                      <i class="fa-solid fa-cart-arrow-down" id="gio" style="margin-top:27px;  font-size: 25px; color: coral  "></i>
                    </a>
                    <div class="phuthem"> Thêm vào thành công </div>
                
            </div>
            <div >

                <a href="DangKy.php">
                    
                    <a href="DangKy.php" class="dn" style="text-decoration: none;"> 
                        <?php if($ten == "") { 

                        echo "Đăng Ký ";
                    }
                   
                    else { 
                         
                        echo '<a class="tendn">'.$ten.'</a>';

                    }
                    ?>
                   </a>
                </a>
                </div>
                    <div>

                        <label class="menu" id="menu" onclick="menu()">
                            <i class="fa-solid fa-bars" id="bacham"></i>
                        </label>
                        
                    </div>
          
    </div>

    <!-- <div class="timkiem_chinh">
        <div class="timkiem_a">
            <p style="margin-top: 8px; color: white">SẢN PHẨM</p>
        </div>
        <input type="text " class="timkiem" placeholder="    TÊN SẢN PHẨM "> </input>
        <input type="button" class="timkiem_img" value="Tìm"> </input>
    </div> -->


            <!-- <td class="left ">
                <h2 class="h ">Stantio</h2> <br>
                <a class="h4 ">Ngày Thành Lập: 5/2/2022</a><br>
                <a class="h4 ">Sản Phẩm Đã Bán: 1812</a>
                <a></a>
                <br>
                <hr>
            </td> -->
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="box_img">
                    <div></div>
                <div class="img" style="position: relative;" >
                    <button class="truoc" id="truoc" style='margin-left: 1315px;'><i class="fa-solid fa-arrow-right-long"></i></button>
                    <button class="sau" id="sau" style='margin-left: 170px;'><i class="fa-solid fa-arrow-left-long"></i></button>
       
                    <img src='./img/logo.png' id="img"  style=" border: 0.5px solid grey;">
                </div>
                    <div></div>
                </div>

                    <a href="https://www.facebook.com/Stantioshop">
                <i class="fa-brands fa-facebook-messenger" id="mess"></i>
                </a>

                <i class="fa-solid fa-phone-flip" id="phone">
                <div id="sdt">
                  <p id="i">  0589401978 </p>
                </div>
                </i>
            
   

     
       <div class="box">

             <div>
                </div>
  
        <table class="VayNgan"   >
            <p class="titer" style="margin-top: 100px; font-size: 20px; " value="Dành Cho Mùa Hè" >
                 <span >  Dành Cho Mùa Hè </span>
                 <p >
              
                </p>
                </p>
                <div class="phuaa" style=" ">
                      <form method="post" action="" class="Vay" >
                
                
                  <?php
                        while($row = mysqli_fetch_assoc($query)) {?>
                          <?php
                         
                         ?>
                        
                         
                         <div class="img_vay" style="  ">
                         <div id="square" style="">
                           <?php echo '<div id="sql_gia">'.$row['GiamGia']. "% </div>" ?>
                        </div>
                            <div id="triangle_down" style=""></div>
                         
                                   <a href="chitiet.php?Stt=<?=$Stt=$row['Stt'] ?>"  >
                        
                            
                             <img style=" border: 1px solid coral;  " id="img_chia" src ='./img/<?php echo $img = $row['img'] ?> ' />
                        
                            </a>
                           
                            <br>
                            <br>
                            
                            
                            <div style="font-size: 17px; " class="TieuDe"> 
                                  <?php echo $row['TenVay'] ?> 
                                </div>
                        
                                    
                            <hr id="id_hr" style=" ">
                            <p class="gia" style=" color: coral; width: 90%;">
                                <?php echo '<del style="font-size: 14px;" &nbsp;&nbsp;>'.round(($row['Gia']*($row['GiamGia']*100)/1000 ),3).'.000 </del>'  
                                 ,'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['Gia'] ?>   
                                
                               
                        
                            </p>
                       
                     
                        </div>
                        
                        <?php } 
                    ?>
                           <a href="XemThemMH.php" id="a"> 
                    <div class="them"> Xem thêm </div>
                     </a>
                       </form>
                      </div>
                    </div>
                      
                            
                 
                            
                    <!-- <input type="submit" id="submit" name="submit" value="CHi Tiết" > -->
         
    
                  

             </table>

             <div>
        </div>

                        </div>


  
                        <div class="box">

        <div>
        </div>

        <table class="VayNgan"   >
        <p class="titer" style="margin-top: 100px; " value="Dành Cho Mùa Hè" >
                                Sét Váy
        <p >
        
        </p>
        </p>
        <div class="phuaa" style=" ">
                <form method="post" action="" class="Vay" >
        
   
     <?php
           while($row = mysqli_fetch_assoc($queryDT)) {?>
             <?php
            
            ?>
           
            
            <div class="img_vay" style="  ">
            <div id="square" style="">
              <?php echo '<div id="sql_gia">'.$row['GiamGia']. "% </div>" ?>
           </div>
               <div id="triangle_down" style=""></div>
            
                      <a href="chitietDT.php?Stt=<?=$Stt=$row['Stt'] ?>"  >
           
               
                <img style=" border: 1px solid coral;  " id="img_chia" src ='./img/<?php echo $img = $row['img'] ?> ' />
           
               </a>
              
               <br>
               <br>
               
               
               <div style="font-size: 17px; " class="TieuDe"> 
                     <?php echo $row['TenVay'] ?> 
                   </div>
           
                       
               <hr id="id_hr" style=" ">
               <p class="gia" style=" color: coral; width: 90%;">
                   <?php echo '<del style="font-size: 14px;" &nbsp;&nbsp;>'.round(($row['Gia']*($row['GiamGia']*100)/1000 ),3).'.000 </del>'  
                    ,'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['Gia'] ?>   
                   
                  
           
               </p>
          
        
           </div>
           
           <?php } 
       ?>
              <a href="XemThemDT.php" id="a"> 
       <div class="them"> Xem thêm </div>
        </a>
          </form>
         </div>
       </div>
         
               
    
               
       <!-- <input type="submit" id="submit" name="submit" value="CHi Tiết" > -->


       </table>

<div>
</div>

           </div>
   
       <div class="box">

<div>
   </div>

<table class="VayNgan"   >
<p class="titer" style="margin-top: 100px; " value="Dành Cho Mùa Hè" >
               Áo
   <p >
 
   </p>
   </p>
   <div class="phuaa" style=" ">
         <form method="post" action="" class="Vay" >
   
   
     <?php
           while($row = mysqli_fetch_assoc($queryAo)) {?>
             <?php
            
            ?>
           
            
            <div class="img_vay" style="  ">
            <div id="square" style="">
              <?php echo '<div id="sql_gia">'.$row['GiamGia']. "% </div>" ?>
           </div>
               <div id="triangle_down" style=""></div>
            
                      <a href="chitietAo.php?Stt=<?=$Stt=$row['Stt'] ?>"  >
           
               
                <img style=" border: 1px solid coral;  " id="img_chia" src ='./img/<?php echo $img = $row['img'] ?> ' />
           
               </a>
              
               <br>
               <br>
               
               
               <div style="font-size: 17px; " class="TieuDe"> 
                     <?php echo $row['TenVay'] ?> 
                   </div>
           
                       
               <hr id="id_hr" style=" ">
               <p class="gia" style=" color: coral; width: 90%;">
                   <?php echo '<del style="font-size: 14px;" &nbsp;&nbsp;>'.round(($row['Gia']*($row['GiamGia']*100)/1000 ),3).'.000 </del>'  
                    ,'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['Gia'] ?>   
                   
                  
           
               </p>
          
        
           </div>
           
           <?php } 
       ?>
              <a href="XemThemAo.php" id="a"> 
       <div class="them" > Xem thêm </div>
        </a>
          </form>
         </div>
       </div>
         
               
    
               
       <!-- <input type="submit" id="submit" name="submit" value="CHi Tiết" > -->


     

</table>

<div>
</div>

           </div>
       
  
         <div class="box">

<div>
   </div>

<table class="VayNgan"   >
<p class="titer" style="margin-top: 100px; " value="Dành Cho Mùa Hè" >
                Chân váy + Quần
   <p >
 
   </p>
   </p>
   <div class="phuaa" style=" ">
         <form method="post" action="" class="Vay" >
   
   
     <?php
           while($row = mysqli_fetch_assoc($queryCV)) {?>
             <?php
            
            ?>
           
            
            <div class="img_vay" style="  ">
            <div id="square" style="">
              <?php echo '<div id="sql_gia">'.$row['GiamGia']. "% </div>" ?>
           </div>
               <div id="triangle_down" style=""></div>
            
                      <a href="chitietCV.php?Stt=<?=$Stt=$row['Stt'] ?>"  >
           
               
                <img style=" border: 1px solid coral;  " id="img_chia" src ='./img/<?php echo $img = $row['img'] ?> ' />
           
               </a>
              
               <br>
               <br>
               
               
               <div style="font-size: 17px; " class="TieuDe"> 
                     <?php echo $row['TenVay'] ?> 
                   </div>
           
                       
               <hr id="id_hr" style=" ">
               <p class="gia" style=" color: coral; width: 90%;">
                   <?php echo '<del style="font-size: 14px;" &nbsp;&nbsp;>'.round(($row['Gia']*($row['GiamGia']*100)/1000 ),3).'.000 </del>'  
                    ,'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['Gia'] ?>   
                   
                  
           
               </p>
          
        
           </div>
           
           <?php } 
       ?>
              <a href="XemThemCV.php" id="a"> 
       <div class="them"> Xem thêm </div>
        </a>
          </form>
         </div>
       </div>
         
               
    
               
       <!-- <input type="submit" id="submit" name="submit" value="CHi Tiết" > -->


     

</table>

<div>
</div>

           </div>



        
       <div class="box">

<div>
   </div>

<table class="VayNgan"   >
<p class="titer" style="margin-top: 100px; " value="Dành Cho Mùa Hè" >
Giày-Dép
   <p >
 
   </p>
   </p>
   <div class="phuaa" style=" ">
         <form method="post" action="" class="Vay" >
   
   
     <?php
           while($row = mysqli_fetch_assoc($queryG)) {?>
             <?php
            
            ?>
           
            
            <div class="img_vay" style="  ">
            <div id="square" style="">
              <?php echo '<div id="sql_gia">'.$row['GiamGia']. "% </div>" ?>
           </div>
               <div id="triangle_down" style=""></div>
            
                      <a href="chitietG.php?Stt=<?=$Stt=$row['Stt'] ?>"  >
           
               
                <img style=" border: 1px solid coral;  " id="img_chia" src ='./img/<?php echo $img = $row['img'] ?> ' />
           
               </a>
              
               <br>
               <br>
               
               
               <div style="font-size: 17px; " class="TieuDe"> 
                     <?php echo $row['TenGiay'] ?> 
                   </div>
           
                       
               <hr id="id_hr" style=" ">
               <p class="gia" style=" color: coral; width: 90%;">
                   <?php echo '<del style="font-size: 14px;" &nbsp;&nbsp;>'.round(($row['Gia']*($row['GiamGia']*100)/1000 ),3).'.000 </del>'  
                    ,'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['Gia'] ?>   
                   
                  
           
               </p>
          
        
           </div>
           
           <?php } 
       ?>
              <a href="XemThemGiay.php" id="a"> 
       <div class="them"> Xem thêm </div>
        </a>
          </form>
         </div>
       </div>
         
               
    
               
       <!-- <input type="submit" id="submit" name="submit" value="CHi Tiết" > -->


       <div class="box">

             <div>
                </div>
  
        <table class="VayNgan"   >
            <p class="titer" style="margin-top: 100px; " value="Dành Cho Mùa Hè" >
                    Túi Xinh
                <p >
              
                </p>
                </p>
                <div class="phuaa" style=" ">
                      <form method="post" action="" class="Vay" >
                
                
                  <?php
                        while($row = mysqli_fetch_assoc($queryTui)) {?>
                          <?php
                         
                         ?>
                        
                         
                         <div class="img_vay" style="  ">
                         <div id="square" style="">
                           <?php echo '<div id="sql_gia">'.$row['GiamGia']. "% </div>" ?>
                        </div>
                            <div id="triangle_down" style=""></div>
                         
                                   <a href="chitiettui.php?Stt=<?=$Stt=$row['Stt'] ?>"  >
                        
                            
                             <img style=" border: 1px solid coral;  " id="img_chia" src ='./img/<?php echo $img = $row['img'] ?> ' />
                        
                            </a>
                           
                            <br>
                            <br>
                            
                            
                            <div style="font-size: 17px; " class="TieuDe"> 
                                  <?php echo $row['TenTui'] ?> 
                                </div>
                        
                                    
                            <hr id="id_hr" style=" ">
                            <p class="gia" style=" color: coral; width: 90%;">
                                <?php echo '<del style="font-size: 14px;" &nbsp;&nbsp;>'.round(($row['Gia']*($row['GiamGia']*100)/1000 ),3).'.000 </del>'  
                                 ,'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['Gia'] ?>   
                                
                               
                        
                            </p>
                       
                     
                        </div>
                        
                        <?php } 
                    ?>
                           <a href="XemThemTui.php" id="a"> 
                           <div class="them" style="margin-top:330px; margin-left: -250px;"> Xem thêm </div>

                     </a>
                       </form>
                      </div>
                    </div>
                      
                            
                 
                            
                    <!-- <input type="submit" id="submit" name="submit" value="CHi Tiết" > -->
         
    
                  

             </table>

             <div>
        </div>

                        </div>


        <footer style="width:86%">
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
                 <li><a href="https://www.instagram.com/stantioshop/"><i class="fa fa-instagram"></i></a></li>
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
<script type="text/babel">
    // const Header = ReactDOM.render(Header, document.getElementById("header"));


</script>
<script>

    
var phu = document.getElementById("phu");
    phu.addEventListener("click" , (e) => {
        document.getElementById("phu").style.display = "none";
        document.getElementById("phutrang").style.display = "none";
     
    });    
    
   



    var i = 0;

    var truoc = document.getElementById("truoc");
    truoc.addEventListener("click", (e) => {
        document.getElementById("img").src = "./img/logo" + i + ".png";
        if (i == 5) {
            i = 0;
        }
        i++;
    });

    var sau = document.getElementById("sau");
    sau.addEventListener("click", (e) => {
        document.getElementById("img").src = "./img/logo" + i + ".png";
        console.log(i);
        if (i <= 1) {
            i = 5;
        }
        i--;
    });
    var tim = 0;

    function time() {
        for (var m = 0; m < 5; m++) {
            setTimeout(time1, 2000 * m);
        }
      
    }
    time();

    function time1() {
        document.getElementById("img").src = "./img/logo" + tim++ + ".png";
        console.log(tim);
    }


    // function vay() {
    //     location.href = "chitiet.php";
    //     console.log("a");
    // }

  

    var giohang = document.getElementById("GioHang");
    giohang.addEventListener("click" , (e) => {
        location.href = "giohang.php";
        
    });

</script>
    <script src="./js/index.js"> </script>
</html>
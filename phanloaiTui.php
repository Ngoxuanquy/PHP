<?php
      require_once("db.php"); 
        
      $a= "";
      $ten = $pass =$Stt = $img= "";
  
      if(isset($_COOKIE['name']) ) {
          $ten = $_COOKIE['name'];
      }
      if(isset($_COOKIE['pass']) ){
          $pass = $_COOKIE['pass'];
      }
  
          $sql = "SELECT * FROM sql_tui ";
          $query = mysqli_query($connet , $sql);
  
         
          $sql6 = "SELECT * FROM sql_tui where Stt > '5'";
          $query6 = mysqli_query($connet , $sql6);
     
  
          setcookie("Stt", $Stt , time() + 30 , '/');
          setcookie("img", $img , time() + 30 , '/');
  
          // Kết nối database
  
        //   $connetDT = mysqli_connect("localhost", "root" ,"" ,"vaydutiec");
  
        //   if($connetDT){
        //       mysqli_query($connetDT , "SET NAMES 'UTF8' ");
        //       // echo "ket noi thanh cong";
        //   }
        //   else {
        //       echo "ket noi that bai";
        //   }
        //   $sqlDT = "SELECT * FROM ds_vaydutiec where Stt < '6'";
        //   $queryDT = mysqli_query($connetDT , $sqlDT);
  
      

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stantio-Shop</title>

    <link rel="stylesheet" href="./css/csspl.css">
    
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

    
    
    <div class="phuden" id="phuden">
    
 
                </div>
                <div class="menu" id="menu" syle="background-color: azure;">
                    <button style="width: 40px; height:30px;position: relative; left: -130px; top: -10px; " id="close">X</button>
            <div class="VDT" id="VMH" value="aaaaa" style=" margin-top: 70px;"> <a href="phanloai.php" style="color: black;" > Váy Mùa Hè   </a></div>         
          <div class="VDT" id="VDT"> <a href="phanloaiDT.php" style="color: black;">Váy Dự Tiệc   </a></div>
          <div class="VDT" id="VDT"> <a href="phanloaiGiay.php" style="color: black;">Giày </a></div>
          <div class="VDT" id="VDT"> <a href="phanloaiAo.php" style="color: black;">Áo  </a></div>
          <div class="VDT" id="VDT"> <a href="phanloaiChanVay.php" style="color: black;">Chân Váy  </a></div>
          <div class="VDT" id="VDT"> <a href="phanloaiTui.php" style="color: black;">Túi  </a></div>
            </div>
    
    
            <div class="header" id="header" style=' width: 100%;background-color: azure; position: fixed; z-index: 10000000;'>
       <div>

           <a href="index.php">
               <img class="title" style="" src="./img/bia.jpg"> 
            </a>
        </div>
                 <div>

                     <a href="index.php" style="text-decoration: none;"> 
                        
                        <h2 class="h2" style=" color:black;  text-decoration: none; " >
                            Trang Chủ
                        </h2>
                    </a>
                </div>
              <div>

                  
                  <a href="phanloai.php" style=" color:black;text-decoration: none;">
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
             
                
            </div>
            <div >

                <a href="DangKy.php">
                    
                    <a class="dn" > 
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
                    <label class="menu1" id="menu1" onclick="menu()">
                            <i class="fa-solid fa-bars" id="bacham">
                            </i>
                        </label>
                      
                        <!-- <i class="fa-solid fa-bars" id="bacham"></i> -->
                        
                    </div>
          
    </div>
   
    <b><span id="position"></span></b> 
    
        <div class="tenvay" >
        
        <div class="Name"  >
                   
                   <div class="pl_vay" id="pl_vay" style=" margin-top: 20px; ">
     
                    <a href="phanloai.php" style="color: black;"> Váy Mùa Hè   </a>
                    <div id='vayMH'> </div>
                   </div>
                   <div class="pl_vay" id="pl_vay"> <a href="phanloaiDT.php" style="color: black;">Váy Dự Tiệc   </a>
                   <div id='vayMH'> </div>
               </div>
                   <div class="pl_vay" id="pl_vay"> <a href="phanloaiGiay.php" style="color: black;">Giày </a>
                   <div id='vayMH'> </div>
               </div>
                   <div class="pl_vay" id="pl_vay"> <a href="phanloaiAo.php" style="color: black;">Áo  </a>
                   <div id='vayMH'> </div>
               </div>
                   <div class="pl_vay" id="pl_vay"> <a href="phanloaiChanVay.php" style="color: black;">Chân Váy  </a>
               
                   <div id='vayMH'> </div>
               </div>
                   <div class="pl_vay" id="pl_vay"> <a href="phanloaiTui.php" style="color: #FF4500;">Túi  </a>
                   <div id='vayMH'> </div>
               </div>


               </div>

              <div class="test_Vay">
            

            <form method="post" action="" class="Vay" id="Vay">
            
             <?php
                        while($row = mysqli_fetch_assoc($query)) {?>
                          <?php
                         
                         ?>                                    
                         <div class="img_vay" id="img_vay" >

                                    <a href="chitiettui.php?Stt=<?=$Stt=$row['Stt'] ?>">
                                                      
                             <img style="" id="img_chinh" src ='./img/<?php echo $img = $row['img'] ?> '/>
                            </a>
                            <br>
                            <br>
                            <div class="TieuDe" style=""> 
                                  <?php echo $row['TenTui'] ?> 
                            </div>
                            <hr style="margin-top:10px;  ">
                            <p class="gia" style="">
                             <?php echo $row['Gia'] ?>     
                            </p>
                        </div>      
                        <?php } 
                      ?>
                      </form>
                        </div>
                      
            </div>
                  
   
                    <!-- <input type="submit" id="submit" name="submit" value="CHi Tiết" > -->

  
</body>

        <script>

window.addEventListener("scroll", function(event) { 

    var scroll_y = this.scrollY; 
    console.log(scroll_y);

    if(scroll_y > 800){
        document.getElementById("Name").style.position = "relative";
        document.getElementById("Name").style.width = "280px";
        document.getElementById("Name").style.marginRight = "-250px";

        // document.getElementById("Name").style.display = "inline";

        document.getElementById("Vay").style.display = "inline";
        document.getElementById("Vay").style.marginLeft = "-500px";


    }
    else{
        document.getElementById("Name").style.position = "fixed";

    }
});

               var VMH = document.getElementById("VMH");
    VMH.addEventListener("click" , (e) => {
        location.href = "phanloai.php";
        console.log("a")
    });

    var VDT = document.getElementById("VDT");
               VDT.addEventListener("click" , (e) => {
                location.href = "phanloaiDT.php";

                console.log("B")  
    });

    
    var phuden = document.getElementById("phuden");
    phuden.addEventListener("click" , (e) => {
        document.getElementById("phuden").style.display = "none";
        document.getElementById("menu").style.display = "none";

    });
 var bacham = document.getElementById("bacham");
 bacham.addEventListener("click" , (e) => {
        document.getElementById("phuden").style.display = "block";
        document.getElementById("menu").style.display = "block";

    });

    var close = document.getElementById("close");
    close.addEventListener("click" , (e) => {
        document.getElementById("phuden").style.display = "none";
        document.getElementById("menu").style.display = "none";

    });

    



            </script>

</html>
<?php
      require_once("db.php"); 
        
      $a= $Tim= "";
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
  
          // Kết nối database
  
          $sq = "SELECT * FROM sql_vay  where TenVay like '%$Tim%' ";
          $quer = mysqli_query($connet , $sq);
  
  
          $sqlDT = "SELECT * FROM sql_vaydutiec where TenVay like '%$Tim%' ";
          $queryDT = mysqli_query($connet , $sqlDT);
  
          
          $sqlCV = "SELECT * FROM sql_chanvay where TenVay like '%$Tim%'  ";
          $queryCV = mysqli_query($connet , $sqlCV);
  
  
          $sqlAo = "SELECT * FROM sql_ao where TenVay like '%$Tim%'  ";
          $queryAo = mysqli_query($connet , $sqlAo);
        
   
          $sqlG = "SELECT * FROM sql_giay  where TenGiay like '%$Tim%' ";
          $queryG = mysqli_query($connet , $sqlG);
  
          $sqlTui = "SELECT * FROM sql_tui  where TenTui like '%$Tim%' ";
          $queryTui = mysqli_query($connet , $sqlTui);
  
          //tìm Kiếm
          
          if(isset($_POST['Tim'])){
              $Tim = $_POST['Tim'];
          }
          
          
          // echo $Tim;
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
    <title>Document</title>
    <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        /* width: 1500px; */
    }
    
    body {
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        display: inline-block;
    }
    
    .title {
        font-size: 40px;
        font-family: Fredericka the Great, cursive;
        /* margin-left: 170px; */
        margin-top: 10px;
        display: inline-block;
    }
    
    .h2 {
        margin-top: 30px;
        /* margin-left: 50px; */
        font-size: 20px;
    }
    
    .header{
    /* margin-left: -300px; */
         height: 80px;
         display: grid;
         grid-template-columns: 20% 10% 10% 12% 10% 23% 5%  10% ;
         /* grid-column-gap: -20px; */
         text-align: center;
         justify-content: center;
}
#submit{
    transition: 1s linear  ;
    margin-top:35px;
    padding: 0 5px 0 5px;
    border-radius: 6px;

}
    .dn {
        position: absolute;
        right: 40px;
        top: 35px;
        z-index: 10;
        color: black;
    }
    /* //footer */
    
    footer {
        position: relative;
      width: 85%;
    /* height: auto; */
    padding: 50px 100px;
    background: #111;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-top: 1300px;
    }
    
    footer .container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        flex-direction: row;
        /* margin-top: 50px; */
    }
    
    footer .container .noi-dung {
        margin-right: 30px;
    }
    
    footer .container .noi-dung.about {
        width: 40%;
    }
    
    footer .container .noi-dung.about h2 {
        position: relative;
        color: #fff;
        font-weight: 500;
        margin-bottom: 15px;
    }
    
    footer .container .noi-dung.about h2:before {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 50px;
        height: 2px;
        background: #f00;
    }
    
    footer .container .noi-dung.about p {
        color: #999;
    }
    
    .social-icon {
        margin-top: 20px;
        display: flex;
    }
    
    .social-icon li {
        list-style: none;
    }
    
    .social-icon li a {
        display: inline-block;
        width: 40px;
        height: 40px;
        background: #222;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 10px;
        text-decoration: none;
        border-radius: 4px;
    }
    
    .social-icon li a:hover {
        background: #f00;
    }
    
    .social-icon li a .fa {
        color: #fff;
        font-size: 20px;
    }
    
    .links h2 {
        position: relative;
        color: #fff;
        font-weight: 500;
        margin-bottom: 15px;
    }
    
    .links h2 {
        position: relative;
        color: #fff;
        font-weight: 500;
        margin-bottom: 15px;
    }
    
    .links h2::before {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 50px;
        height: 2px;
        background: #f00;
    }
    
    .links {
        position: relative;
        width: 25%;
    }
    
    .links ul li {
        list-style: none;
    }
    
    .links ul li a {
        color: #999;
        text-decoration: none;
        margin-bottom: 10px;
        display: inline-block;
    }
    
    .links ul li a:hover {
        color: #fff;
    }
    
    .contact h2 {
        position: relative;
        color: #fff;
        font-weight: 500;
        margin-bottom: 15px;
    }
    
    .contact h2::before {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 50px;
        height: 2px;
        background: #f00;
    }
    
    .contact {
        width: calc(35% - 60px);
        margin-right: 0 !important;
    }
    
    .contact .info {
        position: relative;
    }
    
    .contact .info li {
        display: flex;
        margin-bottom: 16px;
    }
    
    .contact .info li span:nth-child(1) {
        color: #fff;
        font-size: 20px;
        margin-right: 10px;
    }
    
    .contact .info li span {
        color: #999;
    }
    
    .contact .info li a {
        color: #999;
        text-decoration: none;
    }
    
    .btn {
        display: inline-block;
        background: transparent;
        color: inherit;
        font: inherit;
        border: 0;
        outline: 0;
        padding: 0;
        margin-top: 16px;
        transition: all 200ms ease-in;
        cursor: pointer;
    }
    
    .btn--primary {
        background: #222;
        color: #fff;
        box-shadow: 0 0 10px 2px rgba(0, 0, 0, .1);
        border-radius: 2px;
        padding: 8px 24px;
    }
    
    .btn--primary:hover {
        background: #f00;
    }
    
    .btn--primary:active {
        background: #f00;
        box-shadow: inset 0 0 10px 2px rgba(0, 0, 0, .2);
    }
    
    .form__field {
        width: 90%;
        background: #fff;
        color: #a3a3a3;
        font: inherit;
        box-shadow: 0 6px 10px 0 rgba(0, 0, 0, .1);
        border: 0;
        outline: 0;
        padding: 8px 4px;
    }
    #img_chinh{
        width: 200px;
        height: 250px;

    }
    .tenvay {
        margin-left: 100px;
        margin-top: 10px;
    }

    /* img */

    
.VayNgan {
    width: 80%;
    height: 435px;
    /* background-color: aliceblue; */
    margin-left: 165px;
    margin-top: 60px;
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
    font-size: 25px;
    display: flex;
    border: 1px solid rgb(223, 216, 216);
    /* margin: 10px; */
    position: relative;
}

.img_vay img {
    width: 200px;
    height: 200px;
    margin-top: 20px;
    /* margin-left: 60px; */
}

.img_vay img:hover {
    transform: scale(1.05);
    /* width: 1px; */
}

.h2:hover {
    margin-top: -0.1px;
}

.xemthem {
    position: absolute;
    right: 170px;
    font-size: 20px;
    margin-top: 14px;
    z-index: 1;
}



.VayNgan .xemthem:hover {
    color: coral;
    margin-right: -10px;
}

h3 {
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}

.titer {
    width: 100%;
    height: 55px;
    background-color: rgba(240, 239, 238, 0.914);
    border: 1px solid rgb(223, 216, 216);
    /* margin-top: 10px; */
}

.titer p {
    margin-top: 10px;
    margin-left: 5px;
}

.Vay {
    width: 100%;
    height: auto;
    position: absolute;
    display: inline-block;
}

.img_vay img {
    width: 20px;
    height: 25px;
    display: flex;
    flex-direction: column;
    margin-top: 63px;
    /* margin-left: 30px; */
    border: 1px solid white;
}

.TieuDe {
    text-align: center;
    font-size: 20px;
    margin-top: -20px;
    font-family: Fredericka, "Helvetica Neue", Helvetica, sans-serif;
}

.gia {
    font-size: 17px;
    /* position: absolute; */
    margin-left: 150px;
    margin-top: 10px;
}

.img_vay label {
    font-size: 17px;
    margin-left: 20px;
    opacity: 0.4;
}

.img_vay hr {
    width: 90%;
    margin-left: 20px;
}
.tenvay {
        margin-left: 50px;
        margin-top: 10px;
        display: grid;
         grid-template-columns: 17% 17% 17% 17% 17%;
         grid-column-gap: -20px;
    }

    /* img */

    
.VayNgan {
    width: 80%;
    height: 435px;
    /* background-color: aliceblue; */
    margin-left: 165px;
    margin-top: 60px;
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
    font-size: 25px;
    display: flex;
    border: 1px solid rgb(223, 216, 216);
    /* margin: 10px; */
    position: relative;
}

.img_vay img {
    width: 200px;
    height: 200px;
    margin-top: 20px;
    margin-left: 0px;
}

.img_vay img:hover {
    transform: scale(1.05);
    /* width: 1px; */
}

.h2:hover {
    margin-top: -0.1px;
}

.xemthem {
    position: absolute;
    right: 170px;
    font-size: 20px;
    margin-top: 14px;
    z-index: 1;
}



.VayNgan .xemthem:hover {
    color: coral;
    margin-right: -10px;
}

h3 {
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}

.titer {
    width: 100%;
    height: 55px;
    background-color: rgba(240, 239, 238, 0.914);
    border: 1px solid rgb(223, 216, 216);
    /* margin-top: 10px; */
}

.titer p {
    margin-top: 10px;
    margin-left: 5px;
}

.Vay {
    width: 90%;
    height: auto;
    position: absolute;
    display: inline-block;
}

.img_vay img {
    width: 20px;
    height: 25px;
 
    margin-top: 63px;
    /* margin-left: 30px; */
    border: 1px solid white;
    border: 1px solid coral ;

}

.TieuDe {
    width: 100%;
    text-align: center;
    font-size: 20px;
    margin-top: -20px;
    font-family: Fredericka, "Helvetica Neue", Helvetica, sans-serif;
}

.gia {
    font-size: 17px;
    /* position: absolute; */
    margin-left: 150px;
    margin-top: 10px;
}

.img_vay label {
    font-size: 17px;
    margin-left: 20px;
    opacity: 0.4;
}

.img_vay hr {
    width: 90%;
    margin-left: 20px;
}

.Vay  {
    margin-left: 100px;
    margin-top: 50px;
    display: grid;
         grid-template-columns: 17% 17% 17% 17% 17%;
         grid-column-gap: -20px;
}


.img_vay{
        width: 200px;
        height: 350px;
        margin-left:50px;
        /* display: inline-block; */
        /* margin-left: 22px; */
    }
    .Name {
        width: 200px;
        line-height: 40px;
    }
    
.title {
    /* border-radius: 200px; */
    width: 70px;
    height: 70px;
    border-radius: 200px;
    margin-top: 10px;
    /* margin-left: 180px; */
}
#gio{
        position: relative;
        right: -450px;
        top: 10px;
    }
 
    @media (max-width: 768px) {
        .dn{
            display: none;
        }
        footer {
            width: 88%;
            /* display: flex; */
            padding: 20px;
            /* height: auto; */
            position: relative;
            margin-top: 2700px;
        }
        footer .container {
            flex-direction: column;
            display: inline-block;
        }
        footer .container .noi-dung {
            margin-right: 0;
            margin-bottom: 40px;
            width: 100%;
        }
        footer .container,
        .noi-dung.about,
        .links,
        .contact {
            width: 100%;
        }
        #post{
             margin-top: -85px;
        }
        .container .noi-dung p {
            display: inline-block;
            width: 230%;
        }
        .header table .title_1 {
            display: inline;
            margin-left: 30px;
            margin-top: 20px;
        }
        .header h2 {
            display: none;
        }
        #img {
            display: inline-block;
            position: relative;
            left: -140px;
            width: 220%;
        }
        .Vay  {
            width: 100%;
             margin-left: 60px;
             display: grid;
             grid-template-columns: 45% 45%;
             grid-column-gap: -10px;
             text-align: center;
              justify-content: center;
            }
       
        #Them {
            position: relative;
            left: 0px;
            margin-left: 0px;
        }
         .header{
            display: grid;
            grid-template-columns: 20%  70%  10%;
            grid-template-rows: 1;

         /* grid-column-gap: -20px; */
      }
      
        .td_left .title_ten {
            width: 400px;
            position: relative;
            left: 0;
            margin-left: 120px;
        }
        .title{
            position: relative;
            left: 0px;
           
        }
        #img_chinh{
            width: 150px;
            height: 200px;
            position: relative;
            display: inline-block;
            left: 20px;
        }
        .img_vay{
            width: 40%;
            position: relative;
            left: -60px;

            display: inline-block;

        }
        .tenvay{
            width: 110%;
            margin-left: -60px;
            /* display: inline; */
        }
        #gio{
        position: relative;
        right: 10px;
        top: -82px;
    }
    .TieuDe{
        width: 200px;
    }
    .gia{
        margin-left: 100px;
    }
    .hr{
        width: 100px;
    }
    
    }

@media only screen and (min-width: 768px) and (max-width: 1024px)  {
    .dn{
            display: none;
        }
        footer {
            width: 98%;
            /* display: flex; */
            padding: 20px;
            /* height: auto; */
            position: relative;
            margin-top: 1700px;
        }
        footer .container {
            flex-direction: column;
            display: inline-block;
        }
        footer .container .noi-dung {
            margin-right: 0;
            margin-bottom: 40px;
            width: 100%;
        }
        footer .container,
        .noi-dung.about,
        .links,
        .contact {
            width: 100%;
        }
        #post{
             margin-top: -85px;
        }
        .container .noi-dung p {
            display: inline-block;
            width: 230%;
        }
        .header table .title_1 {
            display: inline;
            margin-left: 30px;
            margin-top: 20px;
        }
        .header h2 {
            display: none;
        }
        #img {
            display: inline-block;
            position: relative;
            left: -140px;
            width: 220%;
        }
        .Vay  {
            width: 100%;
             margin-left: 60px;
             display: grid;
             grid-template-columns: 22% 22% 22% 22%;
             grid-column-gap: -10px;
             text-align: center;
       justify-content: center;
            }
       
        #Them {
            position: relative;
            left: 0px;
            margin-left: 0px;
        }
         .header{
            display: grid;
            grid-template-columns: 20%  60%  10% ;
            grid-template-rows: 1;

         /* grid-column-gap: -20px; */
      }
      
        .td_left .title_ten {
            width: 400px;
            position: relative;
            left: 0;
            margin-left: 120px;
        }
        .title{
            position: relative;
            left: 0px;
           
        }
        #img_chinh{
            width: 150px;
            height: 200px;
            position: relative;
            display: inline-block;
            left: 20px;
        }
        .img_vay{
            width: 40%;
            position: relative;
            left: -60px;

            display: inline-block;

        }
        .tenvay{
            width: 110%;
            margin-left: -60px;
            /* display: inline; */
        }
        #gio{
        position: relative;
        right: 10px;
        top: -82px;
    }
    .TieuDe{
        width: 200px;
    }
    .gia{
        margin-left: 100px;
    }
    .hr{
        width: 100px;
    }

}
 
  

</style>

<body>


    </div>
    
    <div class="header" id="header" style=' width: 100%;background-color: azure; position: fixed; z-index: 10000000;'>
       <div>

           <a href="index.php">
               <img class="title" style="" src="./img/bia.jpg"> 
            </a>
        </div>
                 <div>

                     <a href="index.php" style="text-decoration: none;"> 
                        
                        <h2 class="h2" style=" color: black ; text-decoration: none; " >
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
                    
                
            </div>
            <div >

                <a href="DangKy.php">
                    
                    <a href="DangKy.php" class="dn" > 
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
                            <!-- <i class="fa-solid fa-bars" id="bacham"></i> -->
                        </label>
                        
                    </div>
          
    </div>

    <div class="tenvay">
       
        

           
  
            <form method="post" action="" class="Vay" >

                
            <?php
                        while($row = mysqli_fetch_assoc($query)) {?>
                          <?php
                         
                         ?>
                       
                         
                         <div class="img_vay" onclick="vay()">

                                    <a href="chitiettui.php?Stt=<?=$Stt=$row['Stt'] ?>">
                                
                          
                             <img style="" id="img_chinh" src ='./img/<?php echo $img = $row['img'] ?>' />
                        
                            </a>
                            <br>
                            <br>
                            <div class="TieuDe" style=""> 
                                  <?php echo $row['TenTui'] ?> 
                            </div>
                            <hr style=" width: 150px;">
                            <p class="gia" style="color: coral;">
                             <?php echo $row['Gia'] ?>     
                            </p>
                          

                       

                        </div>
                        <?php } 
                      ?>
                      </form>
                      
                        </div>

    
                    <!-- <input type="submit" id="submit" name="submit" value="CHi Tiết" > -->
              
           




    
    <footer >
       
        <div class="container">
            <!--Bắt Đầu Nội Dung Giới Thiệu-->
            <div class="noi-dung about">
                <h2>Về Chúng Tôi</h2>
                <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium dolores alias ipsa vel hic tempore exercitationem ipsam explicabo repudiandae ut consectetur qui, earum at nostrum perspiciatis asperiores necessitatibus facilis esse.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia id possimus quibusdam nihil earum in provident enim animi commodi quisquam! Molestiae cupiditate mollitia pariatur error ea, debitis eaque quo dolorum.</p>
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

</html>
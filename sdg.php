

 <div class="VayNgan">
        <div class="titer">
                <p>
                    Sét Váy
                </p>
            </div>

        <form method="post" action="chitietCV.php" class="Vay" style="display:inline-block;">

                <?php
            
            while($row = mysqli_fetch_assoc($queryDT)) {?>
                <?php
               
               ?>
               
               <div class="img_vay"  style="   display: inline-block; width: 200px;height: 350px;">

               
                         <a href="chitietDT.php?Stt=<?=$Stt=$row['Stt'] ?>">
              
                  
                   <img style="width: 200px;
                 height: 250px; margin-top:20px; margin-left: 50px ;" src ='../img/<?php echo $img = $row['img'] ?> ' />
              
                  </a>
                  <br>
                  <br>
                  
                  <div style="margin-left:50px; font-size: 17px; width: 200px;"  class="TieuDe"> 
                        <?php echo $row['TenVay'] ?> 
                      </div>
              
                          
                  <hr  style="margin-top:10px;margin-left:50px;">
                  <p class="gia" style="margin-left:120px; color: coral">
                   <?php echo $row['Gia'] ?>   
              
                  </p>
              


              </div>
              
              <?php } 
          ?>
        <!-- <input type="submit" id="submit" name="submit" value="CHi Tiết" > -->
  
        <a href="XemThemDT.php"> 
                  <div class="them"> Xem thêm </div>
            </a>
</form>            

        </div>

        <div class="VayNgan">
        <div class="titer">
                <p>
                    Chân Váy
                </p>
            </div>

        <form method="post" action="chitietCV.php" class="Vay" style="display:inline-block;">

                <?php
            
            while($row = mysqli_fetch_assoc($queryCV)) {?>
                <?php
               
               ?>
               
               <div class="img_vay" style="   display: inline-block; width: 200px;height: 350px;">

               
                         <a href="chitietCV.php?Stt=<?=$Stt=$row['Stt'] ?>">
              
                  
                   <img style="width: 200px;
                 height: 250px; margin-top:20px;margin-left:50px ;" src ='../img/<?php echo $img = $row['img'] ?> ' />
              
                  </a>
                  <br>
                  <br>
                  
                  <div style="margin-left:50px; font-size: 17px; width: 200px;"  class="TieuDe"> 
                        <?php echo $row['TenVay'] ?> 
                      </div>
              
                          
                  <hr  style="margin-top:10px;margin-left:50px;">
                  <p class="gia" style="margin-left: 120px;color: coral">
                   <?php echo $row['Gia'] ?>   
              
                  </p>
              


              </div>
              
              <?php } 
          ?>
        <!-- <input type="submit" id="submit" name="submit" value="CHi Tiết" > -->
  
        <a href="XemThemCV.php"> 
                  <div class="them"> Xem thêm </div>
            </a>
</form>            

        </div>

       

        <!-- ÁO -->
        <div class="VayNgan">
        <div class="titer">
                <p>
                    Áo 
                </p>
            </div>

        <form method="post" action="chitietCV.php" class="Vay" style="display: inline-block;">

                <?php
            
            while($row = mysqli_fetch_assoc($queryAo)) {?>
                <?php
               
               ?>
               
               <div class="img_vay" onclick="vay()" style="   display: inline-block; width: 200px;height: 350px;">

               
                         <a href="chitietAo.php?Stt=<?=$Stt=$row['Stt'] ?>">
              
                  
                   <img style="width: 200px;
                 height: 250px; margin-top:20px;margin-left:50px ;" src ='../img/<?php echo $img = $row['img'] ?> ' />
            
                  </a>
                  <br>
                  <br>
                  
                  <div style="margin-left:50px; font-size: 17px; width: 200px;"  class="TieuDe"> 
                        <?php echo $row['TenVay'] ?> 
                      </div>
              
                          
                  <hr  style="margin-top:10px;margin-left:50px;">
                  <p class="gia" style="margin-left: 120px; color:coral">
                   <?php echo $row['Gia'] ?>   
              
                  </p>
              


              </div>
              
              <?php } 
          ?>
        <!-- <input type="submit" id="submit" name="submit" value="CHi Tiết" > -->
  
        <a href="XemThemAo.php"> 
                  <div class="them"> Xem thêm </div>
            </a>
</form>            

        </div>

        <!-- Túi -->
         
        <div class="VayNgan">
        <div class="titer">
                <p>
                    Túi
                </p>
            </div>

        <form method="post" action="chitietCV.php" class="Vay" style="display: inline-block;">

                <?php
            
            while($row = mysqli_fetch_assoc($queryTui)) {?>
                <?php
               
               ?>
               
               <div class="img_vay" onclick="vay()" style="   display: inline-block; width: 200px;height: 350px;">

               
                         <a href="chitiettui.php?Stt=<?=$Stt=$row['Stt'] ?>">
              
                  
                   <img style="width: 200px;
                 height: 250px; margin-top:20px;margin-left:50px ;" src ='../img/<?php echo $img = $row['img'] ?> ' />
              
                  </a>
                  <br>
                  <br>
                  
                  <div style="margin-left:50px; font-size: 17px; width: 200px;"  class="TieuDe"> 
                        <?php echo $row['TenTui'] ?> 
                      </div>
              
                          
                  <hr  style="margin-top:10px;margin-left:50px;">
                  <p class="gia" style="margin-left: 120px;color: coral">
                   <?php echo $row['Gia'] ?>   
              
                  </p>
              


              </div>
              
              <?php } 
          ?>
        <!-- <input type="submit" id="submit" name="submit" value="CHi Tiết" > -->
  
        <a href="XemThemTui.php"> 
                  <div class="them"> Xem thêm </div>
            </a>
</form>            

        </div>

        <!-- Giày -->

        
        <div class="VayNgan">
        <div class="titer">
                <p>
                    Giày - Dép
                </p>
            </div>

        <form method="post" action="chitietDT.php" class="Vay" style="display: inline-block;">

                <?php
            
            while($row = mysqli_fetch_assoc($queryG)) {?>
                <?php
               
               ?>
               
               <div class="img_vay" onclick="vay()" style="   display: inline-block; width: 200px;height: 350px;">

               
                         <a href="chitietG.php?Stt=<?=$Stt=$row['Stt'] ?>" >
              
                  
                   <img style="width: 200px;
                 height: 250px; margin-top:20px;margin-right:20px ;" src ='../img/<?php echo $img = $row['img'] ?>  '/>
              
                  </a>
                  <br>
                  <br>
                  
                  <div style="margin-left:50px; font-size: 17px; width: 200px;"  class="TieuDe"> 
                        <?php echo $row['TenGiay'] ?> 
                      </div>
              
                          
                  <hr  style="margin-top:10px;margin-left:60px;color: coral">
                  <p class="gia">
                   <?php echo $row['Gia'] ?>   
              
                  </p>
              


              </div>
              
              <?php } 
          ?>
        <!-- <input type="submit" id="submit" name="submit" value="CHi Tiết" > -->
  
        <a href="XemThemGiay.php"> 
                  <div class="them"> Xem thêm </div>
            </a>
</form>            

        </div>

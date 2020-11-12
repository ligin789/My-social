<?php
include 'include/header.php';
if ($_SESSION["mysocialid"] == session_id()) {
  $id = $_SESSION["id"];
?>

  <head>
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link href="assets/css/emojionearea.min.css" rel="stylesheet">
    <script src="assets/js/emojionearea.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery-2.2.4.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <style>
      @media screen and (max-width:800px) {
        #chuma {
          display: none;
        }
      }
    </style>


  </head>

  <body>
    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
      <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
    </div>

    <!-- Page Container -->
    <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px;">
      <!-- The Grid -->
      <div class="w3-row">
        <!-- Left Column -->
        <div class="w3-col m3">
          <!-- Profile -->

          <?php
          $code = "select * from userdata where uid='$id'";
          $result11 = mysqli_query($connect, $code);
          while ($row11 = mysqli_fetch_array($result11)) {
            echo "<a href='' style='text-decoration: none;'><div class='w3-card w3-round w3-white'>
        <div class='w3-container'>
         <h4 class='w3-center'>My Profile</h4>
        
         <p class='w3-center'><img src='" . $row11['profile_pic'] . "' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>
         <hr>
         <p><i class='fa fa-pencil fa-fw w3-margin-right w3-text-theme'></i>" . $row11['first_name'] . " " . $row11['last_name'] . "</p>
         <p><i class='fa fa-home fa-fw w3-margin-right w3-text-theme'></i> </p>
         <p><i class='fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme'></i>" . $row11['dob'] . "</p></a>


        </div>
      </div>";
          }
          ?>
          <br>

          <!-- Accordion -->
          <div class="w3-card w3-round">
            <div class="w3-white">
              <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-birthday-cake fa-fw w3-margin-right"></i> My Friends birthday</button>
              <div id="Demo1" class="w3-hide w3-container">
                <p>Some text..</p>
              </div>
              <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Posts</button>
              <div id="Demo2" class="w3-hide w3-container">
                <p>Some other text..</p>
              </div>
              <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
              <div id="Demo3" class="w3-hide w3-container">
                <div class="w3-row-padding">
                  <br>
                  <?php
                  $sql10 = "select imgurl from photos where email='$email'";
                  $result10 = mysqli_query($connect, $sql10);
                  while ($row10 = mysqli_fetch_array($result10)) {
                    echo "<div class='w3-half'>";
                    echo "<img src='" . $row10['imgurl'] . "' style='width:100%' class='w3-margin-bottom'>";
                    echo "</div>";
                  }
                  ?>

                </div>
              </div>
            </div>
          </div>
          <br>

          <br>

          <!-- Alert Box -->
          <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
            <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
              <i class="fa fa-remove"></i>
            </span>
            <p><strong>Hey!</strong></p>
            <p>ADD A NEW POST.</p>
            <a href="#"><button>POST</button></a>
          </div>

          <!-- End Left Column -->
        </div>

        <!-- Middle Column -->
        <div class="w3-col m7">



          <!-- Search button -->
          <div class="w3-row-padding">
            <div class="w3-col m12">
              <div class="w3-card w3-round w3-white">
                <div class="w3-container w3-padding">
                  <form action="search.php" method="get">
                    <div class="bk">
                      <h6 class="w3-opacity">Enter the name to Search</h6>
                      <input type="text" style="width:-webkit-fill-available;margin-bottom:2%;" onKeyUp="fx(this.value)" placeholder="Search" autocomplete="off" style=" border-radius: 25px;" name="qu" id="qu" class="w3-border w3-padding" tabindex="1""></input>
                      <button type=" button" class="w3-button w3-theme"><i class="fa fa-search"></i> </button>

                    </div>
                </div>
                </form>
                <div id="livesearch"></div>
              </div>
            </div>
          </div>
          <br>
          <div class="w3-row-padding">
            <div class="w3-col m12">
              <form action="post1.php" method="post">
                <div class="w3-card w3-round w3-white">
                  <div class="w3-container w3-padding">
                    <div class="chuma">
                      <h6 class="w3-opacity">What is in your mind!!!</h6>
                      <p contenteditable="true" name="status" id="emojionearea1" class="w3-border w3-padding"></p>
                      <br>
                      <button type="submit" value="" class="w3-button w3-theme"><i class="fa fa-pencil"></i> Post</button>
                      <button type="button" onclick="window.location.href ='snapshot.php'" style="margin-left: 5%;" id="chuma" class="w3-button w3-theme"><i class="em em-camera" aria-role="presentation" aria-label="camera"></i> Take photo</button>
                      <button type="button" onclick="window.location.href ='newsupload.php'" style="margin-left: 5%;" class="w3-button w3-theme"><i class="fa fa-picture-o"></i> Photo/video</button>

                      <!--smiley and search-->
                      <script type="text/javascript">
                        $(document).ready(function() {
                          $("#emojionearea1").emojioneArea({

                            pickerPosition: "bottom",
                            tonesStyle: "bullet",

                          });
                        });
                      </script>

                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>






          <?php

          $sql1 = "select * from newsfeedtable where options='photo' order by date";
          $sql2 = "select * from newsfeedtable where options='video' order by date";

          $useremail = $_SESSION['id'];
          //photo
          $result = mysqli_query($connect, $sql1);
          while ($row = mysqli_fetch_array($result)) {


            echo "<div class='w3-container w3-card w3-white w3-round w3-margin' id='lik'><br>";
            echo "<span class='w3-right w3-opacity'>" . $row['date'] . "</span>";
            echo "<h4>OWNER :" . $row['owner'] . "</h4><br>";
            echo "<hr class='w3-clear'>";
            echo "<img src='" . $row['picurl'] . "' style='width:100%' class='w3-margin-bottom'>";
            echo "<p>" . $row['news'] . "</p>";
            $p_id = $row['post_id'];
            $sql5 = "select * from tbl_like where post_id='$p_id' and email='$useremail'";
            $res = mysqli_query($connect, $sql5);
            $numrow = mysqli_num_rows($res);
            if ($numrow == 1) {

              echo "<button class='w3-button w3-theme-d1 w3-margin-bottom' onclick='' id='unlike' value='" . $row['post_id'] . "' name='submit'>Liked</button>";
              echo "<i>20like</i>";
            } else {

              echo "<button class='w3-button w3-theme-d1 w3-margin-bottom' id='like' value='" . $row['post_id'] . "' name='submit'>Like</button>";
            }
            echo "<form action='comment.php' method='post'>";
            echo "<button name='submit' value='" . $row['post_id'] . "' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i>  Comment</button> ";
            echo "</form>";

            echo "</div>";
          }
          //video
          $result1 = mysqli_query($connect, $sql2);
          while ($row1 = mysqli_fetch_array($result1)) {


            echo "<div class='w3-container w3-card w3-white w3-round w3-margin'><br>";
            echo "<span class='w3-right w3-opacity'>" . $row1['date'] . "</span>";
            echo "<h4>OWNER :" . $row1['owner'] . "</h4><br>";
            echo "<hr class='w3-clear'>";
            echo "<video style='width:100%' class='w3-margin-bottom' autoplay muted>";
            echo "<source src='" . $row1['picurl'] . "' type='video/mp4'>";
            echo "</video>";
            echo "<p>" . $row1['news'] . "</p>";
            $p_id = $row['post_id'];

            $p_id = $row['post_id'];
            $sql6 = "select * from tbl_like where post_id='$p_id' and email='$useremail'";
            $res6 = mysqli_query($connect, $sql6);
            $numrow6 = mysqli_num_rows($res6);
            if ($numrow6 == 1) {
              echo "<form action='unlike.php' method='post'>";
              echo "<button class='w3-button w3-theme-d1 w3-margin-bottom' value='" . $row['post_id'] . "' name='submit'>Liked<button>";
              echo "</form>";
            } else {
              echo "<form action='like.php' method='post'>";
              echo "<button class='w3-button w3-theme-d1 w3-margin-bottom' value='" . $row['post_id'] . "' name='submit'>Like<button>";
              echo "</form>";
            }
            echo "<form action='comment.php' method='post'>";
            echo "<button name='submit' value='" . $row['post_id'] . "' class='w3-button w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i>  Comment</button> ";
            echo "</form>";
            echo "</div>";
          }
          ?>


          <!-- End Middle Column -->
        </div>

        <!-- Right Column -->
        <div class="w3-col m2">
          <div class="w3-card w3-round w3-white w3-center">
            <div class="w3-container">
              <p>Upcoming Events:</p>
              <img src="/w3images/forest.jpg" alt="Forest" style="width:100%;">
              <p><strong>Holiday</strong></p>
              <p>Friday 15:00</p>
              <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
            </div>
          </div>
          <br>

          <div class="w3-card w3-round w3-white w3-center">
            <div class="w3-container">
              <p>Friend Request</p>
              <img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
              <span>Jane Doe</span>
              <div class="w3-row w3-opacity">
                <div class="w3-half">
                  <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
                </div>
                <div class="w3-half">
                  <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
                </div>
              </div>
            </div>
          </div>
          <br>

          <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
            <p>ADS</p>
          </div>
          <br>

          <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
            <p><i class="fa fa-bug w3-xxlarge"></i></p>
          </div>

        </div>

      </div>

      <!-- End Page Container -->
    </div>
    <br>


    <script>
      // Accordion
      function myFunction(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
          x.previousElementSibling.className += " w3-theme-d1";
        } else {
          x.className = x.className.replace("w3-show", "");
          x.previousElementSibling.className =
            x.previousElementSibling.className.replace(" w3-theme-d1", "");
        }
      }

      function openNav() {
        var x = document.getElementById("navDemo");
        if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
        } else {
          x.className = x.className.replace(" w3-show", "");
        }
      }
    </script>

  </body>

  </html>
<?php
} else {
  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Firstly Login');
    window.location.href='login.php';
    </script>");
}
?>
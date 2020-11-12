<?php
include 'include/header.php';
if ($_SESSION["mysocialid"] == session_id()) {
  $id = $_SESSION["id"];
?>

  <head>
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/demo1.css">
    <link rel="stylesheet" href="assets/css/component.css">

    <script>
      (function(e, t, n) {
        var r = e.querySelectorAll("html")[0];
        r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
      })(document, window, 0);
    </script>
    <link href="assets/css/emojionearea.min.css" rel="stylesheet">
    <script src="assets/js/emojionearea.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery-2.2.4.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
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

          <!--Form-->
          <div class='w3-container w3-card w3-white w3-round w3-margin'><br>
            <form action='addpost.php' method='post'>
              <div class="content">
                <div class="box">
                  <input type="file" style="display:none;" name="file" onchange="fileValidation()" id="file-5" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple accept="image/*,video/*" />
                  <label for="file-5">
                    <figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                        <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" /></svg></figure> <span>Choose a file&hellip;</span>
                  </label>
                </div>
              </div>
              <script src="assets/js/customjs.js"></script>
              <p contenteditable="true" id="emojionearea1" placeholder="Write Something..." name="about" class="w3-border w3-padding"> </p>
              <br>
              <button type="submit" class='w3-button w3-theme-d1 w3-margin-bottom' name='newssubmit'>Post</button>
            </form>

            <div>
              <script type="text/javascript">
                function fileValidation() {
                  var fileInput =
                    document.getElementById('file-5');

                  var filePath = fileInput.value;

                  // Allowing file type 
                  var allowedExtensions =
                    /(\.mp4|\.jpg|\.png|\.svg|\.tex|\.webp|\.mov|\.mpeg|\.gif|\.tiff)$/i;

                  if (!allowedExtensions.exec(filePath)) {
                    alert('Invalid file type');
                    fileInput.value = '';
                    return false;
                  }
                }
              </script>


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


  </body>
<?php
}
?>
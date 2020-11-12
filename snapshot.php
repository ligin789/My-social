<?php
include "include/header.php";
?>


<style type="text/css">
    #results {
        padding: 5%;
        border: 1px solid;
        background: #ccc;
    }
</style>


<div class="container">

    <form method="POST" action="storeImage.php">

        <div class="row">

            <div class="col-md-6">

                <div id="my_camera"></div>

                <br />

                <input type=button class="btn btn-primary" value="Take Snapshot" onClick="take_snapshot()">

                <input type="hidden" name="image" class="image-tag">

            </div>

            <div class="col-md-6">

                <div id="results">Your captured image will appear here...</div>

            </div>

            <div class="col-md-12 text-center">

                <br />

                <button class="btn btn-success">Submit</button>

            </div>

        </div>

    </form>

</div>



<!-- Configure a few settings and attach camera -->

<script language="JavaScript">
    Webcam.set({

        width: 490,

        height: 390,

        image_format: 'jpeg',

        jpeg_quality: 90

    });



    Webcam.attach('#my_camera');



    function take_snapshot() {

        Webcam.snap(function(data_uri) {

            $(".image-tag").val(data_uri);

            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';

        });

    }
</script>



</body>

</html>
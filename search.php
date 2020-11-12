<?php
include('include/dbconnect.php');
$s1 = $_REQUEST["n"];
$select_query = "select * from userdata where first_name like '%" . $s1 . "%'";
$sql = mysqli_query($connect, $select_query);
$s = "";
while ($row = mysqli_fetch_array($sql)) {
	$s = $s . "
	<a class='link-p-colr' href='view.php?product=" . $row['uid'] . "'>
		<div class='live-outer'>
            	<div class='live-im'>
                	<img src='" . $row['profile_pic'] . "'/>
                </div>
                <div class='live-product-det'>
                	<div class='live-product-name'>
                    	<p>" . $row['first_name'] . "</p>
                    </div>
                    
                </div>
            </div>
	</a>
	";
}
echo $s;

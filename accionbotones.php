
<?php
session_start();
 	

       if($_POST["PDFopen"]){
       echo "<script language='javascript'>window.location='pdf.php'</script>";
       }

	if($_POST["PrintXML"]){
	echo "<script language='javascript'>window.location='xml.php'</script>";
       }

?>


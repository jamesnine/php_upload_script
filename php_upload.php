<?php
/* 
 * A super simple and easy to follow single file upload script
 * using the jQuery form plugin (look inside jquery.form.js for details)
 *
 * Written by: 	Jim Nguyen
 * Date: 		1/10/2012
 *
 * Use this code however you like, there is no license, and I'm not
 * responsible for any damage.
 */

// this is called after a user chooses the file
if(isset($_FILES["file"])) {
	// move the file from the temp directory to the working directory (by default)
	move_uploaded_file($_FILES["file"]["tmp_name"], $_FILES["file"]["name"]);

	// print out all the details
	echo "<pre>";
	echo "Uploaded " . $_FILES["file"]["name"] . " successfully.  File details:<br/><br/>";
	print_r($_FILES["file"]);
	echo "</pre>";
	
	die();
}

?>

<!-- the upload button/form -->
<form action="php_upload.php" method="POST" enctype="multipart/form-data">
	<input name="file" type="file" />
</form>

<!-- just for outputting information -->
<div id="output" style="margin-top:20px"></div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.form.js"></script>
<script type="text/javascript">
	// watch for a change in the filename
	$("input[name=file]").change(function() {
		// this will "submit" the form immediately
		$("form").ajaxSubmit({
			beforeSubmit: function() {
				$("#output").html("Uploading...");
			},
			success: function(e) {
				$("#output").html(e);
			}
		});
	});
</script>
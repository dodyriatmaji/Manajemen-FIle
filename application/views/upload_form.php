<html>
<head>
<title>Upload Form</title>
</head>
<body>
<?php echo $error;?>
<?php echo form_open_multipart('upload/cobaupload', '');?>
<div style="padding-left:35px;">
<h2>Pilih file yang akan di upload</h2>
<?php echo form_upload('myfile').
form_submit('submit', 'Submit').'</p>';
?>
</form>
</div>
</body>
</html>
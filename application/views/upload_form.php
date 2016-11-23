<html>
<head>
    <title>Upload Form</title>
</head>
<body>


<?php echo form_open_multipart('main_controller/profile_image_check');?>

<input type="file" name="uploadImage"  size="20" />

<br /><br />

<input type="submit" value="upload" />

<?php echo form_close(); ?>
</body>
</html>
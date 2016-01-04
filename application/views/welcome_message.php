<!DOCTYPE html>
<html lang="en">
<head>
     <title>Welcome to CodeIgniter</title>
</head>
<body>
 
<div id="container">
    <h1>Upload dan Resize Gambar Otomatis</h1>
 
    <div id="body">
        <form method="post" enctype="multipart/form-data">        
             
            <?php echo $error; ?>
             
            <div>
                <label for="userfile">Pilih gambar yang akan di upload : </label>
                <br />
                <input type="file" name="userfile" />
            </div>
             
            <div style="margin-top:20px">
                <input type="submit" value="Upload" />
            </div>
         
        </form>
         
        <div>
            <?php echo $output; ?>
        </div>
    </div>
 
    <p class="footer"></p>
</div>
 
</body>
</html>
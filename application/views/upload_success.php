<html>
<head>
<title>Upload Form</title>
</head>
<body>
<div>
<h2>File berhasil di upload</h2>
<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
</div>
<h3>File asli</h3>
<div>
<img src="<?=base_url();?>userfile/<?=$ori;?>"><br/><?php echo $ori;?></img>
</div>
<h3>File hasil watermarking</h3>
<div>
<img src="<?=base_url();?>userfile/<?=$tnd;?>"><br/><?php echo $tnd;?></img>
</div>
<h3>File hasil resize</h3>
<div>
<img src="<?=base_urll();?>userfile/<?=$kcl;?>"><br/><?php echo $kcl;?></img>
</div>
</body>
</html>
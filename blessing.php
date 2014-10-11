<?php

// Error reporting:
error_reporting(E_ALL^E_NOTICE);

// Including the DB connection file:
require 'connect.php';

// Removing notes that are older than an hour:


$query = mysql_query("SELECT * FROM notes ORDER BY id DESC");

$notes = '';
$left='';
$top='';
$zindex='';
$i = 0;
while($row=mysql_fetch_assoc($query))
{
	
	if($i > 250)
		break;
	// The xyz column holds the position and z-index in the form 200x100x10:
	list($left,$top,$zindex) = explode('x',$row['xyz']);
	
	$notes.= '
	<div class="note '.$row['color'].'" style="left:'.$left.'px;top:'.$top.'px;z-index:'.$zindex.'">
		'.htmlspecialchars($row['text']).'
		<div class="author">'.htmlspecialchars($row['name']).'</div>
		<span class="data">'.$row['id'].'</span>
	</div>';
	
	
	$i++;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>祝福</title>

<link rel="stylesheet" type="text/css" href="css/note.css" />
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.2.6.css" media="screen" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.2.6.pack.js"></script>

<script type="text/javascript" src="js/note.js"></script>

</head>

<body>

<div class = "tutInfo">
  <a id="addButton" class="green-button" href="write_note.html">书写祝福</a><a id="selectButton" class="green-button" href="select_note.php">选择祝福</a>
  <br>
</div>

<p style="text-align:center;"><span style="font-size:10pt;">"选择祝福"功能尚有一点不完善，选择好后需要刷新一下页面才能看到选择的内容:)</span></p>
<p></p>
<div id="main">
	<?php echo $notes?>
</div>


</body>
</html>

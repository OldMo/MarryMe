<h3 class="popupTitle">祝福</h3>

<!-- The preview: -->
<div id="previewNote" class="note yellow" style="left:0;top:65px;z-index:1">
	<div class="body">选已有的祝福</div>
	<div class="author"></div>
	<span class="data"></span>
</div>

<div id="noteData"> <!-- Holds the form -->
<form action="" method="post" class="note-form">

<label for="note-body">选择已有的祝福</label>
<select class="sel_body">
<?php
require 'connect.php';
$query = mysql_query("SELECT * FROM notes ORDER BY text desc");

$notes = '';
$left='';
$top='';
$zindex='';
$i = 0;
while($row=mysql_fetch_assoc($query))
{
	
	if($i > 10)
		break;
	// The xyz column holds the position and z-index in the form 200x100x10:
	list($left,$top,$zindex) = explode('x',$row['xyz']);
	
	echo '<option value = "'.$row['id'].'">'.$row['text'].'</option>';
	
	$i++;
	
}
?>


  
  
</select> 

<label for="note-name">留下您的大名吧</label>
<input type="text" name="note-name" id="note-name" class="pr-author" value="" />

<label>颜色</label> <!-- Clicking one of the divs changes the color of the preview -->
<div class="color yellow"></div>
<div class="color blue"></div>
<div class="color green"></div>





<a id="select-submit" href="" class="green-button">发送祝福</a>

</form>

</div>
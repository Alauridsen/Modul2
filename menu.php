
<?php 
	  $curpage = basename($_SERVER['PHP_SELF']);
?>
<ul id="menu">
	<li><a href="index.php" <?PHP if ($curpage == 'index.php') {echo 'class="active"';}?>>Side 1</a></li>
    <li><a href="p2.php" <?PHP if ($curpage == 'p2.php') {echo 'class="active"';}?>>Side 2</a></li>
    <li><a href="p3.php" <?PHP if ($curpage == 'p3.php') {echo 'class="active"';}?>>Side 3</a></li>
</ul>

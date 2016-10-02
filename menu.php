
<?php 
	/*Variabel der finder nuværende sides filnavn. */
	  $curpage = basename($_SERVER['PHP_SELF']);
	  
?>
<!-- If clausul der echo'er class'en active i det nuværende menu link. -->

<ul id="menu">
	<li><a href="index.php" <?PHP if ($curpage == 'index.php') {echo 'class="active"';}?>>Frontpage</a></li>
    <li><a href="p2.php" <?PHP if ($curpage == 'p2.php') {echo 'class="active"';}?>>Page 2</a></li>
    <li><a href="p3.php" <?PHP if ($curpage == 'p3.php') {echo 'class="active"';}?>>Page 3</a></li>
    <!-- Hvis sessionen ikke er tom, echoer den logout linket. -->
    <?PHP if(!empty($_SESSION['uid'])) { echo '<li><a class="login" href="logout.php">Logout</a></li>'; } ?>
    <!-- Hvis sessionen ikke er tom, echoer den css classen hidden. -->
    <li class="login <?PHP if(!empty($_SESSION['uid'])) { echo 'hidden';} ?>"><a href="register.php" <?PHP if ($curpage == 'register.php') { echo 'class="active"';} ?>>Register</a></li>
    <li class="login <?PHP if(!empty($_SESSION['uid'])) { echo 'hidden';} ?>"><a href="login.php"  <?PHP if ($curpage == 'login.php') {echo 'class="active"';}?>>login</a></li>
</ul>
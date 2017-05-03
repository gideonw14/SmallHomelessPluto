<!-- Panel -->
<div id="toppanel">
<div id="panel">
<div class="content clearfix">
<div class="left">
<h1>The Sliding jQuery Panel</h1>
<h2>A register/login solution</h2>
<p class="grey">You are free to use this login and registration system in you sites!</p>
<h2>A Big Thanks</h2>
<p class="grey">This tutorial was built on top of <a title="Go to site" href="http://web-kreation.com/index.php/tutorials/nice-clean-sliding-login-panel-built-with-jquery">Web-Kreation</a>'s amazing sliding panel.</p>
</div>
<!--?php 
if(!$_SESSION['id']):
// If you are not logged in
?-->
<div class="left"><!-- Login Form --><form class="clearfix" action="" method="post">
<h1>Member Login</h1>
<!--?php 
if($_SESSION['msg']['login-err'])
{
	echo '<div class="err"-->'.$_SESSION['msg']['login-err'].'</form></div>
'; unset($_SESSION['msg']['login-err']); // This will output login errors, if any } ?&gt; <label class="grey" for="username">Username:</label> <input id="username" class="field" name="username" size="23" type="text" value="" /> <label class="grey" for="password">Password:</label> <input id="password" class="field" name="password" size="23" type="password" /> <label><input id="rememberMe" checked="checked" name="rememberMe" type="checkbox" value="1" /> &nbsp;Remember me</label>
<div class="clear">&nbsp;</div>
<input class="bt_login" name="submit" type="submit" value="Login" /></div>
<div class="left right"><!-- Register Form --><form action="" method="post">
<h1>Not a member yet? Sign Up!</h1>
<!--?php 

if($_SESSION['msg']['reg-err'])
{
	echo '<div class="err"-->'.$_SESSION['msg']['reg-err'].'</form></div>
'; unset($_SESSION['msg']['reg-err']); // This will output the registration errors, if any } if($_SESSION['msg']['reg-success']) { echo '
<div class="success">'.$_SESSION['msg']['reg-success'].'</div>
'; unset($_SESSION['msg']['reg-success']); // This will output the registration success message } ?&gt; <label class="grey" for="username">Username:</label> <input id="username" class="field" name="username" size="23" type="text" value="" /> <label class="grey" for="email">Email:</label> <input id="email" class="field" name="email" size="23" type="text" /> <label>A password will be e-mailed to you.</label> <input class="bt_register" name="submit" type="submit" value="Register" /></div>
<!--?php 
else:
// If you are logged in
?-->
<div class="left">
<h1>Members panel</h1>
<p>You can put member-only data here</p>
<a href="registered.php">View a special member page</a>
<p>- or -</p>
<a href="?logoff">Log off</a></div>
<div class="left right">&nbsp;</div>
<!--?php 
endif;
// Closing the IF-ELSE construct
?--></div>
<!-- /login -->
<p>&nbsp;</p>
<!-- The tab on top -->
<div class="tab">
<ul class="login">
<li class="left">&nbsp;</li>
<li>Hello <!--?php echo $_SESSION['usr'] ? $_SESSION['usr'] : 'Guest';?-->!</li>
<li class="sep">|</li>
<li id="toggle"><a id="open" class="open" href="#"><!--?php echo $_SESSION['id']?'Open Panel':'Log In | Register';?--></a> <a id="close" class="close" style="display: none;" href="#">Close Panel</a></li>
<li class="right">&nbsp;</li>
</ul>
</div>
<!-- / top --><!--panel -->
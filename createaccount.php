<!-- This form page is used to create a user account.
	 Uses accountcreation.php -->
<form action="accountcreation.php" method="get">
<table style="height: 295px;" border="1" width="450">
<tbody>
<tr>
<td colspan="2" align="center">
<p><span style="font-size: medium;"><strong>Create an account here</strong></span></p>
</td>
</tr>
<tr>
<td>User Name</td>
<td align="center">
<p>must be 25 characters or less<input id="cusername" name="cusername" size="25" type="text" /></p>
</td>
</tr>
<tr>
<td>Password</td>
<td align="center">must be 25 characters or less<input type="password" id="cpassword" name="cpassword" size="25" type="text" /></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="Create Account" /></td>
</tr>
</tbody>
</table>
</form>
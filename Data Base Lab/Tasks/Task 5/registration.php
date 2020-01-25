<!DOCTYPE html>
<html>
<head>
	<title>Student Registeration</title>
</head>
<body>
	<form action = "reg.php" method = "post">
		<table align="center">
			<th colspan="2">Student Registeration</th>
			<tr>
				<td>
					 course_code
				</td>
				<td>
					<input type="text" name="txtcourse_code" required>
				</td>
			</tr>
			<tr>
				<td>
					course_name
				</td>
				<td>
					<input type="text" name="txtcourse_name"required>
				</td>
			</tr>
			<tr>
				<td>
					credit_hours
				</td>
				<td>
					<input type="text" name="txtcredit_hours"required>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<input type="submit" value ="Reg">
				</td>
			</tr> 
			
			<tr>
				<td colspan="2">
					<?php
						if (isset($_GET["Message"])) {
							echo $_GET["Message"];
						}
					?>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>

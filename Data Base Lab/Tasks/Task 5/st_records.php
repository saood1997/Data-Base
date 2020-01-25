<?php
	include "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student's Record</title>
</head>
<body>
	<form action="" method="post">
		<table align="center">
			<th colspan="2">Search Student</th>
			<tr>
				<td>
					Roll No
				</td>
				<td>
					<input type="text" name="txtRNo" required>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<input type="submit" value="Search">
				</td>
			</tr>
		</table>
	</form>
	<?php
		if (isset($_POST["txtRNo"])) {
			$roll = $_POST["txtRNo"];
			$qry = "SELECT * FROM student WHERE roll_no = '".$roll."'";
			$res = $con->query($qry);
			$result = "";

			if ($res->num_rows>0) {
				$result .= "<table align='center'>";
				$result .= "<th>Roll No</th><th></th><th>Name</th><th></th><th>Father's Name</th><th></th><th>Gender</th><th></th><th>Contact No</th><th></th><th>Address</th>";
				while ($row = $res->fetch_assoc()) 
				{
					//one row
					$result .= "<tr>
									<td>
										".$row['roll_no']."
									</td>
									<td></td>
									<td>
										".$row['st_name']."
									</td>
									<td></td>
									<td>
										".$row['f_name']."
									</td>
									<td></td>
									<td>
										".$row['gender']."
									</td>
									<td></td>
									<td>
										".$row['contact']."
									</td>
									<td></td>
									<td>
										".$row['address']."
									</td>
								</tr>";
				}
				$result .= "</table>";
			}
			echo $result;

			$qry = "SELECT Courses.course_code, course_name, credit_hour FROM Courses, enrole WHERE Courses.course_code=enrole.course_code AND roll_no='".$roll."'";
			$res = $con->query($qry);
			$result = "";
			$result .= "<h3 align=center>Courses Registered</h3>";
			
			if ($res->num_rows>0) {
				$result .= "<table align='center'>";
				$result .= "<th>Code</th><th></th><th>Course Name</th><th></th><th>Credit Hour</th>";
				while ($row = $res->fetch_assoc())
				{
					$result .= "<tr>
									<td>
										".$row['course_code']."
									</td>
									<td></td>
									<td>
										".$row['course_name']."
									</td>
									<td></td>
									<td>
										".$row['credit_hour']."
									</td>
								</tr>";
				}
				$result .= "</table>";
			}
			echo $result;

			$qry = "SELECT * FROM Courses WHERE course_code != all(SELECT course_code from enrole WHERE roll_no='".$roll."')";
			$res = $con->query($qry);
			$result = "";
			$result .= "<h3 align=center>Availible Courses</h3>";
			
			if ($res->num_rows>0) {
				$result .= "<form action= method=post><table align='center'>";
				$result .= "<th>Code</th><th></th><th>Course Name</th><th></th><th>Credit Hour</th>";
				while ($row = $res->fetch_assoc())
				{
					$result .= "<tr>
									<td>
										".$row['course_code']."
									</td>
									<td></td>
									<td>
										".$row['course_name']."
									</td>
									<td></td>
									<td>
										".$row['credit_hour']."
									</td>
									<td></td>
									<td>
										<input type=submit value=Register>
									</td>
								</tr>";
				}
				$result .= "</table> </form>";
			}
			echo $result;			
		}
	?>


</body>
</html>
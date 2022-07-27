<?php
$connect = mysqli_connect("localhost", "root", "", "sellers");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "SELECT * FROM product WHERE type LIKE '%".$search."%'";
}
else
{
	$query = "
	SELECT * FROM product ORDER BY id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Type</th>
							<th>Color</th>
							<th>Size</th>
							<th>Price</th>
							<th>ID</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["type"].'</td>
				<td>'.$row["color"].'</td>
				<td>'.$row["size"].'</td>
				<td>'.$row["price"].'</td>
				<td>'.$row["id"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>jquery table</title>
</head>
<body>
	<table border="1">
		<thead>
			<tr>
				<th>nome</th>
				<th>idade</th>
			</tr>
		</thead>
		<tbody id="tab1">
			<tr>
				<td>Lucas</td>
				<td>26</td>
			</tr>
			<tr>
				<td>Marcos</td>
				<td>24</td>
			</tr>
			<tr>
				<td>Pedro</td>
				<td>16</td>
			</tr>
		</tbody>
	</table>
	<table border="1">
		<thead>
			<tr>
				<th>nome</th>
				<th>idade</th>
			</tr>
		</thead>
		<tbody id="tab2">
			<tr>
				<td>João</td>
				<td>26</td>
			</tr>
		</tbody>
	</table>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#tab1 tr").click(function() {
				var row = $(this).closest('tr');
				var nome = row.find("td:eq(0)").text();
				var idade = row.find("td:eq(1)").text();

				var html = '<tr id="tab1_novo">'
				+"<td>"+nome+"</td><td>"+idade+"</td>"
				+"</tr>"
				;
				$("#tab2 tr").after(html);
			});
			$("#tab2 tr").click(function() {
				/* Act on the event */
				console.log('tabela 2');
			});
			$("#tab2 #tab1_novo").click(function() {
				/* Act on the event */
				console.log('elemento novo da tab 2');
			});
		});
	</script>
</body>
</html>
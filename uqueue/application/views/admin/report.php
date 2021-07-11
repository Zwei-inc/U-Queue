<?php echo $header; ?>

<body class="index-page sidebar-collapse b">
<a href="<?php echo $baseurl ?>index.php/admin/show_admin_board">back to admin panel</a><br>
<table class="t1">
	<tr>
		<th>id</th>
		<th>name</th>
		<th>date_time</th>
		<th>email</th>
		<th>service</th>
	<tr>
<?php 
	foreach($report as $r){
	?>
	<tr>
		<td><?php echo $r->id ?></td>
		<td><?php echo $r->name ?></td>
		<td><?php echo $r->date_time ?></td>
		<td><?php echo $r->email ?></td>
		<td><?php echo $r->service_id ?></td>
	<tr>
	
	<?php	
	}
?>
</table>
</body>
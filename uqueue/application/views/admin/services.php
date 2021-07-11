<?php echo $header; ?>

<body class="index-page sidebar-collapse b">
<a href="<?php echo $baseurl ?>index.php/admin/show_admin_board">back to admin panel</a><br>
<table class="t1">
	<tr>
		<th>id</th>
		<th>name</th>
		<th>duration</th>
		<th>details</th>
	<tr>
<?php 
	foreach($services as $s){
	?>
	<tr>
		<td><?php echo $s->id ?></td>
		<td><?php echo $s->name ?></td>
		<td><?php echo $s->duration ?></td>
		<td><?php echo $s->details ?></td>
	<tr>
	
	<?php	
	}
?>
</table>
</body>
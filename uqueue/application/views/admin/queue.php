<?php echo $header; ?>

<body class="index-page sidebar-collapse b">
<a href="<?php echo $baseurl ?>index.php/admin/show_admin_board">back to admin panel</a><br>
<table class="t1">
	<tr>
		<th>token no</th>
		<th>Email</th>
		<th>Start time</th>
		<th>End time</th>
		<th>Status</th>
		<th>Hold on</th>
		<th>Pin </td>
		<th>Service id</td>
		<th>Counter_id</td>
	<tr>
<?php 
	foreach($queue as $q){
	?>
	<tr>
		<td><?php echo $q->token_no ?></td>
		<td><?php echo $q->email ?></td>
		<td><?php echo $q->starttime ?></td>
		<td><?php echo $q->endtime ?></td>
		<td><?php echo $q->status ?></td>
		<td><?php echo $q->hold_on ?></td>
		<td><?php echo $q->pin ?></td>
		<td><?php echo $q->service_id ?></td>
		<td><?php echo $q->counter_id ?></td>
	<tr>
	
	<?php	
	}
?>
</table>
</body>
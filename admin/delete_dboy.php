<?php
include 'connection.php';
error_reporting(0);
$id=$_GET['id'];
$deletequery="delete from dboy where id=$id";
$query=mysqli_query($conn,$deletequery);

if($query){
	?>
	<script>
	alert('deleted successfully');
	</script>
<?php
 header('location:viewdboy.php');
}else{
	?>
	<script>
	alert('deleted unsuccessfully');
	</script>
	<?php
}
?>
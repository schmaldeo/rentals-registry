<?php
include('../db_conn.php');

$id = $_GET['id']; 
$res = mysqli_query($conn,"SELECT * FROM info WHERE id='$id'"); 

$data = mysqli_fetch_array($res); 

if(isset($_POST['update'])) {
    $returndate = $_POST['returndate'];
    $receiver = $_POST['receiver'];
	
    $edit = mysqli_query($conn,"update info set returndate='$returndate', receiver='$receiver', returned=1 where id='$id'");
	
    if($edit) {
        mysqli_close($conn); 
        header("location:index.php"); 
        exit;
    } else {
        echo mysqli_error();
    }    	
}
?>
<style>
	<?php include '../style.css'; ?>
</style>

<div id="main">
    <h3>Return</h3>

    <form method="POST">
    <div class="input">
        <label for="return">Date of return</label><br>
        <input type="date" id="returndate" name="returndate" required><br><br>
        <label for="receiver">Receiver</label><br>
        <input type="text" id="receiver" name="receiver" required><br><br>
        <button type="submit" name="update">Return</button>
    </div>
    <div id="anchors">
		<div class="awyp">
			<a href="/">Back</a>
		</div>
	</div>
    </form>
</div>

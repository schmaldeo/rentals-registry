<?php
include_once "../db_conn.php";

$id = $_GET['id'];

$mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, "rentalsregistry");

$res = $mysqli->query("SELECT * FROM rentals WHERE id=$id");

$data = mysqli_fetch_array($res);

if (isset($_POST['update'])) {
  $returndate = $_POST['returndate'];
  $receiver = $_POST['receiver'];

  $mysqli->query("UPDATE rentals SET returndate='$returndate', receiver='$receiver', returned=1 WHERE id=$id");

  $mysqli->close();
  header("Location: ./index.php");
}
?>
<style>
  <?php include '../style.css'; ?>
</style>

<div id="main">
  <h3>Return</h3>

  <form method="POST">
    <div class="input">
      <label for="returndate">Date of return</label><br>
      <input type="date" id="returndate" name="returndate" required><br><br>
      <label for="receiver">Receiver</label><br>
      <input type="text" id="receiver" name="receiver" required><br><br>
      <button type="submit" name="update">Return</button>
    </div>
    <div id="anchors">
      <div class="awyp">
        <a href="./index.php">Back</a>
      </div>
    </div>
  </form>
</div>

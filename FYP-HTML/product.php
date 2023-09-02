<?php include_once('common/header.php'); ?>

<?php
// Get pen details from database by id
require_once('dbConnect.php');
global $conn;

$sql = "SELECT * FROM `pen` WHERE `id`={$_GET["id"]}";

$rs = mysqli_query($conn, $sql);

$details = mysqli_fetch_assoc($rs);
?>


<div class="container mt-3">
  <div class="row">
    <div class="col-md-8 text-center">
      <img src="img/<?php echo $details["name"];?>.jpeg" alt="<?php echo $details["name"]; ?>" class="product-image" />
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <?php  echo '<h5> '. $details["name"] .' </h5>' ;
                 echo '<p> <strong>Brand:</strong>' .$details["brend"].' </p>';
                 echo '<p> <strong>Nib:</strong> ' .$details["nib"].' </p> ';
                 echo '<p> <strong>Material:</strong> '. $details["material"].' </p>';
                 echo '<p> <strong>Writing Style:</strong> '.$details["writing-style"].' </p>';
                 echo '<p> <strong>Ink System:</strong>'.$details["ink-system"].' </p>';
                 echo '<p> <strong>Price:</strong> $'.$details["price"].' </p>';
          ?></div>
        <div class="card-body text-center"><?php echo $details["specification"]?>
        </div>
</div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col">

      <div class="card">
        <div class="card-header">Writing Example</div>
        <div class="card-body text-center">
          <?php echo '<img src="writingexp/' . $details["id"] .'.jpg" class="wexp" alt= "..."/>'?>
        </div>
      </div>

    </div>
  </div>

</div>

<?php include_once('common/footer.php'); ?>
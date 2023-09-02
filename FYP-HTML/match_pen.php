<?php include_once("common/header.php") ?>
<?php
include_once("dbConnect.php");
global $conn;

function checkWritingStyle($pen, $writing_style) {
  return $pen["writing-style"] == $writing_style;
}
function checkInkSystem($pen, $ink_system) {
  return $pen["ink-system"] == $ink_system;
}
function checkMaterial($pen, $material) {
  return $pen["material"] == $material;
}
function checkNib($pen, $nib) {
  return $pen["nib"] == $nib;
}
function checkPriceRange($pen, $price_range) {
  switch ($price_range) {
    case "$0 - $500":
      return ($pen["price"] <= 500);
      break;
    case "$501 - $1000":
      return ($pen["price"] >= 501 && $pen["price"] <= 1000);
      break;
    case "$1000 up":
      return ($pen["price"] >= 1001);
      break;
  }
}

$writing_style = [
  "Japanese",
  "European"
];

$ink_system = [
  "Converter",
  "Extra"
];

$material = [
  "Resin",
  "Metal",
  "Markrolon"
];

$nib = [
  "Stainless-steel",
  "14k",
  "18k",
  "21k"
];

$price_range = [
  "$0 - $500",
  "$501 - $1000",
  "$1000 up"
];

$writing_style_selected = $writing_style[$_GET["q1"]];
$ink_system_selected = $ink_system[$_GET["q2"]];
$material_selected = $material[$_GET["q3"]];
$nib_selected = $nib[$_GET["q4"]];
$price_range_selected = $price_range[$_GET["q5"]];

// var_dump($writing_style_selected);
// var_dump($ink_system_selected);
// var_dump($material_selected);
// var_dump($nib_selected);
// var_dump($price_range_selected);

$pens = array();

$sql = "SELECT COUNT(`id`) AS `count` FROM `pen`;";
$rs = mysqli_query($conn, $sql);
$rc = mysqli_fetch_assoc($rs);
$total_of_pens = $rc["count"];

$sql = "SELECT * FROM `pen`;";
$rs = mysqli_query($conn, $sql);
while ($rc = mysqli_fetch_assoc($rs)) {
  if (
    checkWritingStyle($rc, $writing_style_selected) &&
    checkInkSystem($rc, $ink_system_selected) &&
    checkMaterial($rc, $material_selected) &&
    checkNib($rc, $nib_selected) &&
    checkPriceRange($rc, $price_range_selected)
  ) {
    $score = 0.2;

    $writing_style_nv = 0;
    $ink_system_nv = 0;
    $material_nv = 0;
    $nib_nv = 0;
    $price_nv = 0;

    $va = 0;

    // (score / (score * total_of_pens)) * weight
    // Question 1
    if ($rc["writing-style"] == $writing_style_selected) {
      $writing_style_nv = ($score / ($score * $total_of_pens)) * 0.75;
    } else {
      $writing_style_nv = ($score / ($score * $total_of_pens)) * 0.25;
    }

    // Question 2
    if ($rc["ink-system"] == $ink_system_selected) {
      $ink_system_nv = ($score / ($score * $total_of_pens)) * 0.75;
    } else {
      $ink_system_nv = ($score / ($score * $total_of_pens)) * 0.25;
    }


    // Question 3
    if ($rc["material"] == $material_selected) {
      $material_nv = ($score / ($score * $total_of_pens)) * 0.66666667;
    } else {
      $material_nv = ($score / ($score * $total_of_pens)) * 0.16666667;
    }

    // Question 4
    if ($rc["nib"] == $nib_selected) {
      $nib_nv = ($score / ($score * $total_of_pens)) * 0.5;
    } else {
      $nib_nv = ($score / ($score * $total_of_pens)) * 0.166666667;
    }

    // Question 5
    if (checkPriceRange($rc, $price_range_selected)) {
      $price_nv = ($score / ($score * $total_of_pens)) * 0.66666667;
    } else {
      $price_nv = ($score / ($score * $total_of_pens)) * 0.16666667;
    }

    // Sum all nv => va
    $va = $writing_style_nv + $ink_system_nv + $material_nv + $nib_nv + $price_nv;

    $pens[$rc["id"]] = $va;
  }
}

// Sort the "$pens" array
arsort($pens);

$firstFivePens = array_slice($pens, 0, 5, true);

$pens = array();

foreach($firstFivePens as $key => $value) {
  $sql = "SELECT * FROM `pen` WHERE `id` = $key";
  $rs = mysqli_query($conn, $sql);
  $rc = mysqli_fetch_assoc($rs);
  array_push($pens, $rc);
}

// print(var_dump($pens, $rc));


// print(var_dump($pens));
$count = 1;
foreach($pens as $id) {
  if ($count == 1) {
    echo "<div class='row mt-2'>";
  }
  echo "<div class='col-md-3'>";
  echo "<div class='card'>";
  echo '<div class="card product">';
  echo '<img src="img/' . $id["name"] . '.jpeg" class="imgpensize" alt="...">';
  echo '<div class="card-body">';
  echo '<h5 class="card-title">'. $id["name"] . '</h5>';
  echo '<p class="card-text"><strong>Brend:</strong> '. $id["brend"] . '</p>';
  echo '<p class="card-text"><strong>Nib:</strong> ' . $id["nib"] . '</p>';
  echo '<p class="card-text"><strong>Material:</strong> ' . $id["material"] . '</p>';
  echo '<p class="card-text"><strong>Writing Style:</strong> ' . $id["writing-style"] . '</p>';
  echo '<p class="card-text"><strong>Ink System:</strong> ' . $id["ink-system"] . '</p>';
  echo '<p class="card-text"><strong>Price:</strong> $' . $id["price"] . '</p>';
  echo '<a href="product.php?id=' . $id["id"] . '" class="btn btn-primary">Details</a>';
  echo '</div>';
  echo '</div>';
  echo "</div>";
  echo "</div>";
  
  
  if ($count == 4) {
    echo "</div>";
    $count = 1;
  } else {
    $count++;
  }

}




<?php

// Define criteria and sub-criteria
$criteria = array(
    "Material" => array("Metal", "Resin"),
    "Nib" => array("Stainless Steel", "14k", "18k", "21k"),
    "Writing Style" => array("Japanese", "European"),
    "Ink System" => array("Converter", "Extra Ink System"),
    "Price Range" => array("$0-$500", "$500-$1000", "$1000-$1500", "$1500 and up")
);

// Step 3: Determine the weights of each criterion and sub-criterion
$weights = array(
  'Material' => array(
      'Metal' => 0.5,
      'Resin' => 0.5,
  ),
  'Nib' => array(
      'Stainless Steel' => 0.25,
      '14k Gold' => 0.25,
      '18k Gold' => 0.25,
      '21k Gold' => 0.25,
  ),
  'Writing Style' => array(
      'Japanese' => 0.5,
      'European' => 0.5,
  ),
  'Ink System' => array(
      'Cartridge/Converter' => 0.5,
      'Extra Ink System' => 0.5,
  ),
  'Price Range' => array(
      '$0 - $500' => 0.25,
      '$500 - $1000' => 0.25,
      '$1000 - $1500' => 0.25,
      '$1500 up' => 0.25,
  ),
);

// Step 4: Collect the decision-maker's preferences for each criterion and sub-criterion
if(isset($_POST['submit-btn'])) {
$writing_style_preference = $_POST['q1'];
$ink_system_preference = $_POST['q2'];
$material_preference = $_POST['q3'];
$nib_preference = $_POST['q4'];
$price_range_preference = $_POST['q5'];}



// Step 5: Calculate the overall scores for each pen in the database
$conn = mysqli_connect('localhost', 'root', 'root', 'excel_data_pen');

$sql = "SELECT * FROM pen";
$result = mysqli_query($conn, $sql);

$scores = array();
while ($row = mysqli_fetch_assoc($result)) {
  $score = 0;

  // Calculate the score for the Material criterion
  $material_weight = $weights['Material'][$row['material']];
  if ($row['material'] == $material_preference) {
      $score += $material_weight;
  }

  // Calculate the score for the Nib criterion
  $nib_weight = $weights['Nib'][$row['nib']];
  if ($row['nib'] == $nib_preference) {
      $score += $nib_weight;
  }

  // Calculate the score for the Writing Style criterion
  $writing_style_weight = $weights['Writing Style'][$row['writing_style']];
  if ($row['writing_style'] == $writing_style_preference) {
      $score += $writing_style_weight;
  }

  // Calculate the score for the Ink System criterion
  $ink_system_weight = $weights['Ink System'][$row['ink_system']];
  if ($row['ink_system'] == $ink_system_preference) {
      $score += $ink_system_weight;
  }

  // Calculate the score for the Price Range criterion
  $price_range_weight = $weights['Price Range'][$row['price_range']];
  if ($row['price_range'] == $price_range_preference) {
      $score += $price_range_weight;
  }

  $scores[$row['id']] = $score;
}

// Recommend the pen with the highest score to the decision-maker
arsort($scores);
$recommended_pen_id = key($scores);

// Connect to the database
$conn = mysqli_connect($localhost, $root, $root, $excel_data_pen);

// Query the database to find the pen with the highest score
$query = "SELECT * FROM pen ORDER BY score DESC LIMIT 1";
$result = mysqli_query($conn, $query);

// Display the pen information to the user
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "<h2>Recommended Pen:</h2>";
    echo "<ul>";
    echo "<li>Name: " . $row["name"] . "</li>";
    echo "<li>Material: " . $row["material"] . "</li>";
    echo "<li>Nib: " . $row["nib"] . "</li>";
    echo "<li>Writing Style: " . $row["writing_style"] . "</li>";
    echo "<li>Ink System: " . $row["ink_system"] . "</li>";
    echo "<li>Price: " . $row["price"] . "</li>";
    echo "</ul>";
} else {
    echo "No pens found.";
}

// Close the database connection
mysqli_close($conn);



?>
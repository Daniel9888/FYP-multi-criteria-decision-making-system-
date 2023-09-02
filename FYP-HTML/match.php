<?php include_once("common/header.php"); ?>

<div class="container text-center" id="form-container">
  <div id="intro">
    <div class="row">
      <div class="col">
        <h2>
          Wecome! This is a automation pen matching system. <br>
          In the follwing , you will answer a few questions. <br>
          Based on your answers , it will match some pens for you. <br>
          Wish you the best of luck on starting the journey on fountain pen ~
        </h2>
      </div>
    </div>
    </div>

    <div class="row text-end mt-2">
      <div class="col p-2"><button type="button" class="btn btn-primary" id="show-form-btn" onclick="showForm()">Start</button></div>
    </div>
    </div>



  <form action="match_pen.php" method="GET" id="my-form" style="display:none;">
    <div id="question1">
      <div class="card">
        <div class="card-header">
          <p>
            1. What writing style do you prefer? <br /> (Japanese is finer on the ink out put and writing line)
          </p>
        </div>
        <ul class="list-group list-group-flush">
          <label for="q1-1">
            <li class="list-group-item">
              <input type="radio" id="q1-1" name="q1" value="0" />
              Japanese Writing Style 
            </li>
          </label>
          <label for="q1-2">
            <li class="list-group-item">
              <input type="radio" id="q1-2" name="q1" value="1" />
              European Writing Style
            </li>
          </label>
        </ul>
      </div>
    </div>
  
    <div id="question2">
      <div class="card">
        <div class="card-header">
          <p>
            2. What ink system do you need? <br /> (Converter= 0.2-0.7 ml ; Extra ink system e.g. Piston filling contain more ink)
          </p>
        </div>
        <ul class="list-group list-group-flush">
          <label for="q2-1">
            <li class="list-group-item">
              <input type="radio" id="q2-1" name="q2" value="0" />
              Converter
            </li>
          </label>
          <label for="q2-2">
            <li class="list-group-item">
              <input type="radio" id="q2-2" name="q2" value="1" />
              Extra ink system
            </li>
          </label>
        </ul>
      </div>
    </div>
  
    <div id="question3">
      <div class="card">
        <div class="card-header">
          <p>
            3. What body material  do you prefer?
          </p>
        </div>
        <ul class="list-group list-group-flush">
          <label for="q3-1">
            <li class="list-group-item">
              <input type="radio" id="q3-1" name="q3" value="0" />
              Resin
            </li>
          </label>
          <label for="q3-2">
            <li class="list-group-item">
              <input type="radio" id="q3-2" name="q3" value="1" />
              Metal
            </li>
          </label>
          <label for="q3-3">
            <li class="list-group-item">
              <input type="radio" id="q3-3" name="q3" value="2" />
              Makrolon (High durability glass like material)
            </li>
          </label>
        </ul>
      </div>
    </div>
  
    <div id="question4">
      <div class="card">
        <div class="card-header">
          <p>
            4. What nib material do you prefer? <br>(More % of gold usually more flexibility)
          </p>
        </div>
        <ul class="list-group list-group-flush">
          <label for="q4-1">
            <li class="list-group-item">
              <input type="radio" id="q4-1" name="q4" value="0" />
              Stainless Steel
            </li>
          </label>
          <label for="q4-2">
            <li class="list-group-item">
              <input type="radio" id="q4-2" name="q4" value="1" />
              14K Gold
            </li>
          </label>
          <label for="q4-3">
            <li class="list-group-item">
              <input type="radio" id="q4-3" name="q4" value="2" />
              18K Gold Explanation
            </li>
          </label>
          <label for="q4-4">
            <li class="list-group-item">
              <input type="radio" id="q4-4" name="q4" value="3" />
              21K Gold
            </li>
          </label>
        </ul>
      </div>
    </div>
  
    <div id="question5">
      <div class="card">
        <div class="card-header">
          <p>
            5. Price range that you would consider?
          </p>
        </div>
        <ul class="list-group list-group-flush">
          <label for="q5-1">
            <li class="list-group-item">
              <input type="radio" id="q5-1" name="q5" value="0" />
              $ 0 - $ 500
            </li>
          </label>
          <label for="q5-2">
            <li class="list-group-item">
              <input type="radio" id="q5-2" name="q5" value="1" />
              $ 500 - $ 1000
            </li>
          </label>
          <label for="q5-3">
            <li class="list-group-item">
              <input type="radio" id="q5-3" name="q5" value="2" />
              $ 1000 up
            </li>
          </label>
          <!-- <label for="q5-4">
            <li class="list-group-item">
              <input type="radio" id="q5-4" name="q5" value="3" />
              $ 1500 up
            </li>
          </label> -->
        </ul>
      </div>
    </div>
  
    <div id="submit-btn">
      <button type="submit" id="match-submit" class="btn btn-success">Submit</button>
    </div>
  </form>
 

</div>

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
if (isset($_POST['btn btn-success'])) {
  $writing_style_preference = $_POST['q1'];
  $ink_system_preference = $_POST['q2'];
  $material_preference = $_POST['q3'];
  $nib_preference = $_POST['q4'];
  $price_range_preference = $_POST['q5'];
}




?>

<?php include_once("common/footer.php"); ?>
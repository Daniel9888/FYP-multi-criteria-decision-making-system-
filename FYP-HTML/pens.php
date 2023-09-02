<?php include_once("common/header.php") ?>

<div class="container">

    <?php
        include_once('dbConnect.php');
        global $conn;

        $sql = "SELECT * FROM pen";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {

            $i = 0;

            while ($row = mysqli_fetch_assoc($result)) {

                if ($i == 0) {
                    echo '<div class="row mt-2">';
                }

                echo '<div class="col-md-3">';
                echo '<div class="card product">';
                echo '<img src="img/' . $row["name"] . '.jpeg" class="imgpensize" alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["name"] . '</h5>';
                echo '<p class="card-text"><strong>Brand:</strong> ' . $row["brend"] . '</p>';
                echo '<p class="card-text"><strong>Nib:</strong> ' . $row["nib"] . '</p>';
                echo '<p class="card-text"><strong>Material:</strong> ' . $row["material"] . '</p>';
                echo '<p class="card-text"><strong>Writing Style:</strong> ' . $row["writing-style"] . '</p>';
                echo '<p class="card-text"><strong>Ink System:</strong> ' . $row["ink-system"] . '</p>';
                echo '<p class="card-text"><strong>Price:</strong> $' . $row["price"] . '</p>';
                echo '<a href="product.php?id=' . $row["id"] . '" class="btn btn-primary">Details</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                if ($i == 3) {
                    echo '</div>';
                    $i = 0;
                } else {
                    $i++;
                }
            }
        } else {
            echo "0 results";
        }

        mysqli_close($conn);
    ?>

</div>

<?php include_once("common/footer.php") ?>
<?php
include 'config.php';

$sql = "SELECT adurl, adtit FROM _ad ORDER BY RAND() LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $ads = [];
    while ($row = $result->fetch_assoc()) {
        $ads[] = $row;
    }

    $lineCount = 0;
    echo '<div id="adCarousel" style="display: flex; flex-wrap: wrap; justify-content: space-around;">';
    foreach ($ads as $ad) {
        $adTitleLength = strlen($ad["adtit"]);
        $lineCount += $adTitleLength;

        if ($lineCount > 50) {
            break;
        }

        echo '<div class="adItem" style="padding: 5px; margin: 5px; border: 1px solid #ccc; border-radius: 5px;">
                <a href="' . $ad["adurl"] . '" target="_blank" style="text-decoration: none; color: inherit;">
                    <h3 style="font-size: 1.1em; margin: 0;">' . $ad["adtit"] . '</h3>
                </a>
              </div>';
    }
    echo '</div>';
} else {
    echo "暂无广告";
}
$conn->close();
?>

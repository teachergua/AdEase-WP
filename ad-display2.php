<?php
include 'config.php';

$sql = "SELECT adurl, adtit, adtxt FROM _ad ORDER BY RAND() LIMIT 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo '<div id="adCarousel">';
  while($row = $result->fetch_assoc()) {
    echo '<div class="adItem" style="width:100%;margin:4px 0;padding:4px;">
            <a href="'.$row["adurl"].'" target="_blank">
              <h3 style="font-size:1.2em;color:ffffff;margin:0;">'.$row["adtit"].'</h3>
              <p style="font-size:0.9em;color:Gray;">'.$row["adtxt"].'</p>
            </a>
          </div>';
  }
  echo '</div>';
} else {
  echo "暂无广告";
}
$conn->close();
?>

<?php 
    include 'config.php'; 
    $sql = "SELECT adurl, bannerimgurl FROM _ad"; 
    if ($result = $conn->query($sql)) {
        $ads = []; 
        while($row = $result->fetch_assoc()) {
            $ads[] = $row;
        } 
        $ad = $ads[array_rand($ads)];

        echo '<div class="custom-image"> 
                <a href="'.$ad['adurl'].'" target="_blank"> 
                    <img src="'.$ad['bannerimgurl'].'" alt="（暗网广告）" width="800" height="150" style="max-width: 100%;" /> 
                </a> 
                <span class="close-ad" onclick="closeAd(this)">X</span> 
            </div>';
    } else { 
        die('Error (' . $conn->errno . ') ' . $conn->error);
    } 
    $conn->close(); 
?>

<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $propicurl = $_POST["propicurl"];
  $adurl = $_POST["adurl"];
  $adtit = $_POST["adtit"];
$adtxt = $_POST["adtxt"];

$sql = "INSERT INTO _ad (propicurl, adurl, adtit, adtxt) VALUES ('$propicurl', '$adurl', '$adtit', '$adtxt')";

if ($conn->query($sql) === TRUE) {
echo "广告已成功添加";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>添加广告</title>
</head>
<body>
  <h1>添加广告</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    图片来源地址：<input type="text" name="propicurl" required><br>
    广告链接：<input type="text" name="adurl" required><br>
    广告名字：<input type="text" name="adtit" required><br>
    广告介绍：<textarea name="adtxt" required></textarea><br>
    <input type="submit" value="提交">
  </form>
</body>
</html>

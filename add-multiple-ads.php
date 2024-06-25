<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $filename = $_FILES["csvfile"]["tmp_name"];

  if ($_FILES["csvfile"]["size"] > 0) {
    $file = fopen($filename, "r");
    fgetcsv($file); // 跳过第一行（标题行）

    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
      $propicurl = $data[0];
      $adurl = $data[1];
      $adtit = $data[2];
      $adtxt = $data[3];

      $sql = "INSERT INTO _ad (propicurl, adurl, adtit, adtxt) VALUES ('$propicurl', '$adurl', '$adtit', '$adtxt')";

      if ($conn->query($sql) === TRUE) {
        echo "广告已成功添加";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    fclose($file);
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>批量添加广告</title>
</head>
<body>
  <h1>批量添加广告</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    选择 CSV 文件：<input type="file" name="csvfile" accept=".csv" required><br>
    <input type="submit" value="上传并添加广告">
  </form>
</body>
</html>

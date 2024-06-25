<!DOCTYPE html>
<html>
<head>
  <title>瓜老师の选修课</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
  
  <style type="text/css">
    .title-container {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px 0;
    }
    .title-container .home-button {
      margin-right: 20px;
    }
    .banner {
      width: 100%;
      margin-bottom: 20px;
      text-align: center;
    }
    .banner img {
      max-width: 100%;
      height: auto;
    }
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Noto Sans', sans-serif;
    }
    body {
      background-color: #f5f5f5;
    }
    .container {
      display: grid;
      grid-template-columns: 1fr; 
      gap: 20px;
      padding: 20px;
      max-width: 960px;
      margin: 0 auto;
    }
    .item {
      display: flex;
      align-items: center;
      background-color: #ffffff;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
      transition: all 0.3s ease-in-out;
      text-decoration: none;
      color: #333333;
    }
    .item img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 5px;
      margin-right: 10px;
    }
    .item-description {
      flex-grow: 1;
    }
    .item-description h2 {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .item-description p {
      font-size: 14px;
    }
    .title {
      text-align: center;
      margin-top: 30px;
      margin-bottom: 20px;
      color: #333333;
      font-size: 24px;
      font-weight: bold;
    }
    .footer {
      text-align: center;
      margin-top: 50px;
      color: #333333;
      font-size: 12px;
    }
    .home-button {
      display: inline-block;
      padding: 10px;
      background-color: #000000;
      color: #ffffff;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
      text-decoration: none;
      transition: all 0.3s ease-in-out;
    }
    .home-button:hover {
      transform: scale(1.05);
      box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.3);
    }
  </style>
</head>
<body>
<!--
<div class="banner">
  <a href="https://comeon.ysq.lat">
    <img src="https://adpic.ysq.lat/vpnbanner.jpg" alt="Banner">
  </a>
</div>
-->
<div class="title-container">
  <a href="https://gualaoshi.org" class="home-button">主页</a>
  <h1 class="title">🍉瓜老师の选修课</h1>
</div>

<div class="container">
<?php
require 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$sql = "SELECT DISTINCT propicurl, adurl, adtit, adtxt FROM _ad ORDER BY RAND()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<a class="item" href="' . $row["adurl"] . '">';
        echo '<img src="' . $row["propicurl"] . '">';
        echo '<div class="item-description">';
        echo '<h2>' . $row["adtit"] . '</h2>';
        echo '<p>' . $row["adtxt"] . '</p>';
        echo '</div></a>';
    }
} else {
    echo "0 结果";
}

$conn->close();
?>

</div>
<div class="footer">
    商务合作请联系电报：
    <a href="https://t.me/nceng656" target="_blank" style="color: #333333;">t.me/nceng656</a>
</div>
</body>
</html>

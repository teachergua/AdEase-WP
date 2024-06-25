<!DOCTYPE html>
<html>
<head>
  <title>瓜老师の选修课</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
  <!-- CSS styles omitted for brevity -->
    <style type="text/css">
    /* 其他样式... */
    .title-container {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px 0;
    }
    .title-container .home-button {
      margin-right: 20px;
    }
    /* 添加的banner样式 */
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
      grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
      gap: 20px;
      padding: 20px;
      max-width: 960px;
      margin: 0 auto;
    }
    .item {
      background-color: #ffffff;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
      transition: all 0.3s ease-in-out;
      text-decoration: none;
      color: #333333;
    }
    .item:hover {
      transform: scale(1.05);
      box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.2);
    }
    .item img {
      width: 100%;
      height: 100px;
      object-fit: cover;
      border-radius: 5px;
      margin-bottom: 10px;
    }
    .item p {
      font-size: 14px;
      font-weight: bold;
      text-align: center;
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
<div class="banner">
  <a href="https://promter-management.onelink.me/WxKq/a125f3a0">
    <img src="https://adpic.teachergua.org/adbanner.png" alt="Banner">
  </a>
</div>

<div class="title-container">
  <a href="https://teachergua.org" class="home-button">主页</a>
  <h1 class="title">🍉瓜老师の选修课</h1>
</div>

<div class="container">
<?php
// 引入数据库配置文件
require 'dbconfig.php';

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 从_ad表中获取数据并随机排序，并根据propicurl字段进行去重
$sql = "SELECT DISTINCT propicurl, adurl, adtit FROM _ad ORDER BY RAND()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
        echo '<a class="item" href="' . $row["adurl"] . '">';
        echo '<img src="' . $row["propicurl"] . '">';
        echo '<p>' . $row["adtit"] . '</p>';
        echo '</a>';
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

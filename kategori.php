<?php
$kategori = $_GET['kategori'];
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://newsapi.org/v2/top-headlines?country=id&category=" . $kategori . "&apiKey=b7c3f3c417d94e57b0d79139519ab952");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($curl);
curl_close($curl);

$data = json_decode($output, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NewsToday!</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

</head>

<body>
  <nav class="navbar">
    <div class="content">
      <div class="logo">
        <a href=""><i class="fab fa-neos"></i>ewsToday! <br><span>Top Headline News Media Indonesia</span></a>
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-ellipsis-v"></i>
        </div>
        <li><a href="index.php">Home</a></li>
        <li><a href="kategori.php?kategori=business">Bisnis</a></li>
        <li><a href="kategori.php?kategori=entertainment">Entertaiment</a></li>
        <li><a href="kategori.php?kategori=health">Kesehatan</a></li>
        <li><a href="kategori.php?kategori=sports">Olahraga</a></li>
        <li><a href="kategori.php?kategori=science">Sains</a></li>
        <li><a href="kategori.php?kategori=technology">Teknologi</a></li>
      </ul>
      <div class="icon menu-btn">
        <i class="fas fa-ellipsis-h"></i>
      </div>
    </div>
  </nav>

  <div class="spasi"></div>

  <div class="main">
    <div class="wrapper">
      <?php foreach ($data['articles'] as $d) { ?>
        <div class="card">
          <div class="card-banner">
            <p class="category-tag"><?php $date = date_create($d['publishedAt']);
                                    echo date_format($date, "l, j F Y "); ?></p>
            <img src="<?php echo $d['urlToImage']; ?>" class="banner-img" alt="News Thumbnail">
          </div>
          <div class="card-body">
            <h2 class="blog-title"><a href="<?php echo $d['url']; ?>"></a><?php echo $d['title']; ?></h2>
            <div class="card-profile">
              <i class="far fa-user-circle" style="font-size: 20px;"></i>
              <div class="card-profile-info">
                <h5 class="profile-name"><?php echo $d['author']; ?></h5>
              </div>
            </div>
            <p class="blog-description"><?php echo $d['description']; ?></p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <footer class="footer">
    <p>By Muhammad Irsyad Havari 217280056 - Informatika B</p>
  </footer>

  <script src="./script.js"></script>
</body>
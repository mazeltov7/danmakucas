<?
$json = mb_convert_encoding(file_get_contents('http://api.twitcasting.tv/api/hotlist?count=10&type=json&lang=ja'), 'UTF-8', 'auto');
$users = json_decode($json, true);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
  .nicohead {
    font-family: './lib/Nicolas_Frespech.ttf';
  }
  a img.thumnail{
  background:none!important;
  }
   
  a:hover img.thumnail{
  opacity:0.6;
  filter:alpha(opacity=60);
  -ms-filter: "alpha( opacity=60 )";
  background:none!important;
  }
</style>
</head>
<body>
<header>
  <div style="background-color:#3891f5;margin:0;padding:0;">
    <span style="color:#ffffff;margin:0;padding-right:5px;font-size:large;font-weight:bold;" class="nicohead">DanmakuCas</span>
  </div>
</header>
<?
  for($i=0; $i<count($users); $i++) {
?>
<a href="/danmakucas/movie.php?user=<?= $users[$i]['userid'] ?>">
  <img src="<?= $users[$i]['thumbnail'] ?>" style="width:320px; height:180px;" class="thumnail">
</a>
<?
}
?>

</body>
</html>


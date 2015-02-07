<?
  $user = $_GET["user"];

  $data = file_get_contents('http://api.twitcasting.tv/api/commentlist?type=json&user=' . $user . '&count=40');
  $json = mb_convert_encoding($data, 'UTF-8', 'auto');
  $comments = json_decode($json, true);

  for($i=0;$i<count($comments);$i++){
    $messages[] = $comments[$i]['message'];
  }
  $Tmessages = join(",",$messages);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div style="position:relative;display:block;z-index:0;">
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" id="livestreamer" align="middle">
    <param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="true" />
    <param name="flashVars" value="user=<?= $user ?>&lang=ja&mute=0&cupdate=0&offline=" />
    <param name="movie" value="http://twitcasting.tv/swf/livestreamer2sp.swf" /><param name="quality" value="high" />
    <param name="bgcolor" value="#ffffff" /><embed src="http://twitcasting.tv/swf/livestreamer2sp.swf" quality="high" bgcolor="#ffffff" name="livestreamer" id="livestreamderembed" align="middle" allowScriptAccess="always" allowFullScreen="true" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer" flashVars="user=<?= $user ?>&lang=ja&mute=0&cupdate=0&offline=" >
</object>
</div>

<span id="a" style="position:absolute;top:10px;left:0px;z-index:1;"></span>
<span id="b" style="position:absolute;top:180px;left:0px;z-index:1;"></span>
<span id="c" style="position:absolute;top:300px;left:0px;z-index:1;"></span>




<script type="text/javascript">
  var tmessages = "<?= $Tmessages ?>";
  var  messages = tmessages.split(',');
  console.log(messages);
  console.log(messages.length);

  var messages1 = [];
  var messages2 = [];
  var messages3 = [];


  for(var i=0; i<messages.length; i++) {
    if(i%3 == 0){
      messages1.push(messages[i]);
    } else if (i%3 == 1) {
      messages2.push(messages[i]);
    } else if (i%3 == 2) {
      messages3.push(messages[i]);
    } else {
      console.log('hoge');
    }
  }
console.log(messages1);
console.log(messages2);
console.log(messages3);


function showMessage1(num) {
  document.getElementById('a').innerHTML = "<marquee loop='1' width='500%' scrollamount='10' style='color:#ffffff;font-size:200%;font-weight:bold;'>" + messages1[num] + "</marquee>";
}
function showMessage2(num) {
  document.getElementById('b').innerHTML = "<marquee loop='1' width='500%' scrollamount='10' style='color:#ffffff;font-size:200%;font-weight:bold;'>" + messages2[num] + "</marquee>";
}
function showMessage3(num) {
  document.getElementById('c').innerHTML = "<marquee loop='1' width='500%' scrollamount='10' style='color:#ffffff;font-size:200%;font-weight:bold;'>" + messages3[num] + "</marquee>";
}

console.log(messages1.length);
for(var i=0;i<messages1.length; i++) {
  setTimeout("showMessage1('" + i + "')", i*6000);
}
for(var i=0;i<messages2.length; i++) {
  setTimeout("showMessage2('" + i + "')", i*6000);
}
for(var i=0;i<messages3.length; i++) {
  setTimeout("showMessage3('" + i + "')", i*6000);
}

</script>


<script type="text/javascript">
  var mwidth = document.documentElement.clientWidth;
  var mheight = document.documentElement.clientHeight;

  console.log(mheight);
  console.log(mwidth);
  document.getElementById("livestreamer").style.width = "1000px";
  document.getElementById("livestreamer").style.height = "562px";
  document.getElementById("livestreamderembed").style.width = "1000px";
  document.getElementById("livestreamderembed").style.height = "562px";
</script>
</body>
</html>

<?php
	header('Content-type: text/html; charset=iso-8859-1');
 ?>
<html>
<head>
<title>Administration support</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript">
function ahah(url,target) {
    document.getElementById(target).innerHTML = 'loading data...';
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
        req.onreadystatechange = function() {ahahDone(target);};
        req.open("GET", url, true);
        req.send(null);
    } else if (window.ActiveXObject) {
        req = new ActiveXObject("Microsoft.XMLHTTP");
        if (req) {
            req.onreadystatechange = function() {ahahDone(target);};
            req.open("GET", url, true);
            req.send();
        }
    }
} 

function ahahDone(target) {
   // only if req is "loaded"
   if (req.readyState == 4) {
       // only if "OK"
       if (req.status == 200 || req.status == 304) {
           results = req.responseText;
           document.getElementById(target).innerHTML = results;
       } else {
           document.getElementById(target).innerHTML="ahah error:\n" +
               req.statusText;
       }
   }
}

var bSaf = (navigator.userAgent.indexOf('Safari') != -1);
var bOpera = (navigator.userAgent.indexOf('Opera') != -1);
var bMoz = (navigator.appName == 'Netscape');
function execJS(node) {
  var st = node.getElementsByTagName('SCRIPT');
  var strExec;
  for(var i=0;i<st.length; i++) {     
    if (bSaf) {
      strExec = st[i].innerHTML;
    }
    else if (bOpera) {
      strExec = st[i].text;
    }
    else if (bMoz) {
      strExec = st[i].textContent;
    }
    else {
      strExec = st[i].text;
    }
    try {
      eval(strExec.split("<!--").join("").split("-->").join(""));
    } catch(e) {
      alert(e);
    }
  }
}
</script>
</head>
<body>
</html>
<br>
<?php
	global $bgcolor3; $language;
	
	$comun 		= "modules/Forum/help/french/Schema_comun.txt";
	$primaire 	= "modules/Forum/help/french/Schema_primaire.txt";
	$main 		= "modules/Forum/help/french/Schema_main.txt";
	$search		= "modules/Forum/help/french/Schema_search.txt";
	$post	 	= "modules/Forum/help/french/Schema_post.txt";
	$fofo 		= "modules/Forum/help/french/Schema_viewforum.txt";
	$topic 		= "modules/Forum/help/french/Schema_viewtopic.txt";
	$screen 	= "modules/Forum/help/french/schema.jpg";
	
echo "<div style=\"height: 20px; margin: auto; text-align: center;\">
<b>Configuration File</b><br><br>
	<i>
		<a href=\"#\" onclick=\"javascript:ahah('" . $comun . "', 'bloc');\">		commun.php			</a>&nbsp;|&nbsp;
		<a href=\"#\" onclick=\"javascript:ahah('" . $primaire . "', 'bloc');\">	primaire.php		</a>&nbsp;|&nbsp;
		<a href=\"#\" onclick=\"javascript:ahah('" . $main . "', 'bloc');\">		main.php			</a>&nbsp;|&nbsp;
		<a href=\"#\" onclick=\"javascript:ahah('" . $search . "', 'bloc');\">		search.php			</a>&nbsp;|&nbsp;<br>
		<a href=\"#\" onclick=\"javascript:ahah('" . $post . "', 'bloc');\">		post.php			</a>&nbsp;|&nbsp;
		<a href=\"#\" onclick=\"javascript:ahah('" . $fofo . "', 'bloc');\">		viewforum.php		</a>&nbsp;|&nbsp;
		<a href=\"#\" onclick=\"javascript:ahah('" . $topic . "', 'bloc');\">		viewtopic.php		</a>&nbsp;|&nbsp;
		<a href=\"#\" onclick=\"window.open('" . $screen . "');\">					Voir le screenshot	</a>
	</i>
</div>
<br>
<br><br>";


echo"<div style=\"width: 90%; min-height: 300px; border: 1px dashed " . $bgcolor3 . "; margin: auto; padding: 20px;\">
	<div id=\"bloc\"><center>Warning! Change theme options resets Forum</center></div>
</div>
<br/>";

?>
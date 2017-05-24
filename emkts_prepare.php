
<?php
if (isset($argv[1])) {
  $a = $argv[1];
}
if (isset($argv[2])) {
  $b = $argv[2];
}
if (isset($argv[3])) {
  $c = $argv[3];
}


if ((isset($a)) && (isset($b)) && (isset($c))) {
  if ($a == "techdata") {
    $path = "/Users/ricardodeaquino/dropbox/d1up_emkts/Techdata/";
    $server_path = "http://www.agdp.com.br/techdata/";
    $titulo = "TechData";
  } elseif ($a == "stan") {
    $path = "/Users/ricardodeaquino/dropbox/d1up_emkts/stan/";
    $server_path = "http://www.stanparcerias.com.br/emkt/";
    $titulo = "Stan";
  } elseif ($a == "armani") {
    $path = "/Users/ricardodeaquino/dropbox/d1up_emkts/armani/";
    $server_path = "http://www.news-ga.com.br/";
    $titulo = "Armani";
  // } elseif ($a == "cna") {
  //   $path = "/Users/ricardodeaquino/dropbox/d1up_emkts/Techdata/";
  // $server_path = "http://www.agdp.com.br/techdata/";
  } elseif ($a == "modena") {
    $path = "/Users/ricardodeaquino/dropbox/d1up_emkts/modena/";
    $server_path = "http://www.modenaincorporadora.com.br/emkts/";
    $titulo = "Modena";
  } elseif ($a == "prestissimo") {
    $path = "/Users/ricardodeaquino/dropbox/d1up_emkts/prestissimo/";
    $server_path = "http://www.prestissimovilamariana.com.br/emkt/";
    $titulo = "Prestissimo";
  }
  $titulo_geral = str_replace("_", " ", $c);
$topo = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\"
\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<title>".$titulo." - ".$titulo_geral."</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
<style type=\"text/css\">td img {display: block;}</style>
</head>
<body bgcolor=\"#999999\">
  <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
    <tr>
      <td>
      <table";

$bottom = "/table>
		</td>
	</tr>
</table>
</body>
</html>";
$img_fix = "style=\"display:inline-block;border:0;\" src=\"".$server_path."images/";
$arquivo = $path.$b.".html";
  $file = file_get_contents($arquivo);
  // $troca = ("<title>", "</title>", "src=images/", "</table>", )
  $parts = explode("<table", $file);
  $frankstein = $topo.$parts[1];
  $parts = explode("/table>", $frankstein);
  $frankstein = $parts[0].$bottom;
  $final = str_replace("src=\"images/", $img_fix, $frankstein);
  echo $final;
  // var_dump($parts);
  // echo $file;
  // echo $path;
  $file_o = fopen($arquivo,"w");
  fwrite($file_o ,$final);
  fclose($file_o);
}
echo "arquivo re-escrito";
echo "\n";
// $file =

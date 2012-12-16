<?php


	
define('IN_PHPBB', true); 

$phpbb_root_path = "${chemin}forum/"; 

include($phpbb_root_path . 'extension.inc'); 

include($phpbb_root_path . 'common.'.$phpEx); 



// 

// Start session management 

// 

$userdata = session_pagestart($user_ip, PAGE_INDEX); 

init_userprefs($userdata); 


//Ouverture de la fonction design, définie comme le template, pour l'inclure plus facilement sur toutes nos pages du site:
function design($chemin)
{
	global $userdata;
	
	
	
	//On inclus le fichier de connexion à la BDD
	include(''.$chemin.'config.php');
	//On inclus les fonctions:
		include(''.$chemin.'include/fonction.php');
	
	//on vérifie si la page affichée est strictement égale à "article.php":
	if ($_SERVER['PHP_SELF'] == '/news/article.php')
	//Si la page est bien article.php, alors:
	{
		
		$reponse=mysql_query("SELECT * FROM news WHERE id= ".$_GET['id']."");
		$donnees=mysql_fetch_array($reponse); 
	?>		
		
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <meta http-equiv="robots" content="all,index,follow" />
            <meta http-equiv="Content-Language" content="fr" />
            <meta http-equiv="pragma" content="no-cache" /> 
            <title><?php echo $donnees['titre'] ; ?></title>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo''.$chemin.'';?>style.css" />
            <link rel="alternate" type="application/rss+xml" title="Les news de xenon-360.fr" href="http://www.xenon-360.fr/newsrss.php" />
            <meta name="subject" content="<?php echo $donnees['titre'] ; ?>" />
            <meta name="dc.subject" content="<?php echo $donnees['titre'] ; ?>" />
            <meta name="robots" content="all" />
            <meta name="revisit-after" content="3 days" />
            <meta name="verify-v1" content="hKXZsqG3bLNws2WtMPBY898pn6YEUEdVary49QtDyrk=" />
            <meta name="category" content="Jeux Vidéos" />            
            <meta name="author" content="Mr Rémy Barthez" />
            <meta name="copyright" content="Tout droits reservés © 2005 - 2008" />
			<meta name="description" content="<?php echo''.html_entity_decode(date_format1($donnees['date'])).' - '.substr(strip_tags($donnees['texte']),0,270).''; ?>" />
            <meta name="dc.description" content="<?php echo''.html_entity_decode(date_format1($donnees['date'])).' - '.substr(strip_tags($donnees['texte']),0,270).''; ?>" />
            <meta name="abstract" content="<?php echo''.html_entity_decode(date_format1($donnees['date'])).' - '.substr(strip_tags($donnees['texte']),0,270).''; ?>" />
             <meta name="expires" content="never" />
            <meta name="keywords" content="xbox360,xbox360,xbox-360,xbox,x-box,XBOX,X-BOX,X-box,xboxlive,XBOXLIVE,xbox-live,XBOX-LIVE,x-boxlive,xenon,XENON,hd,HD,microsoft,Microsoft,jeuxvidéo,jeux vidéo,jeux vidéo xbox,console,console de jeu,news xbox 360,xbox 360 news,tests 360,tests xbox 360,previews xbox 360,previews,dossiers,vidéos xbox 360,downloads xbox 360,vidéos jeux xbox 360,goodies,goodies xbox 360,concours,concours xbox 360,xbox 360 logo,wallpapers xbox 360,prix xbox 360,pack xbox 360,gears of war,oblivion,condemned,huxley,Halo,call of duty,vod,planning,burnout,devil may cry,gta,GTA,grand theft auto,pes" />
            <meta name="dc.keywords" content="xbox 360,xbox360,xbox-360,xbox,x-box,XBOX,X-BOX,X-box,xbox live,XBOX LIVE,xbox-live,XBOX-LIVE,x-box live,xenon,XENON,hd,HD,microsoft,Microsoft,jeuxvidéo,jeux vidéo,jeux vidéo xbox,console,console de jeu,news xbox 360,xbox 360 news,tests 360,tests xbox 360,previews xbox 360,previews,dossiers,vidéos xbox 360,downloads xbox 360,vidéos jeux xbox 360,goodies,goodies xbox 360,concours,concours xbox 360,xbox 360 logo,wallpapers xbox 360,prix xbox 360,pack xbox 360,gears of war,oblivion,condemned,huxley,Halo,call of duty,vod,planning,burnout,devil may cry,gta,GTA,grand theft auto,pes" />
            <meta name="rating" content="amateurs de jeux vidéos, amateurs d'Xbox 360."  />
            <meta name="identifier-url" content="http://www.xenon-360.fr" />
            <meta name="publisher" content="Xenon-360.fr" />
            <meta name="resource-type" content="document" />

		
		
		
		
	<?php	
  	}
	//sinon
	else
	{
	?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <meta http-equiv="robots" content="all,index,follow" />
            <meta http-equiv="Content-Language" content="fr" />
            <meta http-equiv="pragma" content="no-cache" /> 
            <title>Xenon-360.fr - Le Webzine Xbox 360</title>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo''.$chemin.''; ?>style.css" />
            <link rel="alternate" type="application/rss+xml" title="Les news de xenon-360.fr" href="http://www.xenon-360.fr/newsrss.php" />
            <meta name="subject" content="L'actualité de l'Xbox 360." />
            <meta name="dc.subject" content="L'actualité de l'Xbox 360." />
            <meta name="robots" content="all" />
            <meta name="revisit-after" content="3 days" />
            <meta name="verify-v1" content="hKXZsqG3bLNws2WtMPBY898pn6YEUEdVary49QtDyrk=" />
            <meta name="category" content="Jeux Vidéos" />
            <meta name="author" content="Mr Rémy Barthez" />
            <meta name="copyright" content="Tout droits reservés © 2005 - 2008" />
			<meta name="description" content="Xenon-360.fr, toute l'actualité de la console de jeux Xbox 360. News, dossiers, tests, fiches de jeux et forums. " />
            <meta name="dc.description" content="Xenon-360.fr, toute l'actualité de la console de jeux Xbox 360" />
            <meta name="abstract" content="Xenon-360.fr, l'essentiel de l'actualité de la console de jeux Xbox 360. News, dossiers, tests, fiches de jeux et forums. " />
            <meta name="expires" content="never" />
            <meta name="keywords" content="xbox360,xbox360,xbox-360,xbox,x-box,XBOX,X-BOX,X-box,xboxlive,XBOXLIVE,xbox-live,XBOX-LIVE,x-boxlive,xenon,XENON,hd,HD,microsoft,Microsoft,jeuxvidéo,jeux vidéo,jeux vidéo xbox,console,console de jeu,news xbox 360,xbox 360 news,tests 360,tests xbox 360,previews xbox 360,previews,dossiers,vidéos xbox 360,downloads xbox 360,vidéos jeux xbox 360,goodies,goodies xbox 360,concours,concours xbox 360,xbox 360 logo,wallpapers xbox 360,prix xbox 360,pack xbox 360,gears of war,oblivion,condemned,huxley,Halo,call of duty,vod,planning,burnout,devil may cry,gta,GTA,grand theft auto,pes" />
            <meta name="dc.keywords" content="xbox 360,xbox360,xbox-360,xbox,x-box,XBOX,X-BOX,X-box,xbox live,XBOX LIVE,xbox-live,XBOX-LIVE,x-box live,xenon,XENON,hd,HD,microsoft,Microsoft,jeuxvidéo,jeux vidéo,jeux vidéo xbox,console,console de jeu,news xbox 360,xbox 360 news,tests 360,tests xbox 360,previews xbox 360,previews,dossiers,vidéos xbox 360,downloads xbox 360,vidéos jeux xbox 360,goodies,goodies xbox 360,concours,concours xbox 360,xbox 360 logo,wallpapers xbox 360,prix xbox 360,pack xbox 360,gears of war,oblivion,condemned,huxley,Halo,call of duty,vod,planning,burnout,devil may cry,gta,GTA,grand theft auto,pes" />
            <meta name="rating" content="amateurs de jeux vidéos, amateurs d'Xbox 360."  />
            <meta name="identifier-url" content="http://www.xenon-360.fr" />
            <meta name="publisher" content="Xenon-360.fr" />
            <meta name="resource-type" content="document" />
            
		


	<?php 
	}
	echo'
	<object>
	<map name="header" id="header">
	<area shape="rect" coords="33,45,407,111" href="http://www.xenon-360.fr/index.html" title="Accédez a l\'actualite Xbox 360 !" alt="Toutes les news Xbox 360 !" />
	</map>

	</object>
	
	</head>';
    
	echo '<body>
	
	<table cellspacing="0" cellpadding="0" width="100%" border="0">
  <tr>
    <td><img 
      src="'.$chemin.'forum/templates/x360/images/headerG.jpg" alt="" /></td>
    <td align="center" width="100%" 
    style="background-image:url('.$chemin.'/forum/templates/x360/images/fondheader.jpg)"><img 
      src="'.$chemin.'forum/templates/x360/images/header.jpg" border="0" width="440" height="150" usemap="#header" alt="" /></td>
    <td><img src="'.$chemin.'forum/templates/x360/images/headerD.jpg" alt="" /></td>
	  </tr>
	  </table>';
	
	if( $userdata['session_logged_in'] )
	{
		// Si l'utilisateur est connect
		echo '<center><div class="textart">Bienvenue <b>'.$userdata['username'].'</b> 
		[<a href="'.$chemin.'compte/index.php">my Space</a>] 
		[<a href="'.$chemin.'forum/login.php?logout=true&amp;sid='.$userdata['session_id'].'&amp;redirect=../index.php">D&eacute;connexion</a>] </div></center>';
	}
	else
	{
		// Sinon, page des utilisateurs non connect
		echo '<center><div class="textart">Bienvenue <b>invit&eacute;</b> 
		[<a href="'.$chemin.'forum/profile.php?mode=register">Inscription</a>] 
		[<a href="'.$chemin.'forum/login.php?redirect=../index.php">Connexion</a>]</div></center>';
	}

echo'<br /><br /><br />
<div id="menu">
	<a href="../../news/index.html"><span class="onglet1"></span></a>
	<a href="../../tests/index.html"><span class="onglet2"></span></a>
	<a href="../../dossiers/index.html"><span class="onglet3"></span></a>
	<a href="../../jeux/index.html"><span class="onglet4"></span></a>
	<a href="../../gallery/index.html"><span class="onglet5"></span></a>
	<a href="../../wallpaper/"><span class="onglet6"></span></a>
	<a href="../../videos/index.html"><span class="onglet7"></span></a>
	<a href="../../planning/"><span class="onglet8"></span></a>
	<a href="../../forum/index.php"><span class="onglet9"></span></a>
</div>
<br />

<center>
<table border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td style="background-image: url('.$chemin.'design/images/bordG.jpg)" width="40" valign="top" >
<img src="'.$chemin.'design/images/hautG.jpg" alt="" />
</td>

<td width="800" bgcolor="#F9F9F9" valign="top" style="background-image:url('.$chemin.'design/images/fond.jpg)">

<img src="'.$chemin.'design/images/haut.jpg" alt="" />

<br />

<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td valign="top" align="left">';
page();
echo'</td>
<td valign="top" width="150">
<div align="right">';
include("${chemin}include/block.php");
echo'</div>
</td>
</tr>
</table>

</td>

<td style="background-image: url('.$chemin.'design/images/bordD.jpg)" width="40" valign="top" >
<img src="'.$chemin.'design/images/hautD.jpg" alt="" />
</td>

</tr>
<tr>

<td style="background-image:'.$chemin.'design/images/bordG.jpg" width="40" valign="bottom" >
<img src="'.$chemin.'design/images/basG.jpg" alt="" />
</td>

<td bgcolor="#F9F9F9" valign="bottom" style="background-image: url('.$chemin.'design/images/fond.jpg)">


<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="60"></td>
<td>
	<br /><br />
</td>
</tr>
</table>

<img src="'.$chemin.'design/images/footer.jpg" alt="" />
</td>

<td style="background-image('.$chemin.'design/images/bordD.jpg)" width="40" valign="bottom" >
<img src="'.$chemin.'design/images/basD.jpg" alt="" />
</td>
</tr>
</table>';

viewstats($userdata);

foot();
mysql_close();  
?>          
       
	</body>
    </html>

<?php
//On ferme la fonction design:
}




function foot()
{
echo'

<font class="textart">&copy; 2005 - 2009 xenon-360.fr - Tous droits reserv&eacute;s<br />
Design par <a href="http://ry.barthez.free.fr" target="_blank">neWo</a> - Codage par <a href="mailto:web-dev@lemondelibre.fr">Clement Kerneur</a><br />
Webzine d\'informations sur les jeux vid&eacute;os et la console Microsoft Xbox 360.</font>

<br />
<a href="http://validator.w3.org/feed/check.cgi?url=http%3A%2F%2Fwww.xenon-360.fr%2Fnewsrss.php" target="_blank"><img src="http://validator.w3.org/feed/images/valid-rss.png" style="border:0px" alt="Valid rss" /></a>
<a href="http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fwww.xenon-360.fr%2Fstyle.css">
<img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="CSS Valide !" /></a>
<a href="http://validator.w3.org/check?uri=referer"><img
        src="http://www.w3.org/Icons/valid-xhtml10"
        alt="Valid XHTML 1.0 Transitional" height="31" width="88" style="border:0px" /></a>

<br />';


echo'</center>';
}








?>

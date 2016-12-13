<?php
	session_start();
	if (!isset($_SESSION) || !isset($_SESSION['email'])){
		header("Location: index.php");
		//exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Travel Map Online service</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <link rel="stylesheet" href="css/style.css" 			type="text/css" media="all">
    <link rel="stylesheet" href="css/style22.css" 			type="text/css" media="all">

    <link rel="stylesheet" href="css/map.css" />
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui-min.js"></script>
	<script src="js/map_init-min.js"></script>
	<script src="js/cusel-2.5-min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <script type="text/javascript">
			<!--
			    function toggle_visibility(id) {
			       var e = document.getElementById(id);
			       if(e.style.display == 'block')
			          e.style.display = 'none';
			       else
			          e.style.display = 'block';
			    }
			//-->
		</script>


    </head>

<body>
	<div class="header" id="home">
		<div class="slider-info">
			<div class="logo">
				<a href="index.php">TRAVEL MAP</a>
			</div>
			<div class="side">
				<nav class="dr-menu">
					<div class="dr-trigger"><span class="dr-icon dr-icon-menu"></span></div>
					<ul>
						      <li><a class="scroll dr-icon dr-icon-setting" href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');">ПРОФИЛЬ</a></li>
                        <li><a class="scroll dr-icon dr-icon-out" href="javascript:void(0)" onclick="toggle_visibility('popupBoxTwoPosition');">ВЫЙТИ</a></li>
                        <li><a class="scroll dr-icon dr-icon-bullhorn" href="service.html">ПРО СЕРВИС</a></li>
					</ul>
				</nav>
			</div>
		</div>

       <div class="wrap1">
           <div class="crowe">
								<div class="user">
									<div class="user1">
										<?php
											include ("db.php");
											$email = $_SESSION['email'];
											$result = mysql_query("SELECT * FROM users WHERE email ='$email'") or die("Invalid query: " . mysql_error());//,$conn //извлекаем из базы все данные о пользователе с введенным логином
											$myrow = mysql_fetch_array($result);

											if(!empty($myrow['user_avatar'])){
												echo '<img src="'.$myrow['user_avatar'].'" class="img-responsive" alt="">';
											} else {
												echo '<img src="images/user.png" class="img-responsive" alt="">';
											}
										?>

									</div>
									<div class="user2">
										<h4>
											<?php
												if(!empty($myrow['user_firstName']) && !empty($myrow['user_lastName'])){
													echo $myrow['user_firstName'].' '.$myrow['user_lastName'];
												} else {
													echo $myrow['login'];
												}
											?>
										</h4>
									<ul>
                           <li><span class="glyphicon glyphicon glyphicon-globe" aria-hidden="true"></span>
										<?php
											if(!empty($myrow['phone'])){
												echo "Phone:".$myrow['phone'];
											} else {
												echo "КИЕВ";
											}
										?>
										</li>
										<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
											<?php
													echo "<a href=mailto:'".$myrow['email']."'>".$myrow['email']."</a> </li>";
											 ?>

										<li><span class="glyphicon glyphicon glyphicon-calendar" aria-hidden="true"></span>
											<?php
												$date = date_parse($myrow['date_birth']);
												$year_birth = intval($date['year']);
												$today = intval(date('Y'));
												if($year_birth != 0){
													echo ($today - $year_birth)." лет";
												} else {
													echo "Еще не указано";
												}
											 ?>
										</li>
									</ul>
									</div>
									<div class="clearfix"></div>
								</div>
									<div class="flowers">
										<div class="col-mds flower-grid">
											<h5>
												<?php
													$result = mysql_query("SELECT * FROM user_sites WHERE id_user ='".$_SESSION['id']."' GROUP BY id_city") or die("Invalid query: " . mysql_error());//,$conn //извлекаем из базы все данные о пользователе с введенным логином

													echo mysql_num_rows($result);
												 ?>
											</h5>
											<p>ГОРОДОВ</p>
										</div>
										<div class="col-mds flower-grid">
											<h5 id="sites_count">
												<?php
													$result = mysql_query("SELECT COUNT(id_site) as sitiesCount FROM user_sites WHERE id_user ='".$_SESSION['id']."'") or die("Invalid query: " . mysql_error());//,$conn //извлекаем из базы все данные о пользователе с введенным логином
													$myrow2 = mysql_fetch_array($result);

													echo $myrow2['sitiesCount'];
												 ?>
											</h5>
											<p>ОТМЕЧЕНЫХ МЕСТ</p>
										</div>
										<!-- <div class="col-mds flower-grid">
											<h5>37</h5>
											<p>ОТЗЫВОВ</p>
										</div> -->
										<div class="clearfix"></div>
									</div>




                                </div>
<div class="wrapper">
  <div class="map-tabs">

    <div id="tabs-1" class="open-tabs">
       <div class="map-ukraine" data-href="/cities/city_id">
        <script src="js/map_data.js"></script>
        <div class="popup-cities">
          <div class="popup-cities-top">&nbsp;</div>
          <div class="popup-cities-mid">
            <p>Другие города</p>
            <ul>
              <li><a href="#">Белая церьковь</a></li>
              <li><a href="#">Богуслав</a></li>
              <li><a href="#">Бровары</a></li>
              <li><a href="#">Васильков</a></li>
              <li><a href="#">Вышгород</a></li>
            </ul>
          </div>
          <div class="popup-cities-bot">&nbsp;</div>
        </div>
        <div class="rh region1"></div>
        <div class="rh region2"></div>
        <div class="rh region3"></div>
        <div class="rh region4"></div>
        <div class="rh region5"></div>
        <div class="rh region6"></div>
        <div class="rh region7"></div>
        <div class="rh region8"></div>
        <div class="rh region9"></div>
        <div class="rh region10"></div>
        <div class="rh region11"></div>
        <div class="rh region12"></div>
        <div class="rh region13"></div>
        <div class="rh region14"></div>
        <div class="rh region15"></div>
        <div class="rh region16"></div>
        <div class="rh region17"></div>
        <div class="rh region18"></div>
        <div class="rh region19"></div>
        <div class="rh region20"></div>
        <div class="rh region21"></div>
        <div class="rh region22"></div>
        <div class="rh region23"></div>
        <div class="rh region24"></div>
        <div class="rh region25"></div>
        <img class="map-ukraine-overlay" alt="" usemap="#map-ukraine1" src="img/map-ukraine-overlay.png" />
        <!-- <map id="map-ukraine1" name="map-ukraine1">
        </map> -->
		  <map id="map-ukraine1" name="map-ukraine1">
			  <svg id="mapMy" style="width:1000px;height:1000px;">
				  <?php
				  $result = mysql_query("SELECT * FROM user_sites WHERE id_user ='".$_SESSION['id']."'") or die("Invalid query: " . mysql_error());//,$conn //извлекаем из базы все данные о пользователе с введенным логином

				  while($row = mysql_fetch_array($result)) {
				      switch($row['id_city']){
							case 15:
							  echo '<polyline fill="green" rel="Lvov" onclick="getCity(15);" alt="" points="34,180,71,143,91,127,101,127,107,116,124,120,122,129,129,131,133,137,144,137,148,140,148,143,155,143,153,151,153,156,160,163,162,167,159,174,148,174,145,177,146,181,143,182,138,190,129,191,128,195,128,197,124,197,122,194,113,197,112,205,109,209,109,214,112,215,113,217,108,219,94,219,90,221,83,220,78,220,76,222,76,224,75,227,69,230,69,246,62,246,58,242,51,242,49,234,41,233,38,220,39,215,32,209,36,199" href="javascript:void(0)"  title=""></polyline>';
							  break;
						  case 2:
							  echo ' <polyline fill="green" rel="Chernigov" onclick="getCity(2);" alt="" points="400,82,403,78,400,58,407,41,417,30,417,23,427,23,432,27,437,20,460,23,460,27,473,25,480,14,479,6,489,6,500,10,517,1,527,1,521,18,528,24,524,26,523,34,516,36,511,46,515,53,515,63,513,75,510,74,511,87,507,88,507,95,513,99,518,97,518,107,515,112,517,121,514,134,513,136,504,146,488,147,485,144,479,144,475,149,470,149,469,144,465,144,463,140,467,135,463,135,456,129,455,134,451,134,446,137,433,137,428,133,427,125,421,119,411,120,408,119,409,113,404,110,404,102,398,102" href="javascript:void(0)"  title=""></polyline>';
							  break;
						  case 14:
							  echo '<polyline fill="green" rel="Lutsk" onclick="getCity(14);" alt="" points="147,140,150,140,154,135,152,131,152,124,156,123,160,125,162,117,172,117,176,114,183,120,187,119,187,110,194,102,191,98,198,96,198,91,193,90,196,83,190,73,186,66,181,66,178,68,177,62,179,52,176,48,176,39,181,35,182,32,179,29,179,26,173,26,169,22,162,21,157,25,133,24,127,24,124,33,108,44,107,41,98,38,94,41,93,47,95,55,92,59,93,63,95,70,100,72,104,90,110,95,111,98,103,97,104,101,109,115,124,120,122,129,128,130,133,137,144,137" href="javascript:void(0)"  title=""></polyline>';
							  break;
						  case 19:
							  echo '<polyline fill="green" rel="Rovno" onclick="getCity(19);" alt="" points="179,26,192,25,196,28,205,28,208,33,217,33,220,36,230,36,238,42,252,42,252,48,257,54,271,53,276,55,276,61,269,64,267,70,263,68,263,74,261,77,261,82,252,95,248,96,250,110,248,112,250,116,247,124,249,128,247,131,240,128,236,132,228,133,222,142,212,151,209,149,202,155,199,148,187,147,182,152,171,154,167,152,165,154,164,158,161,162,153,156,153,149,155,143,148,143,148,141,153,136,153,132,152,124,157,123,159,124,162,117,173,117,176,114,185,120,187,118,187,109,194,103,191,98,198,96,198,91,192,91,196,83,186,66,181,66,178,68,176,65,179,53,176,48,176,39,181,35,182,32,179,29" href="javascript:void(0)"  title=""></polyline>';
							  break;
						  case 7:
							  echo '<polyline fill="green" rel="Ivano-Frankovsk" onclick="getCity(7);" alt="" points="127,198,130,203,133,217,131,221,131,225,137,225,137,229,133,230,137,232,137,235,142,236,143,244,146,241,148,242,148,249,151,249,155,245,159,247,159,249,165,254,165,259,162,262,163,271,162,278,152,279,131,299,127,305,129,316,126,323,119,314,116,314,112,306,114,297,110,293,110,287,101,275,98,277,92,277,91,275,93,264,87,264,85,266,82,266,83,262,79,258,75,253,72,252,71,250,68,247,69,230,76,226,76,221,77,220,91,221,93,219,109,219,113,217,112,215,109,213,109,209,112,205,113,197,122,194,124,197" href="javascript:void(0)"  title=""></polyline>';
							  break;
						  case 22:
							  echo '<polyline fill="green" rel="Uzhgorod" onclick="getCity(22);"  alt="" points="9,273,8,267,6,265,6,261,0,259,1,249,11,240,14,229,25,214,32,219,38,219,41,233,49,234,50,241,58,242,61,245,68,246,72,251,83,262,82,266,86,266,87,263,92,264,91,275,93,277,98,277,101,275,110,287,110,292,114,297,112,305,102,304,99,306,90,306,86,302,77,302,65,295,55,295,47,288,40,292,34,293,32,297,28,297,28,292,31,289,28,285,19,285,14,274" href="javascript:void(0)" title=""></polyline>';
							  break;
						  case 21:
							  echo '<polyline fill="green" rel="Ternopol" onclick="getCity(21);"  alt="" points="161,163,166,153,167,152,173,154,182,152,187,147,199,148,202,155,202,155,201,160,196,175,199,183,197,188,198,192,194,202,197,215,193,246,195,264,199,271,188,271,184,264,177,268,176,263,174,261,170,263,165,258,164,253,159,249,159,246,155,245,149,250,147,241,142,245,141,236,136,236,137,232,133,230,137,229,137,226,131,225,130,220,133,215,128,198,129,191,139,189,143,182,146,182,145,178,148,175,159,174,162,166" href="javascript:void(0)" title=""></polyline>';
							  break;
						  case 3:
							  echo '<polyline fill="green" rel="Chernovtsy" onclick="getCity(3);" alt="" points="166,259,170,263,172,263,174,261,177,264,177,268,184,264,186,265,188,271,199,271,206,273,208,278,213,277,212,271,221,269,222,272,230,270,234,272,248,268,252,269,253,279,250,282,246,280,239,286,233,282,227,284,222,282,219,288,215,287,209,294,198,294,190,309,145,311,137,322,126,324,129,316,127,305,132,296,153,278,162,278,163,270,162,261" href="javascript:void(0)"  title=""></polyline>';
							  break;
						  case 10:
							  echo '<polyline fill="green" rel="Khmelnitskiy" onclick="getCity(10);" alt="" points="202,155,209,149,212,151,222,142,228,133,236,132,240,128,246,131,250,135,249,138,248,142,259,154,264,153,265,170,261,171,261,177,264,184,274,187,274,190,269,193,272,198,268,206,268,211,273,215,273,232,270,234,260,231,254,232,252,238,249,244,250,258,248,267,246,269,234,272,229,270,223,272,221,269,212,271,213,275,212,277,209,278,205,272,199,271,194,261,193,247,197,214,194,201,198,192,197,188,199,182,196,175" href="javascript:void(0)"  title=""></polyline>';
							  break;
						  case 23:
							  echo '<polyline fill="green" rel="Vinnitsa" onclick="getCity(23);" alt="" points="274,187,299,188,301,185,306,187,314,187,315,182,324,182,324,188,327,193,325,196,325,200,327,203,337,203,341,200,349,198,351,200,350,205,353,208,353,216,349,221,359,229,359,235,354,242,354,244,357,244,357,250,359,251,359,255,361,256,361,260,366,264,366,268,370,270,370,275,373,276,373,281,371,284,373,286,373,288,371,290,366,287,362,290,360,297,362,304,357,304,357,309,355,311,348,311,345,308,343,308,341,311,334,311,327,305,324,313,319,315,313,304,302,303,299,308,297,303,292,305,296,298,281,295,281,290,275,291,266,280,259,280,256,283,250,283,253,279,252,269,247,268,248,267,250,257,249,244,254,232,260,231,270,234,273,232,273,215,268,211,268,206,272,198,269,193,274,190" href="javascript:void(0)"  title=""></polyline>';
							  break;
						  case 11:
							 echo ' <polyline fill="green" rel="Kiev" onclick="getCity(11);" alt="" points="347,74,362,63,367,70,375,66,385,66,391,73,391,77,400,82,399,102,404,103,404,110,409,113,408,119,411,120,421,119,427,125,428,133,433,137,447,138,452,134,455,134,456,129,463,135,467,135,463,140,466,144,469,144,469,148,471,150,470,156,464,159,463,163,458,167,459,172,456,174,455,182,452,184,443,185,438,181,433,183,429,183,428,188,427,200,425,203,425,208,418,214,417,219,409,222,396,222,393,220,392,228,380,223,366,232,362,231,358,229,349,221,353,215,352,208,350,205,351,199,349,198,347,188,352,186,361,178,358,174,358,167,361,162,359,152,355,151,354,145,349,143,350,130,354,124,354,119,352,118,351,109,347,104,351,97,348,93,342,92,342,85,348,80" href="javascript:void(0)"  title=""></polyline>';
							 break;
						 case 20:
							 echo ' <polyline fill="green" rel="Sumy" onclick="getCity(20);" alt="" points="526,1,530,2,531,8,540,0,545,0,549,10,557,16,555,22,562,32,571,38,572,46,558,51,565,60,564,71,569,72,565,81,574,79,587,84,594,84,601,80,606,83,608,92,616,92,616,95,614,98,623,116,621,122,623,132,629,134,630,139,634,140,633,144,619,145,613,152,599,158,590,158,586,162,578,162,578,158,580,157,567,137,567,132,557,138,551,134,545,138,528,136,522,132,518,136,513,135,517,121,514,112,518,106,518,97,513,99,507,95,507,88,511,87,510,74,512,74,515,63,515,53,511,46,516,36,523,34,524,26,528,24,521,17,527,1,530,2,531,8" href="javascript:void(0)"  title=""></polyline>';
							 break;
						 case 1:
							 echo ' <polyline fill="green" rel="Cherkassy" onclick="getCity(1);" alt="" points="374,286,379,282,385,283,391,278,399,277,403,263,420,264,424,266,431,262,435,266,441,265,445,251,459,251,462,256,467,250,473,252,474,245,482,239,491,249,497,250,499,246,504,248,507,243,502,231,503,226,503,217,497,210,502,203,482,183,485,180,481,170,477,170,476,162,471,160,470,156,464,159,463,163,458,167,459,172,456,174,455,181,452,184,443,185,438,181,433,183,429,183,427,200,425,203,425,208,418,214,417,219,409,222,396,222,393,220,392,228,380,223,366,232,359,230,359,235,354,242,354,244,357,244,357,250,359,251,359,255,361,256,361,260,366,264,366,268,369,270,370,276,373,276,373,281,371,284,373,286" href="javascript:void(0)"  title=""></polyline>';
							 break;
						 case 12:
							 echo ' <polyline fill="green" rel="Kirovograd" onclick="getCity(12);" alt="" points="362,303,366,303,369,301,376,307,387,307,391,304,416,306,424,301,432,309,456,311,453,317,462,325,461,332,470,331,473,335,481,329,491,332,497,332,500,328,500,319,508,318,513,314,518,315,527,309,530,304,537,301,540,295,536,277,549,272,553,265,544,264,539,260,551,257,553,259,557,252,552,249,532,249,529,240,523,240,521,234,503,226,502,231,507,243,504,248,499,246,497,250,491,248,482,239,474,245,473,252,467,250,462,256,459,251,445,251,441,265,435,265,431,262,424,266,419,264,403,263,399,277,390,278,385,283,378,282,373,287,370,290,366,287,362,290,360,297" href="javascript:void(0)"  title=""></polyline>';
							 break;
						 case 17:
							 echo ' <polyline fill="green" rel="Odessa" onclick="getCity(17);" alt="" points="319,315,325,321,328,316,333,316,336,333,330,348,331,356,340,358,342,367,351,363,350,382,353,393,368,401,368,422,377,431,366,434,359,428,353,433,344,425,334,427,330,420,318,427,319,458,308,462,308,471,294,482,295,493,281,493,284,506,303,515,308,514,311,507,315,512,322,505,334,500,349,502,353,511,353,517,358,511,358,500,351,498,351,474,356,474,356,486,363,487,363,480,366,480,378,469,377,475,392,458,390,447,376,439,383,433,392,442,397,451,411,431,411,419,420,420,429,415,427,400,421,397,421,390,434,390,434,380,425,377,428,370,415,370,411,358,414,352,409,344,391,345,391,331,387,331,387,321,382,317,382,310,387,310,387,307,375,306,369,301,366,303,361,303,357,304,357,308,355,311,348,311,345,308,342,308,341,311,333,311,327,305,324,313" href="javascript:void(0)"  title=""></polyline>';
							 break;
						 case 16:
							 echo ' <polyline fill="green" rel="Nikolaev" onclick="getCity(16);" alt="" points="387,307,390,304,416,306,424,300,432,309,456,311,453,317,462,325,461,332,471,331,473,335,481,329,490,332,497,332,500,328,500,319,508,318,514,314,517,315,520,334,516,337,521,346,523,356,517,359,523,361,523,373,514,377,514,384,520,385,520,389,514,389,517,392,510,397,513,397,512,399,506,401,496,399,493,402,480,403,477,407,468,408,470,392,464,401,465,414,464,417,446,416,449,406,440,418,429,414,427,400,421,396,421,390,434,389,434,380,425,376,428,370,415,370,410,358,414,351,409,344,391,345,391,331,387,331,387,321,382,317,382,310,387,310" href="javascript:void(0)"  title=""></polyline>';
							 break;
						 case 9:
							  echo '<polyline fill="green" rel="Kherson" onclick="getCity(9);" alt="" points="468,408,473,417,490,419,492,421,483,425,478,424,471,420,448,421,453,426,469,427,473,432,469,437,459,437,461,440,484,446,491,454,501,454,520,461,523,458,520,455,505,455,503,452,510,450,521,451,524,449,529,449,532,444,543,455,547,455,551,448,552,443,557,444,562,442,575,443,579,437,594,447,601,446,606,443,612,446,612,442,617,438,621,437,625,435,621,433,620,422,613,422,605,414,605,408,600,408,599,405,604,402,604,398,608,395,593,384,590,364,585,364,583,366,581,365,576,351,563,351,560,348,557,351,547,351,543,346,534,352,530,348,520,346,523,356,517,359,523,361,523,373,514,378,514,383,520,385,520,389,513,389,517,392,510,397,513,397,512,399,505,401,496,399,493,402,480,403,476,407" href="javascript:void(0)"  title=""></polyline>';
							  break;
						  case 4:
							  echo '<polyline fill="green" rel="Simferopol" onclick="getCity(4);" alt="" points="550,449,553,455,553,462,559,462,556,468,547,467,535,475,528,476,496,501,498,508,506,510,516,505,533,520,542,516,552,523,555,540,550,547,552,556,544,560,548,567,555,567,562,575,578,575,590,562,594,563,596,554,606,546,623,539,626,537,630,542,632,541,636,531,641,530,650,517,660,517,670,525,688,522,699,516,697,504,707,494,699,489,680,490,674,498,666,491,658,502,647,503,626,479,616,456,631,444,630,441,619,450,616,456,612,448,606,449,612,456,614,468,618,471,623,482,644,505,649,505,646,508,627,501,627,486,613,476,610,476,610,469,605,471,608,462,599,474,597,469,603,462,601,449,595,450,593,458,599,462,596,467,590,465,589,458,582,457,579,461,577,452,568,451,566,456,564,450,558,448,557,444,552,443" href="javascript:void(0)"  title=""></polyline>';
							  break;
						  case 18:
							  echo '<polyline fill="green" rel="Poltava" onclick="getCity(18);" alt="" points="470,149,475,149,479,144,485,144,488,147,504,146,514,135,518,136,522,132,527,135,545,138,551,134,557,137,567,132,567,137,580,157,578,158,578,162,585,162,590,158,599,158,599,166,596,171,597,174,613,181,614,188,618,192,624,191,626,203,621,205,623,212,618,219,606,218,604,223,605,229,595,230,579,237,574,249,576,253,573,260,556,252,552,249,532,249,529,240,523,240,521,234,503,226,503,217,497,210,502,203,482,183,485,180,481,170,477,170,476,162,471,159,469,156,471,149" href="javascript:void(0)"  title=""></polyline>';
							  break;
						  case 8:
							  echo '<polyline fill="green" rel="Harkov" onclick="getCity(8);" alt="" points="634,140,637,140,643,133,655,133,664,144,670,141,676,148,690,136,702,136,709,128,715,128,718,135,724,138,723,144,731,154,739,155,744,162,743,180,745,182,741,187,744,191,740,198,740,206,744,208,741,214,727,215,724,217,730,218,728,222,716,233,717,237,710,242,710,246,705,245,703,250,698,248,696,251,688,250,691,261,686,264,680,261,672,271,670,262,663,257,662,251,655,247,655,240,629,242,615,229,605,229,604,223,606,217,618,219,623,212,621,205,625,203,624,191,617,191,614,188,613,181,596,174,595,171,599,166,599,158,613,152,619,145,633,144" href="javascript:void(0)"  title=""></polyline>';
							  break;
						  case 25:
							  echo '<polyline fill="green" rel="Zhitomir" onclick="getCity(25);" alt="" points="272,62,276,64,278,61,278,55,281,52,286,58,292,58,297,50,300,50,301,58,304,60,307,57,315,60,315,66,320,70,323,61,331,59,335,54,340,57,343,69,347,74,348,80,342,85,342,92,348,93,351,97,348,104,352,110,352,118,354,120,354,125,350,130,350,138,349,141,349,143,355,145,355,151,359,153,361,162,358,167,358,174,361,178,352,186,347,188,348,193,349,198,341,200,337,203,327,203,325,200,325,196,327,193,324,187,324,182,315,182,314,187,306,187,301,185,299,188,274,187,264,184,261,177,261,171,265,170,264,153,259,154,248,142,248,138,250,136,247,131,249,128,247,123,249,116,248,113,250,109,248,97,252,95,261,82,261,76,262,73,263,68,267,69,269,64" href="javascript:void(0)"  title=""></polyline>';
							  break;
						  case 5:
							 echo ' <polyline fill="green" rel="Dnepropetrovsk" onclick="getCity(5);" alt="" points="557,252,572,260,576,253,574,250,579,237,595,230,604,229,614,229,628,241,655,240,655,247,662,251,663,257,670,263,672,271,680,260,686,264,691,261,693,268,700,264,697,270,698,282,703,287,703,292,700,295,703,302,700,304,696,303,691,299,687,304,690,311,686,314,688,319,678,319,675,322,670,318,666,320,664,317,667,314,661,311,661,304,658,307,656,303,650,304,643,300,635,304,613,303,609,307,604,307,603,312,608,316,603,319,604,322,608,325,608,329,610,332,609,346,601,346,591,344,586,349,576,351,562,351,560,348,557,351,547,351,543,346,533,352,530,348,520,345,516,337,520,334,517,315,527,309,530,304,537,301,540,295,536,277,549,272,553,265,544,264,539,260,551,257,553,259" href="javascript:void(0)"  title=""></polyline>';
							 break;
						 case 13:
							 echo ' <polyline fill="green" rel="Lugansk" onclick="getCity(13);" alt="" points="741,215,745,219,750,218,753,229,749,232,758,234,765,243,763,257,769,267,779,274,784,286,795,289,795,294,806,295,806,298,806,304,843,303,844,282,849,271,849,267,843,268,845,261,839,248,831,249,835,230,847,231,849,225,833,226,828,218,840,214,849,195,840,183,846,174,837,174,832,180,818,174,819,168,804,169,798,159,790,166,771,156,761,157,756,151,750,151,751,160,744,162,743,180,745,182,741,187,744,191,740,198,740,206,744,208,740,214" href="javascript:void(0)"  title=""></polyline>';
							 break;
						 case 6:
							 echo ' <polyline fill="green" rel="Donetsk" onclick="getCity(6);" alt="" points="741,214,745,219,750,218,753,229,749,232,758,234,765,243,763,257,769,266,779,274,784,286,795,289,795,294,806,295,806,304,798,305,796,310,796,318,791,319,790,323,777,326,774,344,772,348,777,350,773,356,774,365,742,368,731,384,726,380,717,385,715,382,720,378,720,373,713,372,712,365,705,365,710,361,707,355,716,355,716,352,720,352,717,348,722,346,721,342,716,342,708,336,705,337,701,333,698,334,693,322,688,319,685,314,690,311,687,304,691,299,696,302,699,304,703,302,700,295,703,292,703,286,698,282,697,269,700,264,693,268,688,249,696,251,698,248,703,249,705,245,710,246,710,242,717,236,716,232,728,222,730,218,724,217,727,215,740,214" href="javascript:void(0)"  title=""></polyline>';
							 break;
						 case 24:
							 echo ' <polyline fill="green" rel="Zaporozhye" onclick="getCity(24);" alt="" points="717,385,715,382,720,378,720,373,713,372,712,365,705,365,710,361,707,355,716,355,716,352,720,352,717,348,722,346,721,342,716,342,708,336,705,337,701,333,698,334,693,321,687,319,677,319,675,321,670,318,666,320,664,317,667,314,661,311,661,304,658,307,656,303,650,304,642,300,635,304,613,303,609,307,603,307,603,312,608,315,603,319,604,321,608,325,608,329,610,332,609,345,609,346,600,346,591,344,586,349,576,351,581,365,582,366,585,364,590,364,593,384,608,395,604,397,604,402,599,406,600,408,604,408,605,414,613,422,620,422,621,433,625,435,632,424,634,425,633,431,637,431,648,420,653,416,659,408,671,403,678,403,682,407,695,395,704,395,705,396" href="javascript:void(0)"  title=""></polyline>';
						 }
				 }
				?>
			  </svg>
        </map>
           <a  href="javascript:void(0)" onclick="getCity(1);" class="rl rgn_lnk1" id="Cherkassy" rel="Cherkassy">Черкассы</a>
           <a  href="javascript:void(0)" onclick="getCity(2);"class="rl rgn_lnk2" id="Chernigov" rel="Chernigov">Чернигов</a>
           <a  href="javascript:void(0)" onclick="getCity(4);" class="rl rgn_lnk4" id="Simferopol" rel="Simferopol">Симферополь</a>
           <a  href="javascript:void(0)" onclick="getCity(5);" class="rl rgn_lnk5" id="Dnepropetrovsk" rel="Dnepropetrovsk">Днепр</a>
           <a  href="javascript:void(0)" onclick="getCity(6);" class="rl rgn_lnk6" id="Donetsk" rel="Donetsk">Донецк</a>
           <a  href="javascript:void(0)" onclick="getCity(7);" class="rl rgn_lnk7" id="Ivano-Frankovsk" rel="Ivano-Frankovsk">Ивано-Франковск</a>
           <a  href="javascript:void(0)" onclick="getCity(8);" class="rl rgn_lnk8" id="Harkov" rel="Harkov">Харьков</a>
           <a  href="javascript:void(0)" onclick="getCity(9);" class="rl rgn_lnk9" id="Kherson" rel="Kherson">Херсон</a>
           <a  href="javascript:void(0)" onclick="getCity(10);" class="rl rgn_lnk10" id="Khmelnitskiy" rel="Khmelnitskiy">Хмельницкий</a>
           <a  href="javascript:void(0)" onclick="getCity(11);" class="rl rgn_lnk11" id="Kiev" rel="Kiev">Киев</a>
           <a  href="javascript:void(0)" onclick="getCity(12);" class="rl rgn_lnk12" id="Kirovograd" rel="Kirovograd">Кировоград</a>
           <a  href="javascript:void(0)" onclick="getCity(13);" class="rl rgn_lnk13" id="Lugansk" rel="Lugansk">Луганск</a>
           <a  href="javascript:void(0)" onclick="getCity(14);" class="rl rgn_lnk14" id="Lutsk" rel="Lutsk">Луцк</a>
           <a  href="javascript:void(0)" onclick="getCity(15);" class="rl rgn_lnk15" id="Lvov" rel="Lvov">Львов</a>
           <a  href="javascript:void(0)" onclick="getCity(16);" class="rl rgn_lnk16" id="Nikolaev" rel="Nikolaev">Николаев</a>
           <a  href="javascript:void(0)" onclick="getCity(17);" class="rl rgn_lnk17" id="Odessa" rel="Odessa">Одесса</a>
           <a  href="javascript:void(0)" onclick="getCity(18);" class="rl rgn_lnk18" id="Poltava" rel="Poltava">Полтава</a>
           <a  href="javascript:void(0)" onclick="getCity(19);" class="rl rgn_lnk19" id="Rovno" rel="Rovno">Ровно</a>
           <a  href="javascript:void(0)" onclick="getCity(20);" class="rl rgn_lnk20" id="Sumy" rel="Sumy">Сумы</a>
           <a  href="javascript:void(0)" onclick="getCity(21);" class="rl rgn_lnk21" id="Ternopol" rel="Ternopol">Тернополь</a>
           <a  href="javascript:void(0)" onclick="getCity(22);" class="rl rgn_lnk22" id="Uzhgorod" rel="Uzhgorod">Ужгород</a>
           <a  href="javascript:void(0)" onclick="getCity(23);" class="rl rgn_lnk23" id="Vinnitsa" rel="Vinnitsa">Винница</a>
           <a  href="javascript:void(0)" onclick="getCity(24);" class="rl rgn_lnk24" id="Zaporozhye" rel="Zaporozhye">Запорожье</a>
           <a  href="javascript:void(0)" onclick="getCity(25);" class="rl rgn_lnk25" id="Zhitomir" rel="Zhitomir">Житомир</a>
           <a  href="javascript:void(0)" onclick="getCity(3);" class="rl rgn_lnk3" id="Chernovtsy" rel="Chernovtsy">Черновцы</a> </div>
    </div>

    <div class="map_preloader">
      <div class="prld1"> </div>
      <div class="prld2"> </div>
      <div class="prld3"> </div>
      <div class="prld4"> </div>
      <div class="prld5"> </div>
      <div class="prld6"> </div>
      <div class="prld7"> </div>
      <div class="prld8"> </div>
      <div class="prld9"> </div>
      <div class="prld10"> </div>
      <div class="prld11"> </div>
      <div class="prld12"> </div>
      <div class="prld13"> </div>
      <div class="prld14"> </div>
      <div class="prld15"> </div>
      <div class="prld16"> </div>
      <div class="prld17"> </div>
      <div class="prld18"> </div>
      <div class="prld19"> </div>
      <div class="prld20"> </div>
      <div class="prld21"> </div>
      <div class="prld22"> </div>
      <div class="prld23"> </div>
      <div class="prld24"> </div>
      <div class="prld25"> </div>
    </div>
  </div>

        </div>
		<div class="clearfix"></div>
	</div>




	<div class="clearfix"></div>



<!-- //ОТЗЫВЫ -->
	<div class="follow">
<div class="container">


			<div class="slider3">
				<ul class="rslides" id="slider3">
					<li>
						<img src="images/team-1.png" alt="Комментарий">
						<p>Очень удобный сервис.Делает жизнь ярче!</p>
					</li>
					<li>
						<img src="images/team-2.png" alt="Комментарий">
						<p>Спасибо, что создали TRAVEL MAP!</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //ОТЗЫВЫ -->

	<!-- Social -->
	<div class="social">
		<p>ПОДЕЛИТЬСЯ</p>
		<!-- ПОДЕЛИТЬСЯ -->
		<ul class="social-icons">
			<li><a href="#" class="facebook" title="Go to Our Facebook Page"></a></li>
			<li><a href="#" class="twitter" title="Go to Our Twitter Account"></a></li>
			<li><a href="#" class="googleplus" title="Go to Our Google Plus Account"></a></li>
			<li><a href="#" class="instagram" title="Go to Our Instagram Account"></a></li>
			<li><a href="#" class="youtube" title="Go to Our Youtube Channel"></a></li>
		</ul>
		<!-- //ПОДЕЛИТЬСЯ -->

	</div>
	<!-- //Social -->

	<!-- Copyright -->
	<div class="copyright">
		<p>&copy; 2016 TRAVEL MAP. All Rights Reserved.</p>
	</div>
	<!-- //Copyright -->
<!-- СЛАЙДЕР ОТЗЫВОВ -->
		 			 <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
			<script src="js/responsiveslides.min.js"></script>
			<script>
				$(function () {
					$("#slider1, #slider2, #slider3").responsiveSlides({
						auto: true,
						nav: true,
						speed: 1500,
						namespace: "callbacks",
						pager: true,
					});
				});
			</script>
		<!-- //СЛАЙДЕР ОТЗЫВОВ -->

		<!-- СКРИПТ ДЛЯ МЕНЮ -->
        <script type="text/javascript" src="js/description.js"></script>
        <script src="js/ytmenu.js"></script>
		<!-- //СКРИПТ ДЛЯ МЕНЮ -->
          <div id="popupBoxTwoPosition">
			<div class="popupBoxWrapper">
					<div class="agile">
			<div class="signin-form profile">
                <a  href="javascript:void(0)" onclick="toggle_visibility('popupBoxTwoPosition');"><img class="close_image" src="images/close.png" alt="закрыть"></a>
				<h3>НАМ ОЧЕНЬ ЖАЛЬ, ЧТО ВЫ НАС ПОКИДАЕТЕ</h3>

				<div class="login-form">
					<form action="index.php?exit=true" method="POST">

						<input type="submit" value="ВЫЙТИ">
                  <input type="button" onclick="toggle_visibility('popupBoxTwoPosition');"  value="ОТМЕНА">

					</form>
				</div>

			</div>
		</div>
				</div>
			</div>



    <div id="popupBoxOnePosition">
			<div class="popupBoxWrapper">
			<div class="agile">
			<div class="signin-form profile">
         <a  href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');"><img class="close_image" src="images/close.png" alt="закрыть"></a>
			<form action="change_user_info.php" method="post" enctype="multipart/form-data">
						<div class="im-g">
							<?php
								if(!empty($myrow['user_avatar'])){
									echo '<img class="avatar" src="'.$myrow['user_avatar'].'" alt="">';
								} else {
									echo '<img class="avatar" src="images/user.png" alt="">';
								}
							?>
						</div>
                	<p>Загрузить фото</p> <input type="file" name="photo" id="photo" >
						<input type="text" name="userName" placeholder="Имя" required="">
                	<input type="text" name="userLastName" placeholder="Фамилия" required="">
  						<input type="date" name="birthDate" placeholder="Дата рождения" >
						<input type="text" name="phone" placeholder="Телефон" required="" >
                	<input type="text" name="email" placeholder="E-mail" required="" >
						<input type="submit" name="submit" value="СОХРАНИТЬ">
                  <input type="button" onclick="toggle_visibility('popupBoxOnePosition');" value="ОТМЕНА">
					</form>
				</div>
			</div>
		</div>
			</div>
		       <div id="popupBoxPosition">
				<div class="main">
		<div class="w3l_main_grid">
					<div class="w3l_main_grid1">
                                <a  href="javascript:void(0)" onclick="toggle_visibility('popupBoxPosition');" id="btnCloseAuthorization"><img class="close_city" src="images/close.png" alt="закрыть"></a>

				<div class="w3l_main_grid1_left">
				</div>

				<div class="clear"> </div>
				<div class="w3l_main_grid1_sub">
					<img src="#" alt=" " class="img-responsive" id="city_photo"/>
					<h2><div id="city_title"></div></h2>
				</div>
			</div>
			<div class="w3l_main_grid2">
				<div class="sap_tabs">

					<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						<div class="resp-tabs-container">

							<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
								 <div class="wthree_tab_grid">
                                    <h4>О городе</h4>
                                    <div id="city_description"></div>
								</div>
							</div>
							<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-2">
								<div class="wthree_tab_grid" id="sites_list">

								</div>
							</div>
							<div class="tab-3 resp-tab-content" aria-labelledby="tab_item-3">
								<div class="wthree_tab_grid">
									<h4>Chats</h4>
									<div class="agile_activity_row">
										<div class="agile_activity_img"><img src="images/1.png" alt=" " /><span>10:00 PM</span></div>
										<div class="agile_activity_img1">
											<div class="agile_activity_sub">
												<h5>Meagan Fisher</h5>
												<p>Hello !</p>
											</div>
										</div>
										<div class="clear"> </div>
									</div>
									<div class="agile_activity_row">
										<div class="agile_activity_desc1"></div>
										<div class="agile_activity_img2">
											<div class="agile_activity_sub1">
												<h5>Pooja Lii</h5>
												<p>Hi,How are you ? What about our next meeting?</p>
											</div>
										</div>
										<div class="agile_activity_img"><img src="images/6.png" class="img-responsive" alt=""><span>10:02 PM</span></div>
										<div class="clear"> </div>
									</div>
									<div class="agile_activity_row">
										<div class="agile_activity_img"><img src="images/1.png" alt=" " /><span>10:10 PM</span></div>
										<div class="agile_activity_img1">
											<div class="agile_activity_sub">
												<h5>Meagan Fisher</h5>
												<p>Yeah Fine!</p>
											</div>
										</div>
										<div class="clear"> </div>
									</div>
								</div>
							</div>

						</div>

						<ul class="resp-tabs-list">
							<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span class="w3ls_figure"> </span></li>
							<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span class="w3ls_figure1"> </span></li>
							<li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span class="w3ls_figure2"> </span></li>
							<div class="clear"> </div>
						</ul>
					</div>
				</div>
				<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default', //Types: default, vertical, accordion
							width: 'auto', //auto or any width like 600px
							fit: true   // 100% fit in a container
						});
					});
				</script>
			</div>
		</div>

	</div>
			</div>
        </body>
</html>

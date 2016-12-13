<?php
	session_start();
	if(isset($_GET['exit'])){
		unset($_SESSION['email']);
		session_destroy();
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

	<link rel="stylesheet" href="css/bootstrap.min.css" 	type="text/css" media="all">
    <link rel="stylesheet" href="css/style.css" 			type="text/css" media="all">
    <link rel="stylesheet" href="css/style22.css" 			type="text/css" media="all">

    <link rel="stylesheet" href="css/map.css" />
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui-min.js"></script>
	<script src="js/map_init-min.js"></script>
	<script src="js/cusel-2.5-min.js"></script>


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
				<a href="#">TRAVEL MAP</a>
			</div>
			<div class="side">
				<nav class="dr-menu">
					<div class="dr-trigger"><span class="dr-icon dr-icon-menu"></span></div>
					<ul>
						<?php
						if(isset($_SESSION) && isset($_SESSION['email'])){
							echo '<li><a class="scroll dr-icon dr-icon-user" href="profile.php">КАБИНЕТ</a></li>';
						} else {
							echo '<li><a class="scroll dr-icon dr-icon-user" href="javascript:void(0)" onclick="toggle_visibility(\'popupBoxOnePosition\');">ВОЙТИ</a></li>';
							echo '<li><a class="scroll dr-icon dr-icon-camera" href="javascript:void(0)" onclick="toggle_visibility(\'popupBoxTwoPosition\');">РЕГИСТРАЦИЯ</a></li>';
						}
						?>
						<li><a class="scroll dr-icon dr-icon-bullhorn" href="service.html">ПРО СЕРВИС</a></li>
					</ul>
				</nav>
			</div>
		</div>

       <div class="wrap">
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
        <map id="map-ukraine1" name="map-ukraine1">
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

		<!-- //СКРИПТ ДЛЯ МЕНЮ -->


    <div id="popupBoxOnePosition">
			<div class="popupBoxWrapper">
				<div class="w3">

			<div class="signin-form profile">
                <a  href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');" id="btnCloseAuthorization"><img class="close_image" src="images/close.png" alt="закрыть"></a>

				<h3>Добро пожаловать!</h3>

				<div class="login-form">
					<form id="authorization" action="authorization.php" method="post">
						<input type="text" name="email" placeholder="E-mail" required="">
						<input type="password" name="password" placeholder="Пароль" required="">
						<div class="tp">
							<input type="submit" value="ВОЙТИ" id="submitv">
						</div>
					</form>
                    <div id="ackv"></div>
				</div>

				<p><a href="javascript:void(0)" onclick="toggle_visibility('popupBoxTwoPosition');"> Регистрация</a></p>
			</div>

			</div>
				</div>
			</div>






          <div id="popupBoxPosition">
				<div class="main">
					<div class="w3l_main_grid">
						<div class="w3l_main_grid1">
                  	<a  href="javascript:void(0)" onclick="toggle_visibility('popupBoxPosition');" id="btnCloseAuthorization">
								<img class="close_city" src="images/close.png" alt="закрыть">
							</a>
							<div class="w3l_main_grid1_left"></div>
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
											<div class="wthree_tab_grid" id="sites_list"></div>
										</div>
									</div>
									<ul class="resp-tabs-list">
										<li class="resp-tab-item" id="for_index" aria-controls="tab_item-1" role="tab"><span class="w3ls_figure"> </span></li>
										<li class="resp-tab-item" id="for_index" aria-controls="tab_item-2" role="tab"><span class="w3ls_figure1"> </span></li>
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





       <div id="popupBoxTwoPosition">
			<div class="popupBoxWrapper">
					<div class="agile">
			<div class="signin-form profile">
                <a  href="javascript:void(0)" onclick="toggle_visibility('popupBoxTwoPosition');" id="btnCloseRegister"><img class="close_image" src="images/close.png" alt="закрыть"></a>
				<h3>Регистрация</h3>

				<div class="login-form">
					<form id="register" action="register.php" method="post">
						<input type="text" name="email" placeholder="E-mail" required="" >
						<input type="text" name="login" placeholder="Логин" required="">
						<input type="password" name="password" placeholder="Пароль" required="">
						<input type="password" name="r_password" placeholder="Повторите пароль" required="">
						<input type="submit" value="Зарегистрироваться" id="submit">
					</form>
<div id="ack"></div>
				</div>

			</div>
		</div>
				</div>
			</div>



         <script type="text/javascript" src="js/description.js"></script>
        <script type="text/javascript" src="js/register_form.js"></script>
        <script type="text/javascript" src="js/authorization_form.js"></script>
			<script src="js/ytmenu.js"></script>
        </body>
</html>

</div>	
	<div class="i-clearfix"></div>
</div>	
<?include_once $_SERVER["DOCUMENT_ROOT"].'/include.footer.php';?>	
</div>
<div id="sign-in-popup" class="b-popup-window">
	<a href="" class="b-popup-window__close" title="Закрыть окно"></a>
	
	<div class="b-popup-window_theme-1 b-popup-window_type-sign-in">
		<h2 class="b-popup-window__heading">Регистрация врачей</h2>
		
		<div class="b-popup-window__text">
			<p>Вы — врач! Быть таким специалистом — огромная 
	ответственность. Мы также ответственно относимся
	к регистрациям на проекте, поэтому предпочитаем
	знакомиться с каждым врачом лично.</p>
			<p>Пожалуйста, оставьте телефон и email для связи.
	После того, как наш специалист свяжется с вами,
	Вы получите доступ к специальной 
	врачебной части сайта</p>
		</div>
		
		<div class="b-sign-in__form">
			<form action="">
				<div class="b-form-field">
					<input type="tel" name="phone" value="" data-placeholder="Телефон" class="b-input-text" autocomplete="off" required>
				</div>
				<div class="b-form-field">
					<input type="email" name="mail" value="" data-placeholder="E-mail" class="b-input-text" autocomplete="off" required>
				</div>
				<div class="b-form-submit">
					<button type="submit" class="b-button b-button_theme-1-L-send-app b-button_type-submit"></button>
				</div>
			</form>
		</div>
		
	</div>
	
</div>


<div id="login-popup" class="b-popup-window">
	<a href="" class="b-popup-window__close" title="Закрыть окно"></a>
	
	<div class="b-popup-window_theme-1 b-popup-window_type-login">
		<h2 class="b-popup-window__heading">Вход для врачей</h2>
		
		<div class="b-login__form">
			<form action="">
				<div class="b-form-field">
					<input type="text" name="login" value="" data-placeholder="Логин" class="b-input-text" autocomplete="off" required>
				</div>
				<div class="b-form-field">
					<input type="password" name="password" value="" data-placeholder="Пароль" class="b-input-text" autocomplete="off" required>
				</div>
				<div class="b-form-link b-form-forgotten">
					<a href="">Забыли пароль?</a>
				</div>
				
				<div class="b-popup-window__note">
					Вся  информация, размещенная в данном разделе веб-сайта, предназначена исключительно для специалистов в области обращения лекарственных средств.  Если Вы не являетесь специалистом в области обращения лекарственных средств, в соответствии с положениями действующего законодательства РФ Вы не имеете права доступа к информации, размещенной в данном разделе веб-сайта, в связи с чем просим вас незамедлительно покинуть данный раздел веб-сайта.
Если Вы являетесь специалистом в области обращения лекарственных средств, в качестве подтверждения нажмите “ВОЙТИ”, чтобы продолжить работу. 
				</div>
				
				<div class="b-form-submit">
					<button class="b-button b-button_type-submit b-button_theme-1-L-enter" type="submit"></button>
				</div>
				
				<div class="b-popup-window__sign-in-text">Зарегистрируйтесь, чтобы стать участником проекта</div>
				<a href="#" class="b-button b-button_type-link b-button_theme-1-S-reg" id="login-popup-registration-link"></a>
			</form>
		</div>
		
	</div>
	
</div>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31297918-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>

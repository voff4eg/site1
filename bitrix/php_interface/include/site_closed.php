<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script type="text/javascript" src="/js/site_closed.js"></script>

<style>
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td, textarea, input, header, footer, menu, nav {
	margin: 0;
	padding: 0;
}
html {
	overflow-y:scroll;
	width:100%;
}
body {
	width: 100%;
	background-color: #ffffff;
	font-family: Arial, Helvetica, sans-serif;
	color: #333333;
	font-size: 10.5pt;
	line-height: 1.4;
	min-width: 1000px;
}
img {
	border: 0;
	vertical-align: bottom;
}
h1 {
	margin: 0 0 30px 0;
}
#content {
	width: 400px;
	text-align: center;
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -150px 0 0 -200px;

}
.b-first-form {
	margin: 0 0 50px 0;
}
.b-form-field {
	margin: 0 auto 30px auto;
	width: 150px;
}
.b-form-field__placeholder {
	position: relative;
}
.b-form-field__placeholder__text {
	position: absolute;
	top: 0;
	left: 0;
	color: #858585;
	text-align: center;
	font-size: 13pt;
	display: none;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-khtml-box-sizing: border-box;
	padding-top: 4px;
	cursor: text;
}
.i-placeholder .b-form-field__placeholder__text {
	display: block;
}
.b-input-text {
	border:1px solid #dbdbdb;
	font-family:Arial, Helvetica, sans-serif;
	font-size:11pt;
	padding: 3px;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-khtml-box-sizing: border-box;
	width: 150px;
	height: 30px;
}
button {
	margin: 0;
	padding: 0;
	border: none;
	background: transparent;
}
.b-button_theme-1-L-subscribe {
	background: url(images/button_subscribe.gif) no-repeat 0 0;
	height: 47px;
	width: 216px;
}
.b-button_theme-1-L-subscribe:hover, .b-button_theme-1-L-subscribe.i-button-hover {
	background-position: 0 -46px;
}
.b-button_theme-1-L-subscribe:active, .b-button_theme-1-L-subscribe.i-button-active {
	background-position: 0 -92px;
}
</style>

<title>Lilly Answers That Matter</title>
</head>

<body>
<div id="content">
<h1><img src="/images/h1.gif" width="396" height="42" alt="�� ������ ������ �� �������� �������?
����������� �� ����������."></h1>

<div class="b-first-form">
<?
if (strlen($_POST["form_email_2"]) > 0)
{
	$text = trim($_POST["form_email_2"])."\n";
	if (file_put_contents("deny/fjtmvui25kc845.txt", $text, FILE_APPEND))
	{
		$file_path = "http://".$_SERVER['HTTP_HOST'];
		?>
		<script type="text/javascript">
        	window.location.href="<?=$file_path?>";
        </script>
		<?
	}
}
else
{
	?>
	<form action="" method="post">
		<div class="b-form-field">
			<input type="email" required autocomplete="off" class="b-input-text" data-placeholder="E-mail" value="" name="form_email_2">
		</div>
		<div class="b-form-submit">
			<button type="submit" class="b-button b-button_theme-1-L-subscribe b-button_type-submit"></button>
		</div>
	</form>
    <?
}
?>
</div>
<div class="b-logo">
	<img src="/images/lily_logo.gif" width="128" height="48" alt="Lilly Answers That Matter" title="Lilly Answers That Matter"></div>
</div>

</body>
</html>
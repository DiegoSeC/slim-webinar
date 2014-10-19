<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Webinar FGConsulting</title>
	<base href="{{ baseUrl }}">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/localization/messages_es.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/jquery-validate.tooltip.js"></script>
</head>
<body>
	<div class="container">
		<form action="" method="post">
			<input name="nombre" type="text" class="form-controller name" required>
			<input name="edad" type="text" class="form-controller age" required>
			<input name="email" type="text" class="form-controller email" required>
			<input name="pais" type="text" class="form-controller country" required>
			<input name="profesion" type="text" class="form-controller profesion" required>
			<textarea name="interes" name="" id="" cols="30" rows="10" class="form-controller interes"></textarea>
			<input type="submit" value="Enviar" class="form-controller submit">
		</form>
	</div>

	<?php if(isset($flash['success'])): ?>
	<script>alert('<?php echo $flash['success'] ?>');</script>
	<?php endif; ?>
	<script>

		$(function() {
			$('form').validate();
		});

	</script>
</body>
</html>
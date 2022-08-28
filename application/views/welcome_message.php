<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>YANA test</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

<div id="container">
	<h1>Yana Test!</h1>

	<div id="body">
		<h3>Endpoint que cree una cuenta nueva de un usuario .</h3>

		<p>Desde PostMan enviar los siguientes parametros:</p>
		<code>link: https://shlgruas.com/ci/Users_controller/create</code>
		<p>Parametros por <span>POST<span></p>
		<code>email, password, rep_password, username, full_name, stat, type_user</code>

		<h3>Endpoint que reciba las credenciales de un usuario y que valide.</h3>
		<p>Desde PostMan enviar los siguientes parametros:</p>
		<code>link: https://shlgruas.com/ci/Users_controller/login</code>
		<p>Parametros por <span>POST<span></p>
		<code>email, password</code>

		<h3>Endpoint, este endpoint devuelve el historial de la conversación.</h3>
		<p>Desde PostMan enviar los siguientes parametros:</p>
		<code>link: https://shlgruas.com/ci/Users_controller/get_conversations</code>
		<p>Parametros por <span>JSON<span>, enviar por uid -> 1 o 2</p>
		<code>{
				"uid": 1
			}</code>

	</div>

	<p class="footer">Pedro Arrieta</p>
</div>

</body>
</html>
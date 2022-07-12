<link rel="stylesheet" type="text/css" href="../../styles.css">
<link rel="icon" href="../../resource/logo.png">
<style>
	.login-box {
			height: auto;
			width: 50%;
			left: 100px;
			padding: 40px;
			background: white;
			box-sizing: border-box;
			box-shadow: 0 15px 25px rgba(0,0,0,.6);
			border-radius: 5px;
			padding-bottom: 10px;
			margin: auto;
			margin-top: 20px;
			margin-bottom: 25px;
		}

		.login-box h2 {
			margin: 0 0 30px;
			padding: 0;
			color: black;
			text-align: center;
		}

		.login-box .user-box {
			position: relative;
		}

		.login-box .user-box input {
			width: 100%;
			padding: 10px 0;
			font-size: 16px;
			color: black;
			margin-bottom: 30px;
			border: 1px solid black;
			border-radius: 3px;
			outline: none;
			background: transparent;
		}

		.login-box .user-box label {
			position: absolute;
			top:0;
			left: 0;
			padding: 10px 0;
			font-size: 16px;
			color: black;
			pointer-events: none;
			transition: .5s;
		}

		.login-box .user-box input:focus ~ label,
		.login-box .user-box input:valid ~ label {
			top: -20px;
			left: 0;
			/*color: #f1f3fa;*/
			color: gray;
			font-size: 12px;
		}

		.login-box form a[href='javascript:{}'] {
			position: relative;
			display: inline-block;
			padding: 10px 20px;
			color: white;
			font-size: 16px;
			text-decoration: none;
			overflow: hidden;
			transition: .5s;
			margin-top: 5px;
			margin-left: 25%;
			background-color: #0f4fe6;
			border-radius: 5px;
		}

		.login-box a[href='javascript:{}']:hover {
			background: #46d227;
			color: black;
		}

		.login-box form a[href='form_sign_in.php'] {
			float: left;
			font-size: 16px;
			text-decoration: none;
		}


</style>
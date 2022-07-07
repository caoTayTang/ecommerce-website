<link rel="stylesheet" type="text/css" href="../../styles.css">
<link rel="icon" href="../../resource/logo.png">
<style>
	/*Override value from styles.css*/
	#main_div {
		height: 150vh;
	}

	#header	{
		height: 8%;
	}
	#footer {
		height: 30%;
	}
	/*End override*/
	.login-box {
			position: absolute;
			top: 36%;
			left: 50%;
			width: 50%;
			padding: 40px;
			margin-top: 10px;
			transform: translate(-50%, -50%);
			background: white;
			box-sizing: border-box;
			box-shadow: 0 15px 25px rgba(0,0,0,.6);
			border-radius: 10px;
			padding-bottom: 10px;
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
			border: none;
			border-bottom: 1px solid black;
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

		.login-box form a {
			position: relative;
			display: inline-block;
			padding: 10px 20px;
			color: black;
			font-size: 16px;
			text-decoration: none;
			text-transform: uppercase;
			overflow: hidden;
			transition: .5s;
			margin-top: 5px;
			margin-left: 43%;
			background-color: #0f4fe6;
			border-radius: 5px;

		}

		.login-box a:hover {
			background: #46d227;
			color: black;
		}
</style>
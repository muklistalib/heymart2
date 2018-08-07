<!DOCTORTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	 <link href="Admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="Admin/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="Admin/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="public/Admin/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div class="login_wrapper"> 
	<div class="animate form login_form">
	<section class="login_content">
	
	
	<form action="{{ route('login') }}" method="post">
	 {{ csrf_field() }}
	<h1>Login Form</h1>

              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
              </div>
			  <div class="clearfix"></div>
			  <div class="col-md-8">
			  
						<label>
						<input type="checkbox" {{ old('remember') ? 'checked' : '' }}> Remember me </label>
						<input type="submit" a class="btn btn-default submit" value="Log in">
				</div>		
						
            
            </form>
            
              </div>
          </section>
</div>
<script src="AdminLTE/plugins/jQuary/jquary-2.2.3.min.js"></script>
<script src="AdminLTE/bootstrap/dist/js/bootstap.min.js"></script>
<script src="AdminLTE/plugins/iCheck/iCheck.min.js"></script>


<script>
	$(function() {
		$('input').iCheck({
			checkboxClass: 'icheckbox square-blue',
			increaseArea: '20%'
		});
	});
</script>
</body>
</html>			
			
			
			
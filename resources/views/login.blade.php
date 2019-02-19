<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
@include('partials._components')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
		    <b>Tecsu</b>
		</div>
	  <!-- /.login-logo -->
		<div class="login-box-body">
	    	<p class="login-box-msg">Inicio de sesión</p>

	   		<form id="login" action="../../index2.html" method="post">
		   		<div class="form-group has-feedback">
		      		{{ csrf_field() }}
		        	<input name="user" type="text" class="form-control" placeholder="Usuario">
		        	<span class="glyphicon glyphicon-user form-control-feedback"></span>
		      	</div>
		      	<div class="form-group has-feedback">
		        	<input name="password" type="password" class="form-control" placeholder="Contraseña">
		        	<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		      	</div>
		      	<div class="row">
		        	<div class="col-xs-8">
		        	</div>
		        <!-- /.col -->
		        <div class="col-xs-4">
		          <button id="ingresar" type="button" class="btn btn-primary btn-block btn-flat">Ingresar</button>
		        </div>
		        <!-- /.col -->
		      	</div>
	    	</form>
	  	</div>
	  <!-- /.login-box-body -->

	  <div class="modal fade" id="mdAlert">
	      <div class="modal-dialog">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title">Información</h4>
	          </div>
	          <div id="mdlMsg" class="modal-body">
	            
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-default pull-rigth" data-dismiss="modal">Close</button>
	            
	          </div>
	        </div>
	        <!-- /.modal-content -->
	      </div>
	      <!-- /.modal-dialog -->
	    </div>
	</div>
<!-- /.login-box -->


<script>
  $(document).ready(function(){
  	$('#mdAlert').modal({
  		show:false
  	});
  	$('#ingresar').click(function(){
  		$.ajax({
  			method:'post',
  			url:'/Taller/login',
  			data: $('#login').serialize(),
  			success: function(respuesta){
  				if(respuesta=='1'){
  					window.location.href="/Taller/main";
  				}else{
  					$('#mdlMsg').html('<p>incorrecto</p>');
  					$('#mdAlert').modal('show');
  				}
  			}
  		});
  		
  	});
  });
</script>
</body>
</html>

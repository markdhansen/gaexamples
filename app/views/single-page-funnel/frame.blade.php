@extends('layouts.frame')
@section('title')
Single Page Funnel
@stop
@section('stylesheet')
	@parent
	<link href='/src/css/single-page-funnel-frame.css' rel='stylesheet' media="all" />
@stop
@section('scripts')
	@parent
	<script src='/src/js/modules/Dbm.js'></script>
	<script src='/src/js/modules/Validate.js'></script>
	<script src='/src/js/modules/Modal.js'></script>
	<script src='/src/js/modules/showCode.js'></script>
	<script src='/src/js/validation.js'></script>
	<script src='/src/js/runexample.js'></script>
	<script src='/src/js/single-page-funnel/frame.js'></script>
@stop
@section('navbar')
<div class="navbar navbar-default navbar-static run-ui-navbar" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="javascript:void(0)">Single Page Funnel</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li id="signup-btn"><button type="button" class="btn btn-default navbar-btn">Sign Up</button></li>
				<li id="login-btn"><button type="button" class="btn btn-default navbar-btn">Login</button></li>
			</ul>
		</div>
	</div>
</div>
@stop
@section('content')
<!-- login account form -->
<div class="modal fade" id="login-account-dialog" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Login</h4>
			</div>
			<div class="modal-body">
				<div title="Login">                            
					<form autocomplete="off">
						<div class="form-group">									
							<label for="email">Email</label>
							<input id="login-email" class="form-control text ui-widget-content ui-corner-all" required="required" type="email" name="email" value="" placeholder="Enter email">
						</div>	
						<div class="form-group">
							<label for="password">Password</label>
							<input id="login-password" class="form-control text ui-widget-content ui-corner-all" type="password" name="password" value="" required="required" placeholder="Password">
						</div>
					</form>
				</div>
				<p class="validateTips alert alert-warning">All form fields are required.</p>
			</div>
			<div class="modal-footer">
				<button id="login-account-button" type="button" class="btn btn-primary">Submit</button>
				<button id="close-login-account-button" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>      

<!-- verify account form -->
<div class="modal fade" id="verify-account-dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<div title="Verify account">                            
					<form autocomplete="off">
						<div class="form-group">
							<label for="verificationInput">Verification code</label>
							<input type="text" name="verificationInput" id="verificationInput" value="" class="form-control text ui-widget-content ui-corner-all">
						</div>
					</form>
					<p class="validateTips alert alert-warning">All form fields are required.</p>
				</div>
			</div>
			<div class="modal-footer">
				<button id="verify-account-button" type="button" class="btn btn-primary">Verify account</button>
				<button id="close-verify-account-button" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>    
<!-- div that holds the code that gets displayed in code window at runtime -->
<div id="this-file" class="hidden">
	{{{file_get_contents(realpath('src/js/single-page-funnel/frame.js'))}}}
</div>
@stop
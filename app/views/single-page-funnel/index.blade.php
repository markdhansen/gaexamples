@extends('layouts.master')
@section('stylesheet')
	@parent
	<link href='/lib/css/prettify.css' rel='stylesheet' media="all" />
	<link href='/src/css/single-page-funnel-frame.css' rel='stylesheet' media="all" />
@stop
@section('scripts')
	@parent
	<script src='/lib/js/prettify.js'></script>
	<script src='/src/js/modules/Dbm.js'></script>
	<script src='/src/js/validation.js'></script>
	<script src='/src/js/runexample.js'></script>
	<script src='/src/js/single-page-funnel/main.js'></script>
@stop
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
			<hr />
			<div class="row">
				<div class="col-md-12 instruction-view">
					<div class="main-listing single-funnel">
						<div class="row">
							<div class="col-md-9">
								<div class="help-icons"></div>
								<h1>Single page funnel</h1> 
							</div>
							<div class="col-md-3 right">
								<a href="#"><i class="fa fa-star orange"></i> Favorited</a>
							</div>
						</div>
						<p>
							This example illustrates how to use Google Analytics virtual pageviews to create a funnel that tracks conversion success for a multi-step account creation process. </p>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu turpis eu magna interdum mollis nec sollicitudin arcu. Integer vitae odio suscipit, sagittis felis id, auctor libero. Nullam malesuada augue non ipsum facilisis pulvinar. Sed gravida commodo metus, id varius dui lobortis vitae. Ut et massa massa. 
						</p>
						<p>
							<a class="btn btn-sm btn-primary">Run example &raquo;</a>
						</p>
					</div>
				</div>
				<div class="example-view hidden">
					<div class="col-md-12 run-ui">
						<iframe src="/single-page-funnel/frame" height="100%" width="100%"></iframe>
					</div>
					<div class="col-md-12 run-code">
						<h3 class="code-header">Code window</h3>
						<div class="panel-body-wrapper">
							<pre id="code-window" class="scroller-area prettyprint linenums"></pre>
						</div>                    
					</div>
				</div>
			</div>
			<hr />
		</div>
	</div>
</div>
@stop
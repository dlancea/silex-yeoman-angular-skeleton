<div class="row">
	<h1>Data</h1>
	<ul>
		<li 
			class="col-sm-12" 
			ng-repeat="stuff in data" 
		>
			<div>Data: {{ stuff.data }}</div>
			<div>User: {{ stuff.username }}</div>
		</li>
	</ul>
</div>

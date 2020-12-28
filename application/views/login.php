
<!-- Main -->
<section id="main" class="wrapper style2">
	<div class="title">Login</div>
	<div class="container">
		<!-- Features -->
		<section id="features">
			<div class="feature-list">
				<div class="row">
					<form name="form" method="post" action="<?= site_url('users/login'); ?>" id="form-id">
						<div class="form-group">
							<label for="name">Email address</label>
							<input name="name" type="text" class="form-control" id="name" placeholder="Name">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input name="pass" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>
						<ul class="actions special">
							<button type="submit" class="button style1 large">Submit</button>
						</ul>
					</form>
				</div>
			</div>
		</section>
	</div>
</section>


<script>
	$(document).ready(function() {
		$('#form-id').submit(function(evt) {
			evt.preventDefault();
			var url = $(this).attr('action');
			var data = $(this).serialize();
			$.post(url, data, function(o) {
				if (o.result == 1) {
					window.location.href = '<?= site_url('dashboard'); ?>'
				} else {
					alert('invalid login');
				}
			}, 'json');

		});
	});
</script>

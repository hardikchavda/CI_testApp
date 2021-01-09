<?php $this->load->view('header'); ?>
<!-- Main -->
<section id="main" class="wrapper style2">
	<div class="title">Register New User</div>
	<div class="container">
		<!-- Features -->
		<section id="features">
			<div class="feature-list">
				<div class="row">
					<form name="form" method="post" action="<?= site_url('users/register'); ?>" id="form-id" enctype="multipart/form-data">
						<div class="form-group">
							<label for="name">Email address</label>
							<input name="name" type="text" class="form-control" id="name" placeholder="Name">
						</div>
						<div class="form-group">
							<label for="newPass">Password</label>
							<input name="pass" type="text" class="form-control" id="newPass" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="confirmPass">Password</label>
							<input name="confirmPass" type="text" class="form-control" id="confirmPass" placeholder="Confirm Password">
						</div>
						<div class="form-group">
							<label for="uploadFile">Password</label>
							<input name="uploadFile" type="text" class="form-control" id="uploadFile" placeholder="Upoload">
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
					window.location.href = '<?= site_url('login'); ?>'
				} else {
					alert('invalid login');
				}
			}, 'json');

		});
	});
</script>
<?php $this->load->view('footer'); ?>

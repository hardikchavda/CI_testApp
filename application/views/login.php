<!-- Main -->
<section id="main" class="wrapper style2">
	<div class="title">Login</div>
	<div class="container">
		<!-- Features -->
		<section id="features">
			<div class="feature-list">
				<div class="row">
					<?php echo form_open('users/login', ['id' => 'form-id']); ?>
					<div class="form-group">
						<label for="name">Email address</label>
						<?php
						echo form_input(
							[
								'name' => 'name',
								'placeholder' => 'Name',
								'class' => 'form-control',
								'id' => 'name'
							]
						);
						?>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<?php
						echo form_password(
							[
								'name' => 'pass',
								'placeholder' => 'Password',
								'class' => 'form-control',
								'id' => 'exampleInputPassword1'
							]
						);
						?>
					</div>
					<ul class="actions special">
						<!-- <button type="submit" class="button style1 large">Submit</button> -->
						<?php echo form_submit('submit','Login',['class'=>'button style1 large']); ?>
						<?php echo form_reset('reset','Reset',['class'=>'button style1 large'])?>
					</ul>
					<?php echo form_close(); ?>

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

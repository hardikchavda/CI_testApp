<?php $this->load->view('header'); ?>
<!-- Main -->
<section id="main" class="wrapper style2">
	<div class="title">Register New User</div>
	<div class="container">
		<!-- Features -->
		<section id="features">
			<div class="feature-list">
				<div class="row">
					<?php echo form_open_multipart('login/register_check', ['id' => 'form-id']); ?>
					<div class="form-group">
						<label for="name">Email address</label>

						<?php
						echo form_input(
							[
								'name' => 'name',
								'placeholder' => 'Name',
								'class' => 'form-control',
								'id' => 'name',
								'value' => set_value('name')
							]
						);
						?>
						<span> <?php echo form_error('name'); ?> </span>
					</div>
					<div class="form-group">
						<label for="newPass">Password</label>
						<?php
						echo form_password(
							[
								'name' => 'pass',
								'placeholder' => 'Password',
								'class' => 'form-control',
								'id' => 'newPass'
							]
						);
						?>
						<span> <?php echo form_error('pass'); ?> </span>
					</div>
					<div class="form-group">
						<label for="confirmPass">Confirm Password</label>

						<?php
						echo form_password(
							[
								'name' => 'confirmPass',
								'placeholder' => 'Confirm Password',
								'class' => 'form-control',
								'id' => 'confirmPass'
							]
						);
						?>
						<span> <?php echo form_error('confirmPass'); ?> </span>
					</div>
					<div class="form-group">
						<label for="fileUpload">Picture Upload </label>
						<?php
						echo form_upload(
							[
								'name' => 'userfile',
								'class' => 'form-control',
								'id' => 'fileUpload'
							]
						);
						?>
						<span>
							<?php if (isset($upload_error)) echo $upload_error; ?>
						</span>
					</div>

					<?php if ($feedback = $this->session->flashdata('register')) : ?>
						<div class="alert alert-dismissible <?= $this->session->flashdata('feedback_class'); ?>">
							<strong>Oh snap!</strong> <?= $feedback; ?>
						</div>
					<?php endif; ?>
					<ul class="actions special">
						<?php echo form_submit('submit', 'Add New User', ['class' => 'button style1 large']); ?>
						<?php echo form_reset('reset', 'Reset', ['class' => 'button style1 large']) ?>
					</ul>
					<?php
					//echo validation_errors();
					echo form_close();
					?>
				</div>
			</div>
		</section>
	</div>
</section>
<?php $this->load->view('footer'); ?>

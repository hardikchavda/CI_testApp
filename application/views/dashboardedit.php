<?php $this->load->view('header'); ?>
<!-- Main -->
<section id="main" class="wrapper style2">
	<div class="title">Edit User</div>
	<div class="container">
		<!-- Features -->
		<section id="features">
			<div class="feature-list">
				<div class="row">
					<?php echo form_open("dashboard/update_user/{$data->id}", ['id' => 'form-id']); ?>
					<div class="form-group">
						<label for="name">Email address</label>

						<?php
						echo form_input(
							[
								'name' => 'name',
								'placeholder' => 'Name',
								'class' => 'form-control',
								'id' => 'name',
								'value' => set_value('name', $data->name)
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
								'id' => 'newPass',
								'value' => set_value('name', $data->password)
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
					<!-- <div class="form-group">
							<label for="uploadFile">User Image</label>
							<input name="uploadFile" type="file" class="form-control" id="uploadFile" placeholder="Upoload">
						</div> -->
					<?php if ($feedback = $this->session->flashdata('edit')) : ?>
						<div class="alert alert-dismissible <?= $this->session->flashdata('feedback_class'); ?>">
							<strong>Oh snap!</strong> <?= $feedback; ?>
						</div>
					<?php endif; ?>
					<ul class="actions special">
						<?php echo form_submit('submit', 'Edit User', ['class' => 'button style1 large']); ?>
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

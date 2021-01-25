<?php $this->load->view('header'); ?>
<!-- Main -->
<section id="main" class="wrapper style2">
	<div class="title">Dashboard</div>
	<div class="container" style="border: 1px solid;">
		<?php if ($feedback = $this->session->flashdata('delete')) : ?>
			<div class="alert alert-dismissible <?= $this->session->flashdata('feedback_class'); ?>">
				<strong>Oh snap!</strong> <?= $feedback; ?>
			</div>
		<?php endif; ?>
		<div class="float-right">
			<a href="<?= base_url('login/register') ?>" class="btn btn-primary">Add User</a>
		</div>
		<table class="table table-bordered">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Password</th>
				<th>User</th>
				<th>Options</th>
			</tr>

			<?php
			//var_dump($result);
			$count = $this->uri->segment(3);
			foreach ($result as $data) :
			?>
				<tr>
					<td><?= ++$count ?></td>
					<td><?= $data->name ?></td>
					<td><?= $data->password ?></td>
					<td> <img src="<?= $data->img_path ?>"></td>
					<td><a href="<?= base_url("dashboard/edit_user/{$data->id}") ?>" class="btn btn-info">Edit</a></td>
					<td>
						<?=
						form_open('dashboard/delete_user'),
						form_hidden('id', $data->id),
						form_submit('submit', 'Delete User', ['class' => 'button style1 large']),
						form_close();
						?>
					</td>
				</tr>
			<?php
			endforeach;
			?>
		</table>
		<nav aria-label="Page navigation example">
			<!-- <ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" href="#" tabindex="-1">Previous</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
			
				<li class="page-item">
					<a class="page-link" href="#">Next</a>
				</li>
			</ul> -->
			<?= $this->pagination->create_links(); ?>
		</nav>

		<!-- Image -->
		<!-- <a href="#" class="image featured">
			<img src="<?= base_url('images/pic01.jpg'); ?>" alt="" />
		</a> -->
	</div>
</section>
<?php $this->load->view('footer'); ?>

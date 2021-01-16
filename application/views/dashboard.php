<?php $this->load->view('header'); ?>
<!-- Main -->
<section id="main" class="wrapper style2">
	<div class="title">Dashboard</div>
	<div class="container">
		<table class="table table-bordered">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Password</th>
				<th>Options</th>
			</tr>

			<?php
			//var_dump($result);
			foreach ($result as $data) :
			?>
				<tr>
					<td><?= $data->id ?></td>
					<td><?= $data->name ?></td>
					<td><?= $data->password ?></td>
					<td><a href="<?= base_url("dashboard/edit_user/{$data->id}") ?>" class="btn btn-info">Edit</a></td>
					<td><a href="<?= base_url("dashboard/edit_user/{$data->id}") ?>" class="btn btn-danger">Del</a></td>
				</tr>
			<?php
			endforeach;
			?>
		</table>
		<!-- Image -->
		<!-- <a href="#" class="image featured">
			<img src="<?= base_url('images/pic01.jpg'); ?>" alt="" />
		</a> -->
	</div>
</section>
<?php $this->load->view('footer'); ?>

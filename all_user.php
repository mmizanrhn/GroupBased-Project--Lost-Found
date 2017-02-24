<?php include_once("header.php")?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">All User</h1>
			<ol class="breadcrumb">
				<li><a href="index.html">Home</a></li>
				<li class="active">All User</li>
			</ol>
		</div>
	</div>
</div>



<div class="container">
	<div class="row ">
		<?php include_once('side_menu.php')?>
		<div class="col-md-9">
			<div class="">
				<div class="panel-default border">
					<div class="panel-heading">All User</div>
					<div class="panel-body">
						<a class="btn btn-success marginbottom20"  href="profile_setting.php"><i class="glyphicon glyphicon-plus"></i>Acount Setting</a>
						<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Address</th>
								<th>Mobile</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>Sabuj Ahmed</td>
								<td>sabuj@gmail.com</td>
								<td>604 Agargaon Taltala Govt colony</td>
								<td>01915472727</td>
								<td><img src="images/500x300.png" width="60px"/> </td>
								<td class="center">

									<div class="dropdown">
										<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Go Action  <span class="caret"></span></button>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
											<li><a href="view.php"><i class="fa fa-eye"></i> View</a></li>
											<li><a href="edit_profile_seltting.php"><i class="fa fa-pencil"></i> Edit</a></li>
											<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-times"></i> Delete</a></li>
											<li><a href="#"><i class="fa fa-file-pdf-o"></i> Pdf</a></li>

										</ul>
									</div>
								</td>
							</tr>
							<tr>
								<td>Sabuj Ahmed</td>
								<td>sabuj@gmail.com</td>
								<td>604 Agargaon Taltala Govt colony</td>
								<td>01915472727</td>
								<td><img src="images/500x300.png" width="60px"/> </td>
								<td class="center">

									<div class="dropdown">
										<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Go Action  <span class="caret"></span></button>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
											<li><a href="#"><i class="fa fa-eye"></i> View</a></li>
											<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
											<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-times"></i> Delete</a></li>
											<li><a href="#"><i class="fa fa-file-pdf-o"></i> Pdf</a></li>

										</ul>
									</div>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>
</div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <br/>
        </div>
        <div class="modal-body">
          <p>Are You Shure?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include_once("footer.php")?>

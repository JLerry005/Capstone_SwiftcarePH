<?php
  include '../includes/connection.php';
  include '../includes/header.php';
 
?>

<style>
	.col-md-10{
		margin-bottom: 10px;
	}
</style>

<!-- modal for adding items -->
<div class="modal fade" id="list-item" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">List Product</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="col-md-12">
						<form id="item-form">
							<div class="col-md-2" style="margin-top: 1%;">
								<label>Description</label>
							</div>

							<div class="col-md-10">
								<input autocomplete="off" class="form-control" type="text" id="description">
							</div>

							<div class="col-md-2" style="margin-top: 1%;">
								<label>Price</label>
							</div>

							<div class="col-md-10">
								<input autocomplete="off" class="form-control" type="text" id="price">
							</div>

							<div class="col-md-2" style="margin-top: 1%;">
								<label>Quantity</label>
							</div>

							<div class="col-md-10">
								<input autocomplete="off" class="form-control" type="text" id="quantity">
							</div>

							<div class="col-md-2" style="margin-top: 1%;">
								<label>Type</label>
							</div>

							<div class="col-md-10">
								<input autocomplete="off" class="form-control" type="text" id="type">
							</div>

							<div class="col-md-2" style="margin-top: 1%;">
								<label>Location</label>
							</div>

							<div class="col-md-10">
								<textarea autocomplete="off" class="form-control" type="text" id="location">
								</textarea>
							</div>

							<div class="col-md-2" style="margin-top: 1%;">
								<label>Image</label>
							</div>

							<div class="col-md-10">
								<input autocomplete="off" class="form-control" type="file" id="files">
							</div>

						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="save_item()">Save</button>

				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<!-- end -->

<!-- modal for edit -->

<div class="modal fade" id="update-item" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Product</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="col-md-12">
						<form id="item-form">
							<input type="hidden" id="item_id">
							<div class="col-md-2" style="margin-top: 1%;">
								<label>Description</label>
							</div>

							<div class="col-md-10">
								<input autocomplete="off" class="form-control" type="text" id="e_description">
							</div>

							<div class="col-md-2" style="margin-top: 1%;">
								<label>Price</label>
							</div>

							<div class="col-md-10">
								<input autocomplete="off" class="form-control" type="text" id="e_price">
							</div>

							<div class="col-md-2" style="margin-top: 1%;">
								<label>Quantity</label>
							</div>

							<div class="col-md-10">
								<input autocomplete="off" class="form-control" type="text" id="e_quantity">
							</div>

							<div class="col-md-2" style="margin-top: 1%;">
								<label>Type</label>
							</div>

							<div class="col-md-10">
								<input autocomplete="off" class="form-control" type="text" id="e_type">
							</div>

							<div class="col-md-2" style="margin-top: 1%;">
								<label>Location</label>
							</div>

							<div class="col-md-10">
								<textarea autocomplete="off" class="form-control" type="text" id="e_location">
								</textarea>
							</div>

						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="update_item()">Update</button>

				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<!-- end -->

<div class="container-fluid">
	<button class="btn btn-info" data-toggle="modal" data-target="#list-item">List Item</button>
	<div class="panel panel-primary">
		<div class="panel-heading">Item List</div>
		<div class="panel-body">
			<div class="col-md-12">
				<div id="item-list">
					
				</div>
			</div>
		</div>
	</div>
</div>

<script>

	get_list_item();
	
	function save_item(){
		let form_data = new FormData();
		let file_data = "";
		if($("#files").val()) file_data = $("#files").prop("files")[0]
		form_data.append("files", file_data);

		form_data.append("description", $("#description").val());
		form_data.append("quantity", $("#quantity").val());
		form_data.append("price", $("#price").val());
		form_data.append("type", $("#type").val());
		form_data.append("location", $("#location").val());
		form_data.append("agenda", "list_item")
		
		$.ajax({
			url: "validate.php",
			type: "POST",
			contentType: false,
			processData: false,
			data: form_data,
			dataType: "json",
			success:function(response){
				alert(response.msg);
				$("#list-item").modal("toggle");
				get_list_item();
			}
		});
	}

	function update_item(){
		let form_data = new FormData();

		form_data.append("item_id", $("#item_id").val());
		form_data.append("description", $("#e_description").val());
		form_data.append("quantity", $("#e_quantity").val());
		form_data.append("price", $("#e_price").val());
		form_data.append("type", $("#e_type").val());
		form_data.append("location", $("#e_location").val());
		form_data.append("agenda", "update_item");
		
		$.ajax({
			url: "validate.php",
			type: "POST",
			contentType: false,
			processData: false,
			data: form_data,
			dataType: "json",
			success:function(response){
				alert(response.msg);
				$("#update-item").modal("toggle");
				get_list_item();
			}
		});
	}

	function get_list_item(){
		$.ajax({
			url: "validate.php",
			type: "POST",
			data: {agenda: "get_list"},
			success:function(response){
				$("#item-list").html(response);
			}
		});
	}

</script>
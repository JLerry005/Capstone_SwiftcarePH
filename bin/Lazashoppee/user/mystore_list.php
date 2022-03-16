<?php
  $itemc = new Items($conn);
  $list = $itemc->item_list();
?>

<style>
	.fill {
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    overflow: hidden
	}
</style>

<?php foreach($list as $row): ?>

	<div class="col-md-4" style="border: 0.5px solid black;">
		<h6>Name: <?= $row['description'] ?> </h6>
		<div class="col-md-12">
			<h6 class="col-md-6"> Price: <?= $row['price'] ?> </h6>
			<h6 class="col-md-6"> Quantity:<?= $row['quantity'] ?> </h6>
		</div>

		<div class="col-md-12">
			<h6 class="col-md-6">Type: <?= $row['type'] ?> </h6>
			<h6 class="col-md-6">Location: <?= $row['location'] ?> </h6>
		</div>

		<div class="col-md-12">
			<div class="container-fluid fill" style="width: 200px;height: 100px;align-items: left;">
				<img src="data:<?= $row['file_type'] ?>;base64, <?= $row['content'] ?>">
			</div>
		</div>

		<div class="col-md-12">
			<hr>
		</div>

		<div class="col-md-12" style="padding-bottom: 1%;">
			<div class="btn-group">
				<button class="btn btn-primary" onclick="edit_item('<?= $row['item_id'] ?>')"><i class="glyphicon glyphicon-edit"></i></button>

				<button class="btn btn-danger" onclick="delete_item('<?= $row['item_id'] ?>')"><i class="glyphicon glyphicon-trash"></i></button>
			</div>
		</div>

	</div>

<?php endforeach ?>

<script>
	
	function edit_item(item_id){
		$.ajax({
			url : "validate.php",
			type: "POST",
			data: {
				item_id: item_id,
				agenda: "edit_list"
			},
			dataType: "json",
			success:function(response){
				$("#update-item").modal("toggle");
				$("#e_description").val(response.description);
				$("#e_price").val(response.price);
				$("#e_type").val(response.type);
				$("#e_quantity").val(response.quantity);
				$("#e_location").val(response.location);
				$("#item_id").val(response.id);
			}
		});
	}

	function delete_item(item_id){

		let is_continue = confirm("Are you sure you want delete?");
		if(is_continue){
			$.ajax({
				url : "validate.php",
				type: "POST",
				data: {
					item_id: item_id,
					agenda: "delete_list"
				},
				dataType: "json",
				success:function(response){
					alert(response.msg);
					get_list_item();
				}
			});
		}
	}

</script>
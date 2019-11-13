$(document).ready(function(){

	$(document).on('click' , '.bn-edit' ,function(){
			var id = this.id;
			$.ajax({
				url: 'read.php',
				type: 'POST',
				dataType: 'JSON',
				data: {"id":id,"type":"single"},
				success:function(response){
					$("#edit-modal").modal('show');
					$('#edit-modal #title').val(response.title);
					$('#edit-modal #description').val(response.description);
					$('#edit-modal #url').val(response.url);
					$("#edit-modal #category").val(response.category);
					$("#edit-modal #id").val(id);
				}
			});
		});
	
	
	$(document).on('click' , '#update' ,function(){
			$.ajax({
					url: 'edit.php',
					type: 'POST',
					dataType: 'JSON',
					data: $("#frmEdit").serialize(),
					success:function(response){
						$("#messageModal").modal('show');
						$("#msg").html(response);
						$("#edit-modal").modal('hide');
						loadData();
					}
				});
		});
	
	$(document).on('click' , '.bn-delete' ,function(){
		if(confirm("Are you sure want to delete the record?")) {
			var id = this.id;
			$.ajax({
				url: 'delete.php',
				type: 'POST',
				dataType: 'JSON',
				data: {"id":id},
				success:function(response){
					loadData();
				}
			});
		}
	});

	$(document).on('click' , '.btn-add' ,function() {
		$( ".add-row" ).slideToggle( "slow", function() {
			// Animation complete.
		});
	});

});
	
function loadData() {
	$.ajax({
		url: 'read.php',
		type: 'POST',
		data: {"type":"all"},
		success:function(response){
			$("#container").html(response);
		}
	});
}
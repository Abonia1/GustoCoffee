$(document).ready(function() {
	$('.img-link').on('click', function(event) {
		event.preventDefault();
		var id = $(this).data('id');
		
		$.ajax({
	        url : "charger_surfaces_ajax",
	        type : "POST",
	        data : "id=" + id,
	        dataType: "html",
	        success: function(data) {
	        	$(data).appendTo('body').modal();
	        }
	    });
		
		//$("#modal").modal('show');
	});
});
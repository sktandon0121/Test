
$(document).ready(function(){
	$('#submit-req').click(function(e){submitRequest()});
});

function submitRequest(){
	var data = $('#submit-form').serializeArray();
	var submit_url = 'request.php';
	var html = '';
	// alert('hell');
	// console.log(data);
	if(data[2].value !=''){
		$.ajax({
			type:'POST',
			url : submit_url,
			data: data,
			success:function(result){
				result = JSON.parse(result);
				// console.log(result);
				if(result.status == 1){
					alert(result.data.message);
					html = '<tr><td>'+result.data.record.name+'</td><td>'+result.data.record.phone+'</td><td>'+result.data.record.email+'</td></tr>';
					$('tbody').append(html);
				}
			}
		});
	}	
}
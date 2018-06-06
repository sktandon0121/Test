
$(document).ready(function(){
	$('#submit-req').click(function(e){submitRequest()});
	$('body input.per-action').click(function(e){deleteRecord(e)});
	getTableData();
});

function submitRequest(){
	var data = $('#submit-form').serializeArray();
	var submit_url = 'request.php?action=submitData';
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
				$('#submit-form')[0].reset();
				if(result.status == 1){
					alert(result.data.message);
					html = '<tr><td><input type="radio" class="per-action" aria-label="Radio button for following text input"></td>	<td>'+result.data.record.name+'</td><td>'+result.data.record.phone+'</td><td>'+result.data.record.email+'</td></tr>';
					$('tbody').append(html);
				}else{
					alert(result.data.message);
				}
			}
		});
	}	
}


function getTableData(){
	var get_url = 'request.php?action=getData';
	$.get(get_url,function(data){
		$('tbody').append(data);
	});
}


function deleteRecord(el){
	alert();
	var action = $('#edit-del option:selected').val();
	if(action == 'Delete'){
		console.log(el);
	}
}
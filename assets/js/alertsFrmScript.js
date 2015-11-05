$('.clockpicker').clockpicker({
    donetext: 'Valider'
});

$(document).ready(function(){
	if($('.enable').hasClass('has-error')){
		$('.days-list').hide();
	}
});

$('.input-all').click(function(){
	if($(this).prop('checked')){
		$('.checkDay').each(function() {
			$(this).prop('checked', true);
		});
		console.log("Checked");
	}else{
		$('.checkDay').each(function() {
			$(this).prop('checked', false);
		});
		console.log("Unchecked");
	}
});
$('.checkDay').click(function(){
	if($('.input-all').prop('checked')){
		$('.input-all').prop('checked', false);
	}
});
$('.clockpicker-button').click(function (){
	if($('.input-all').prop('checked')){
		$('.checkDay').prop('value', $(this).prop('value'));
	}
});

$('.enableCheck').click(function(){
	$elt = $(this).parent().parent().parent();
	if ($elt.hasClass('has-error')){
		$elt.removeClass('has-error');
		$elt.addClass('has-success');
		$('.days-list').slideDown(300);
		$('#enabled').text('Activé');
	}else{
		$elt.removeClass('has-success');
		$elt.addClass('has-error');
		$('.days-list').slideUp(300);
		$('#enabled').text('Désactivé');
	}
});
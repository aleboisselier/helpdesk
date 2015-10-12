<div class="clearfix" style="margin-top:3%;"></div>
<div class="response"></div>
<script type="text/javascript">	
/*$(document).ready(function(){
	var jqxhr = $.ajax( "Faqs/index" )
  .done(function(data) {
    $('.response').html(data);
  })
  .fail(function(error) {
    $('.response').html(error);
  }); 
});*/
$(document).ready(function(){
	$.get("Faqs/index").done(function( data ){
		$('.response').html(data);
	});
});
</script>
</body>
</html>
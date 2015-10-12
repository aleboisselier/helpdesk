<div class="clearfix" style="margin-top:3%;"></div>

<script type="text/javascript">	
$(document).ready(function(){
	var jqxhr = $.ajax( "Faqs/index" )
  .done(function(data) {
    $('body').append(data);
  })
  .fail(function(error) {
    $('body').append("<div class='error'>"+error+"</div>");
  }); 
});
</script>
</body>
</html>
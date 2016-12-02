</div><br><br>
<!-- Footer -->
<footer class="text-center" id="footer" >&copy; Copyrigt 2013-2015 Shaunta's Boutique</footer>
	

<script>
	jQuery(window).scroll(function(){
		// Adds scroll animation to logo
		var vscroll = jQuery(this).scrollTop();
		jQuery('#logotext').css({
			"transform" : "translate(0px, "+vscroll/2+"px)"
		});

		// Adds scroll animation to blurry flower
		var vscroll = jQuery(this).scrollTop();
		jQuery('#back-flower').css({
			"transform" : "translate("+vscroll/5+"px, "+vscroll/12+"px)"
		});

		// Adds scroll animation to sharp flower
		var vscroll = jQuery(this).scrollTop();
		jQuery('#fore-flower').css({
			"transform" : "translate(0px, -"+vscroll/2+"px)"
		});
	});

	function detailsmodal(id){
		var data = {"id" : id};
		jQuery.ajax({
			url : '/clothEcommerce/includes/detailsmodal.php',
			method : "post",
			data : data,
			success : function(data){
				// Adds HTML from detailsmodal.php
				jQuery('body').append(data);
				// Opens and Closes that window using jQuery toggle 
				jQuery('#details-modal').modal('toggle');
			},
			error : function(){
				alert("something went wrong!");
			} 
		});
	}
</script>		
</body>
</html>
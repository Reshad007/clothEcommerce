</div><br><br>
<!-- Footer -->
<footer class="text-center" id="footer" >&copy; Copyrigt 2013-2015 Shaunta's Boutique</footer>

<script>
function updateSizes(){
	var sizeString = '';
	for (var i=1;i<=12;i++) {
	 if (jQuery('#size'+i).val() != '') {
	 	sizeString += jQuery('#size'+i).val()+':'+jQuery('#qty'+i).val()+',';
	 }
	}
	jQuery('#sizes').val(sizeString);
}

function get_child_options(){
	var parentID = jQuery('#parent').val();
	jQuery.ajax({
		url: '/clothEcommerce/admin/parsers/child_categories.php',
		type: 'POST',
		data: {parentID : parentID},
		success: function(data){
			jQuery('#child').html(data);
		},
		error: function(){alert("something went wrong with child options.")},
	});
}
	// LISTENER is listening for select parent to change, and when it changes we fire off get_child_options
	jQuery('select[name="parent"]').change(get_child_options);
</script>

</body>
</html>
<script type="text/javascript">
$(function() {
    $.bootstrapGrowl("<i class='fa fa-exclamation-triangle'></i> <?php echo $message; ?>", {
	  ele: 'body', // which element to append to
	  type: 'warning', // (null, 'info', 'danger', 'success')
	  offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
	  align: 'center', // ('left', 'right', or 'center')
	  width: 'integer', // (integer, or 'auto')
	  delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
	  allow_dismiss: false, // If true then will display a cross to close the popup.
	  stackup_spacing: 10 // spacing between consecutively stacked growls.
	});
});
</script>
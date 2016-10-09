<div class="row inner-spazio" style="" id="inner-caccia">
	<div class="col-lg-offset-2 col-lg-8">
		<button class="btn btn-lg btn-success" type="button" onclick="" id="caccia-btn" >Iscriviti!</button>
		<br><br>
		<img src="img/caccia/1.png" alt="sponsor" width="80%" height="" style="">
	</div>
</div>

<script>
$('#caccia-btn').bind('click', function(event) {
	$('#inner-caccia').load('include/moduli/caccia.php');
});
</script>
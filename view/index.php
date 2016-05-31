<?php
	$template = new template;
	echo $template->getHeader();
	echo $template->getSideMenu();
?>

			<p>Welcome to the admin panel, here you can manage your websites appearance and the website's functionalities.</p>

			</div>
		</div>
	</div>
</body>
<?php 
	echo $template->getFooter();

?>

<script type='text/javascript'>
	$('.side-menu div').hover(function(){
		$(this).addClass('highlight');
	}, function(){
		$(this).removeClass('highlight');
	});


	// SIDE MENIU
	$('.article').hover(function(){
		$('.add_article, .edit_article').css('display', 'block');
		$('.add_article, .edit_article').animate({
			height: '30px'
		});
	});

	$('.category').hover(function(){
		$('.add_category, .edit_category').css('display', 'block');
		$('.add_category, .edit_category').animate({
			height: '30px'
		});
	});

	
</script>

</hmtl>

<?php 
	$i = 0;
	while ( $i < $totalPages):
		$i += 1;
		if($i === $currentPage):
?>
			<span><?=$i?></span>
<?php   else : ?>	
			<a href="./?pg=<?=$i;?>"><?=$i?></a>
		<?php	
		endif;
	endwhile;
?>
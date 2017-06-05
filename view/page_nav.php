<div class="page-nav">
	<ul>
		<?php
			for($i = 1; $i <= $total_pages; $i++) {
				echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
			}
		?>

	</ul>
</div>

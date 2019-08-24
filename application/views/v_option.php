<select class="theme-input-style" name="jumlah">
	<option>Jumlah</option>
	<?php 
		for($i =1; $i <= $jumlah; $i++){
	?>
		<option value = "<?=$i?>"><?=$i?></option>
	<?php }?>
	<option value="100">100</option>
</select>

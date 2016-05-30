<form action="?page=registration" method="POST" >
	<center>

			<h1>Registreerimine</h1>
				<input type="text" name="username_reg" placeholder="Sisesta kasutajanimi"><br/>
				<input type="password" name="password_reg1" placeholder="Sisesta parool"><br/>
				<input type="password" name="password_reg2" placeholder="Korda parooli"><br/><br/>
				<input type="submit" value="REGISTREERI"/>
		
		<?php if (isset($errors)):?>
		<?php foreach($errors as $error):?>
			<div style="color:red;"><?php echo htmlspecialchars($error); ?></div>
		<?php endforeach;?>
	<?php endif;?>
	</center>
</form>
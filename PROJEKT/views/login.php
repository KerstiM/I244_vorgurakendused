
<div id="login">

	<center>
			<h1>Logi sisse</h1>
				<form action="?page=login" method="POST" >
					<input type="text" name="user" placeholder="Kasutajanimi"/><br/>
					<input type="password" name="pass" placeholder="Parool"/><br/><br/>
					<input type="submit" value="LOGI SISSE"/>
				</form>
				<?php if (isset($errors)):?>
					<?php foreach($errors as $error):?>
						<div style="color:red;"><?php echo htmlspecialchars($error); ?></div>
					<?php endforeach;?>
				<?php endif;?>
	</center>
</div>
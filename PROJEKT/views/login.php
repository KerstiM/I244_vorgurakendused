
<div id="login">

	
			<h1>Logi sisse</h1>
				<form action="?page=login" method="POST" >
					<input type="text" name="kasutajanimi" placeholder="Kasutajanimi"/><br/>
					<?php if (!empty($_POST["kasutajanimi"])) /*echo "value=\"".htmlspecialchars($_POST["kasutajanimi"])."\"";*/ ?>
					<input type="password" name="parool" placeholder="Parool"/><br/><br/>
					<input type="submit" value="LOGI SISSE"/>
				</form>
				<?php if (isset($errors)):?>
					<?php foreach($errors as $error):?>
						<div style="color:red;"><?php echo htmlspecialchars($error); ?></div>
					<?php endforeach;?>
				<?php endif;?>
	
</div>
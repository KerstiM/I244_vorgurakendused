	<h1>Broneeri</h1>	
			
			<div class="left">
				<h2>Meie mängukeskuses on teil võimalik valida kolme erineva sünnipäevatoa vahel. 
				Iga tuba on oma nägu ja tegu, mis tagab selle, et iga laps leiab 
				Lennumaalt oma lemmik toa, kus oma sünnipäeva pidada.</h2>
			
					<center>
					
					<form action="MAILTO:kerstim@gmail.com" method="post" enctype="text/plain">
							<input type="text" name="name" placeholder="Siseta oma nimi"><br>
							<input type="text" name="mail" placeholder="Siseta oma e-mail"><br>
							<textarea rows="5" name="message"  placeholder="Sõnum" cols="25"></textarea><br>
							<input type="submit" value="SAADA"></br>
							<input type="reset" value="PUHASTA">
						</form>
						
				<?php if (isset($errors)):?>
					<?php foreach($errors as $error):?>
						<div style="color:red;"><?php echo htmlspecialchars($error); ?></div>
					<?php endforeach;?>
				<?php endif;?>
					</center>
				
			</div>
			
			<div class="right">
				<p>Broneerimistasu on 30 eurot, mille palume tasuda 3 päeva jooksul peale broneeringu teostamist. 
				Broneerimistasu arvestatakse hiljem ürituse kogumaksumusest maha. Broneerimistasu palun kanda 
				<strong>Reds OÜ</strong> arveldusarvele <strong>EE597700771001082495</strong> märkides selgitusse sünnipäevalapse nimi, 
				ürituse toimumise kuupäev ja kellaaeg. Broneerimistasu makstes nõustub maksja Reds OÜ poolt 
				kehtestatud Sünnipäevapeo eeskirjaga. Broneerimistasu ei kuulu tagastamisele, 
				kui pidu ei toimu kliendist tulenevatel põhjustel. Küll aga on võimalik ühe aasta jooksul 
				valida endale uus sobiv aeg. Ülejäänud summa tuleb tasuda ürituse päeval kohapeal sularahas 
				või ettevõtte arveldusarvele hiljemalt 2 tööpäeva enne ürituse toimumist ja saata 
				maksekorralduse väljavõte aadressile <strong>info@lennumaa.ee.</strong><br>
				</p>
			</div>
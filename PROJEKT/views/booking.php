	<h1>Broneeri</h1>	
	<br>
			<div class="left">
					
					<form action="MAILTO:kerstim@gmail.com" method="post" enctype="text/plain">
							<input type="text" name="name" placeholder="Siseta oma nimi"><br>
							<input type="text" name="mail" placeholder="Siseta oma e-mail"><br>
							<textarea rows="5" name="message"  placeholder="Sõnum" cols="25"></textarea><br>
							<input type="submit" value="SAADA"><br/>
							<input type="reset" value="PUHASTA">
						</form>
						
				<?php if (isset($errors)):?>
					<?php foreach($errors as $error):?>
						<div style="color:red;"><?php echo htmlspecialchars($error); ?></div>
					<?php endforeach;?>
				<?php endif;?>
						
			</div>
			
			<div class="right">
				<p class="textBIG">Meie mängu&shy;keskuses on teil võimalik valida kolme erineva sünni&shy;päeva&shy;toa vahel. 
				Iga tuba on oma nägu ja tegu, mis tagab selle, et iga laps leiab 
				Lennu&shy;maalt oma lemmik toa, kus oma sünni&shy;päeva pidada.</p>
				
				<p class="textBIG">Broneerimis&shy;tasu on 30 eurot, mille palume tasuda 3 päeva jooksul peale broneeringu teos&shy;tamist. 
				Broneerimis&shy;tasu arves&shy;tatakse hiljem ürituse kogu&shy;maksumusest maha. Broneerimis&shy;tasu palun kanda 
				<strong>Reds OÜ</strong> arveldus&shy;arvele <strong>EE597700771001082495</strong> märkides selgitusse sünni&shy;päeva&shy;lapse nimi, 
				ürituse toimumise kuupäev ja kellaaeg. Broneerimis&shy;tasu makstes nõustub maksja Reds OÜ poolt 
				kehtestatud Sünni&shy;päevapeo ees&shy;kirjaga. Broneerimis&shy;tasu ei kuulu tagastamisele, 
				kui pidu ei toimu kliendist tulenevatel põhjustel. Küll aga on võimalik ühe aasta jooksul 
				valida endale uus sobiv aeg. Ülejäänud summa tuleb tasuda ürituse päeval kohapeal sula&shy;rahas 
				või ettevõtte arveldus&shy;arvele hiljemalt 2 tööpäeva enne ürituse toimumist ja saata 
				makse&shy;korralduse välja&shy;võte aadressile <strong>info@lennumaa.ee.</strong><br>
				</p>
			</div>
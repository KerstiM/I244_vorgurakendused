
		<h1>Broneeri</h1>	
			
			<div class="left">
				<h2>Meie mängukeskuses on teil võimalik valida kolme erineva sünnipäevatoa vahel. 
				Iga tuba on oma nägu ja tegu, mis tagab selle, et iga laps leiab 
				Lennumaalt oma lemmik toa, kus oma sünnipäeva pidada.</h2>
				
			<div class="small-wrapper">
					<center>
					<form action="views/booking.php" method="POST">
						<h5>Sünnipäevatuba</h5><br>
							<select name="tubavarkaks" form="tubavarkaks">
							  <option value="vali tuba">Vali tuba...</option>
							  <option value="pargituba">Pargituba</option>
							  <option value="allveelaevatuba">Allveelaevatuba</option>
							  <option value="õhulaev">Õhulaev</option>
							</select><br><br>
						<h5>Peo toimumisaeg</h5><br>
							<input type="date" name="kuu" placeholder="Kuupäev"><br><br>
							<select name="tubavarkaks" form="tubavarkaks">
							  <option value="vali aeg">Vali aeg...</option>
							  <option value="hommik">Hommik 09-12</option>
							  <option value="lõuna">Lõuna 12-15</option>
							  <option value="pärastlõuna">Pärastlõuna 15-18</option>
							  <option value="õhtu">Õhtu 18-21</option>
							</select><br><br>		  			
							<input type="number" name="lastearv" placeholder="Laste arv" min="1" max="50"><br><br>			
							<input type="email" name="e_mail" placeholder="E-mail"><br><br>		
							<input type="tel" name="telefoni_number" placeholder="Telefoni number"><br><br>
							<input type="text" name="kommentaarid" placeholder="Kommentaarid"><br><br>
			
							<input type="submit" value="Saada!"><br><br>
					</form>
					</center>
				
			</div>
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
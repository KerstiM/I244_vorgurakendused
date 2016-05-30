//Loo tabel
CREATE TABLE KerstiM_loomaaed (
id integer primary key auto_increment,
nimi varchar(100),
vanus integer,
liik varchar(100),
puur integer
);

//Siseta loomad, nii et mõni loom jagaks puuri, et oleks mitu ühest liigist
INSERT INTO KerstiM_loomaaed (id, nimi, vanus, liik, puur) VALUES 
('1', 'villu', '2', 'metskass', '10')
('2', 'kalle', '15', 'ninasarvik', '11')
('3', 'palle', '5', 'öökull', '12')
('4', 'rulle', '1', 'metssiga', '13')
('5', 'malle', '20', 'elevant', '14')
 ('6', 'sille', '10', 'kaamel', '14')
 ('7', 'pille', '4', 'metskass', '15')

//Hankida kõigi mingis ühes kindlas puuris elavate loomade nimi ja puuri number
SELECT nimi, puur FROM `KerstiM_loomaaed` WHERE puur = 14;

//Hankida vanima ja noorima looma vanused
SELECT max(vanus) as vanim, min(vanus) as noorim FROM `KerstiM_loomaaed`;

//Hankida puuri number koos selles elavate loomade arvuga (vihjeks: group by ja count )
SELECT puur, count(*) as loomad_puuris FROM `KerstiM_loomaaed` group by puur;

//Suurendada kõiki tabelis olevaid vanuseid 1 aasta võrra
UPDATE `KerstiM_loomaaed` SET `vanus`= vanus + 1;

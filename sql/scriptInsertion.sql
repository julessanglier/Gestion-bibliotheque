INSERT INTO bibliotheque2.`user` (mail,pass) VALUES
('admin@bib-orleans.com','21232f297a57a5a743894a0e4a801fc3');


INSERT INTO bibliotheque2.a_pour_categorie (idLivre,idCategorie) VALUES
('5ece4797eaf5e',6),
('601f33f68b55b',6),
('601f34bd71b53',6),
('601f34cd7ca78',6),
('601f45bd49a78',6);


INSERT INTO bibliotheque2.adherent (nomAdh,prenomAdh,rueAdh,villeAdh,cpAdh,mailAdh) VALUES
('Sanglier','Jules','5 rue du bois jolie','Olivet',45160,'jules.sanglier@protonmail.com');


INSERT INTO bibliotheque2.auteur (nomAuteur,prenomAuteur) VALUES
('Roveli','Carlo'),
('Damour','Thibault');

INSERT INTO bibliotheque2.categorie (nomCategorie) VALUES
('Tech'),
('Physics');

INSERT INTO bibliotheque2.ecrit_par (idLivre,idAuteur) VALUES
('5ece4797eaf5e',211),
('5ece4797eaf5e',212),
('601f45bd49a78',211);


INSERT INTO bibliotheque2.edite_par (idLivre,idEditeur) VALUES
('5ece4797eaf5e',1),
('601f45bd49a78',2);



INSERT INTO bibliotheque2.editeur (nomEditeur) VALUES
('Wiley'),
('Penguin'),
('HarperCollins'),
('Springer'),
('Orient Blackswan'),
('CRC'),
('Apress'),
('Random House'),
('Bodley Head'),
('MIT Press');
INSERT INTO bibliotheque2.editeur (nomEditeur) VALUES
('O''Reilly'),
('BBC'),
('Elsevier'),
('Pearson'),
('Prentice Hall');


INSERT INTO bibliotheque2.emprunts (idLivre,idAdh,dateDebut,dateFin) VALUES
 ('5ece4797eaf5e',1,'2021-01-02','2021-02-20');


INSERT INTO bibliotheque2.livre (idLivre,titreLivre) VALUES
	 ('5ece4797eaf5e','Theorem of Everything'),
	 ('601f45bd49a78','Dragons eat wraps');

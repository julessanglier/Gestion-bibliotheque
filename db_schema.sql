CREATE DATABASE `bibliotheque` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

-- bibliotheque.adherent definition

CREATE TABLE `adherent` (
  `idAdh` varchar(5) DEFAULT NULL,
  `nomAdh` varchar(100) DEFAULT NULL,
  `prenomAdh` varchar(100) DEFAULT NULL,
  `rueAdh` varchar(100) DEFAULT NULL,
  `villeAdh` varchar(100) DEFAULT NULL,
  `cpAdh` int(11) DEFAULT NULL,
  `mailAdh` varchar(100) DEFAULT NULL,
  UNIQUE KEY `adherent_idAdh_IDX` (`idAdh`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- bibliotheque.auteur definition

CREATE TABLE `auteur` (
  `idAuteur` varchar(5) DEFAULT NULL,
  `nomAuteur` varchar(100) DEFAULT NULL,
  `prenomAuteur` varchar(100) DEFAULT NULL,
  UNIQUE KEY `auteur_idAuteur_IDX` (`idAuteur`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- bibliotheque.collection definition

CREATE TABLE `collection` (
  `idCollection` varchar(5) DEFAULT NULL,
  `nomCollection` varchar(100) DEFAULT NULL,
  `idEditeur` varchar(5) DEFAULT NULL,
  UNIQUE KEY `collection_idCollection_IDX` (`idCollection`) USING BTREE,
  KEY `collection_FK` (`idEditeur`),
  CONSTRAINT `collection_FK` FOREIGN KEY (`idEditeur`) REFERENCES `editeur` (`idEditeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- bibliotheque.ecrit_par definition

CREATE TABLE `ecrit_par` (
  `idLivre` varchar(5) DEFAULT NULL,
  `idAuteur` varchar(5) DEFAULT NULL,
  KEY `ecrit_par_FK` (`idLivre`),
  KEY `ecrit_par_FK_1` (`idAuteur`),
  CONSTRAINT `ecrit_par_FK` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`),
  CONSTRAINT `ecrit_par_FK_1` FOREIGN KEY (`idAuteur`) REFERENCES `auteur` (`idAuteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- bibliotheque.editeur definition

CREATE TABLE `editeur` (
  `idEditeur` varchar(5) DEFAULT NULL,
  `nomEditeur` varchar(100) DEFAULT NULL,
  UNIQUE KEY `editeur_idEditeur_IDX` (`idEditeur`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- bibliotheque.emprunts definition

CREATE TABLE `emprunts` (
  `idLivre` varchar(5) DEFAULT NULL,
  `idAdh` varchar(5) DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  UNIQUE KEY `emprunts_idLivre_IDX` (`idLivre`,`idAdh`) USING BTREE,
  KEY `emprunts_FK_1` (`idAdh`),
  CONSTRAINT `emprunts_FK` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`),
  CONSTRAINT `emprunts_FK_1` FOREIGN KEY (`idAdh`) REFERENCES `adherent` (`idAdh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- bibliotheque.livre definition

CREATE TABLE `livre` (
  `idLivre` varchar(10) DEFAULT NULL,
  `titreLivre` varchar(100) DEFAULT NULL,
  `idCollection` varchar(100) DEFAULT NULL,
  UNIQUE KEY `livre_idLivre_IDX` (`idLivre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

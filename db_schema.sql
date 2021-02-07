CREATE DATABASE `bibliotheque2`; /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */


-- bibliotheque2.adherent definition

CREATE TABLE `adherent` (
  `idAdh` int NOT NULL AUTO_INCREMENT,
  `nomAdh` varchar(100) DEFAULT NULL,
  `prenomAdh` varchar(100) DEFAULT NULL,
  `rueAdh` varchar(100) DEFAULT NULL,
  `villeAdh` varchar(100) DEFAULT NULL,
  `cpAdh` int DEFAULT NULL,
  `mailAdh` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idAdh`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- bibliotheque2.auteur definition

CREATE TABLE `auteur` (
  `idAuteur` int NOT NULL AUTO_INCREMENT,
  `nomAuteur` varchar(100) DEFAULT NULL,
  `prenomAuteur` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idAuteur`)
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- bibliotheque2.categorie definition

CREATE TABLE `categorie` (
  `idCategorie` int NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- bibliotheque2.livre definition

CREATE TABLE `livre` (
  `idLivre` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `titreLivre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- bibliotheque2.ecrit_par definition

CREATE TABLE `ecrit_par` (
  `idLivre` varchar(13) DEFAULT NULL,
  `idAuteur` int DEFAULT NULL,
  UNIQUE KEY `ecrit_par_UN` (`idLivre`,`idAuteur`),
  KEY `ecrit_par_FK_1` (`idAuteur`),
  CONSTRAINT `ecrit_par_FK` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ecrit_par_FK_1` FOREIGN KEY (`idAuteur`) REFERENCES `auteur` (`idAuteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- bibliotheque2.editeur definition

CREATE TABLE `editeur` (
  `idEditeur` int NOT NULL AUTO_INCREMENT,
  `nomEditeur` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idEditeur`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- bibliotheque2.emprunts definition

CREATE TABLE `emprunts` (
  `idLivre` varchar(13) DEFAULT NULL,
  `idAdh` int DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  KEY `emprunts_FK_1` (`idAdh`),
  KEY `emprunts_FK` (`idLivre`),
  CONSTRAINT `emprunts_FK` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `emprunts_FK_1` FOREIGN KEY (`idAdh`) REFERENCES `adherent` (`idAdh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- bibliotheque2.a_pour_categorie definition

CREATE TABLE `a_pour_categorie` (
  `idLivre` varchar(13) DEFAULT NULL,
  `idCategorie` int DEFAULT NULL,
  UNIQUE KEY `a_pour_categorie_UN` (`idLivre`,`idCategorie`),
  KEY `a_pour_categorie_FK_1` (`idCategorie`),
  CONSTRAINT `a_pour_categorie_FK` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `a_pour_categorie_FK_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- bibliotheque2.edite_par definition

CREATE TABLE `edite_par` (
  `idLivre` varchar(13) DEFAULT NULL,
  `idEditeur` int DEFAULT NULL,
  UNIQUE KEY `edite_par_UN` (`idLivre`,`idEditeur`),
  KEY `edite_par_FK_1` (`idEditeur`),
  CONSTRAINT `edite_par_FK` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `edite_par_FK_1` FOREIGN KEY (`idEditeur`) REFERENCES `editeur` (`idEditeur`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- bibliotheque2.`user` definition

CREATE TABLE `user` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

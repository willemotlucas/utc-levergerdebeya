--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  id int(11) NOT NULL AUTO_INCREMENT,
  email varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  nom varchar(50) NOT NULL,
  prenom varchar(50) NOT NULL,
  date_naissance datetime,
  tel_portable int(15) NOT NULL,
  tel_domicile int(15),
  adresse varchar(50),
  compl_adresse varchar(50),
  code_postal int(10),
  ville varchar(50),
  date_creatrion datetime NOT NULL,
  type ENUM('normalUser','admin') NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

insert into utilisateur (email, password, nom, prenom, date_naissance, tel_portable, tel_domicile, adresse, code_postal, ville, date_creatrion, type) values ('alaeddine.hajjem@etu.utc.fr', 'rootroot', 'hajjem', 'alaedddine', '1994-05-10', '0607080901', '0102030405', '12 rue de toto', 60200, "Compiegne",'2016-05-03', 'admin');
insert into utilisateur (email, password, nom, prenom, date_naissance, tel_portable, tel_domicile, adresse, code_postal, ville, date_creatrion, type) values ('lucas.willemot@etu.utc.fr', 'rootroot', 'willemot', 'lucas', '1994-04-30', '0708090102', '0203040506', '19 rue de toto', 60200, "Compiegne",'2016-05-03',  'admin');
insert into utilisateur (email, password, nom, prenom, date_naissance, tel_portable, tel_domicile, adresse, code_postal, ville, date_creatrion, type) values ('sample.sample@etu.utc.fr', 'samplesample' ,'sample', 'sample', '2000-01-01', '0708090102', '0203040506', '19 rue de toto', 60200, "Compiegne",'2016-05-03',  'normalUser');

-- --------------------------------------------------------
--
-- Table structure for table `ville_livraison`
--

DROP TABLE IF EXISTS `ville_livraison`;
CREATE TABLE IF NOT EXISTS `ville_livraison` (
  id int(11) NOT NULL AUTO_INCREMENT,
  code_postal int(15) NOT NULL,
  ville varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

insert into ville_livraison values (1, 78350, 'Jouy-en-Josas');
insert into ville_livraison values (2, 78140, 'Velizy-Villacoublay');
insert into ville_livraison values (3, 78000, 'Versailles');
insert into ville_livraison values (4, 92410, "Ville D'avray");
insert into ville_livraison values (5, 92210, 'Saint-Cloud');

-- --------------------------------------------------------
--
-- Table structure for table `adresse_livraison`
--
DROP TABLE IF EXISTS `adresse_livraison`;
CREATE TABLE IF NOT EXISTS `adresse_livraison` (
  id int(11) NOT NULL AUTO_INCREMENT,
  adresse varchar(50) NOT NULL,
  complement_adresse varchar(50) NOT NULL,
  ville_livraison_id int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (ville_livraison_id) REFERENCES Ville_livraison(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------
--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  id int(11) NOT NULL AUTO_INCREMENT,
  date_commande datetime NOT NULL,
  date_livraison datetime NOT NULL,
  type ENUM('drive', 'livraison') NOT NULL,
  utilisateur_id int(15) NOT NULL,
  adresse_livraison_id int(15),
  PRIMARY KEY (`id`),
  FOREIGN KEY (utilisateur_id) references Utilisateur(id),
  FOREIGN KEY (adresse_livraison_id) references Adresse_livraison(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------
--
-- Table structure for table `famille`
--
DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  id int(11) NOT NULL AUTO_INCREMENT,
  denomination varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

insert into famille values (1, "Fruit");
insert into famille values (2, "Legumes");

-- --------------------------------------------------------
--
-- Table structure for table `categorie`
--
DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  id int(11) NOT NULL AUTO_INCREMENT,
  denomination varchar(50) NOT NULL,
  famille_id int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (famille_id) references famille(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

insert into categorie values (1, "Agrumes", 1);
insert into categorie values (2, "Tubercules", 2);

-- --------------------------------------------------------
--
-- Table structure for table `produit`
--
DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  id int(11) NOT NULL AUTO_INCREMENT,
  denomination varchar(50) NOT NULL,
  origine varchar(50),
  prix int(10),
  typeVente ENUM('piece', 'kg'),
  description text,
  produit_du_moment int(1),
  produit_phare int(1),
  image varchar(50),
  categorie_id int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (categorie_id) references categorie(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
--
-- Table structure for table `produit_commande`
--
DROP TABLE IF EXISTS `produit_commande`;
CREATE TABLE IF NOT EXISTS `produit_commande` (
  id int(11) NOT NULL AUTO_INCREMENT,
  produit_id int(11) NOT NULL,
  commande_id int(11) NOT NULL,
  quantite int(10) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (commande_id) references commande(id),
  FOREIGN KEY (produit_id) references produit(id),
  UNIQUE(commande_id, produit_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
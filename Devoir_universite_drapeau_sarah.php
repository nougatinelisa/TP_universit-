<?php 

class Personne
{
	/*Attributs*/
	protected $nom;
	protected $prenom;
	protected $adresse;
	protected $age;
	
	/*Méthode construct*/
	public function __construct($n,$p,$a,$ag)
	{
	$this->nom=$n;
	$this->prenom=$p;
	$this->adresse=$a;
	$this->age=$ag;
	}

	/*Liste de setters*/
	public function setNom($n)
	{
	$this->nom=$n;
	}
	public function setPrenom($p)
	{
	$this->prenom=$p;
	}
	public function setAdresse($a)
	{
	$this->adresse=$a;
	}
	public function setAge($ag)
	{
	$this->age=$ag;
	}

	/*Liste de getters*/
	public function getNom()
	{
	return $this->nom;
	}
	public function getPrenom()
	{
	return $this->prenom;
	}
	public function getAdresse()
	{
	return $this->adresse;
	}
	public function getAge()
	{
	return $this->age;
	}

	/*Méthode __tostring*/
	public function __toString()
	{
	return "Nom: $this->nom..... Prenom: $this->prenom..... Adresse: $this->adresse..... Age: $this->age";
	}
}

class Etudiant extends Personne
{
	/*Liste d'attributs*/
	private $_coeffFamilial;
	private $_fraisInscri;
	private $_UFRInscri;
	private $_ville;
	private $_identifiant;
	private static $_ID=0;

	/*Méthode construct*/
	public function __construct($n, $p, $a, $ag, $coeff, $ufr, $ville)
	{
	parent::__construct($n, $p, $a, $ag);
	$this->_coeffFamilial=$coeff;

	/*Tableau des frais de scolarité par rapport au coefficient familial*/
		if ($coeff>0 and $coeff<=12620)
			{$frais="0 euros";}
		if ($coeff>12620 and $coeff<=13190)
			{$frais="100 euros";}
		if ($coeff>13190 and $coeff<=15640)
			{$frais="125 euros";}
		if ($coeff>15640 and $coeff<=24740)
			{$frais="189 euros";}
		if ($coeff>24740 and $coeff<=31810)
			{$frais="233.25 euros";}
		if ($coeff>31810 and $coeff<=39970)
			{$frais="275.60 euros";}
		if ($coeff>39970 and $coeff<=48360)
			{$frais="432.15 euros";}
		if ($coeff>48360 and $coeff<=55790)
			{$frais="560.40 euros";}
		if ($coeff>55790 and $coeff<=92970)
			{$frais="789.60 euros";}
		if ($coeff>92970 and $coeff<=127860)
			{$frais="1325 euros";}
		if ($coeff>127860 and $coeff<=151250)
			{$frais="1698.50 euros";}
		if ($coeff>151250 and $coeff<=172040)
			{$frais="2796 euros";}
		if ($coeff>172040 and $coeff<=195000)
			{$frais="3845.90 euros";}
		if ($coeff>195000)
			{$frais="12589 euros";}

	$this->_fraisInscri=$frais;
	$this->_UFRInscri=$ufr;
	$this->_ville=$ville;
	$this->_identifiant=++self::$_ID;
	}

	/*Liste des setters*/
	public function setUFR($ufr)
	{
	$this->_UFRInscri=$ufr;
	}

	public function setVille($ville)
	{
	$this->_ville=$ville;
	}

	/*getter*/
	public function get($nom)
	{
	return $this->$nom;
	}

	/*Méthode __tostring*/
	public function __toString()
	{
	return parent::__toString()."..... Coefficient Familial: $this->_coeffFamilial..... Frais d'inscription selon le coeff: $this->_fraisInscri..... UFR: $this->_UFRInscri..... Université: $this->_ville..... ID: $this->_identifiant.";
	}
}

class Professeur extends Personne
{
	/*Liste des attributs*/
	private $_salaire;
	private $_UFRInscri;
	private $_ville;
	private $_identifiant;
	private static $_ID=0;

	/*Méthode construct*/
	public function __construct($n, $p, $a, $ag, $salaire, $ufr, $ville)
	{
	parent::__construct($n, $p, $a, $ag);
	$this->_salaire=$salaire;
	$this->_UFRInscri=$ufr;
	$this->_ville=$ville;
	$this->_identifiant=++self::$_ID;
	}

	/*Liste des setters*/
	public function setSalaire($salaire)
	{
	$this->_salaire=$salaire;
	}

	public function setUFR($ufr)
	{
	$this->_UFRInscri=$ufr;
	}

	public function setVille($ville)
	{
	$this->_ville=$ville;
	}

	/*getter*/
	public function get($nom)
	{
	return $this->$nom;
	}

	/*Méthode __tostring*/
	public function __toString()
	{
	return parent::__toString()."..... Salaire: $this->_salaire..... UFR: $this->_UFRInscri..... Université: $this->_ville..... ID: $this->_identifiant.";
	}
}

class Cours
{
	/*Liste des attributs*/
	private $_nom;
	private $_UFR;
	private static $_ID=0;
	private $_identifiant;
	private $_professeur;
	private $_eleves;

	/*Méthode construct*/
	public function __construct($nom, $ufr, $prof, $eleves)
	{
	$this->_nom=$nom;
	$this->_UFR=$ufr;
	$this->_professeur=$prof;
	$this->_eleves=$eleves;
	$this->_identifiant=++self::$_ID;
	}

	/*Liste de setters*/
	public function setNom($nom)
	{
	$this->_nom=$nom;
	}

	public function setUFR($ufr)
	{
	$this->_UFR=$ufr;
	}

	/*getter*/
	public function get($nom)
	{
	$this->$nom;
	}

	/*Méthode __tostring*/
	public function __toString()
	{
	return "Nom du cours: $this->_nom..... UFR: $this->_UFR..... ID: $this->_identifiant<br>Professeur responsable du cours:<br>$this->_professeur<br> Eleve(s) participant(s) aux cours:<br>$this->_eleves";
	}
}
/*Enregistrement des étudiants*/
$etudiant1= new Etudiant("Abel","Adam","10 allée des mimosas", "22 ans", "25000", "UFR de langues et cultures étrangères", "NTE");
$etudiant2= new Etudiant("Charpentier","Olivia","20 rue des coquelicots", "22 ans", "17030", "UFR de langues et cultures étrangères", "NTE");
$etudiant3= new Etudiant("Guerin","Benoît","30 impasse des cerisiers", "20 ans", "6000", "UFR d’histoire", "SNZ");
$etudiant4= new Etudiant("Lambert","Julien","40 voie des acacias", "21 ans", "40500", "UFR de médecine et techniques médicales", "SNZ");
$etudiant5= new Etudiant("Millet","Julie","50 place des charpentiers", "19 ans", "100000", "UFR de droit et de sciences politiques", "REN");

/*Affichage des étudiants*/
echo "<h3>Liste des élèves:</h3><br>";
echo $etudiant1."<br>";
echo $etudiant2."<br>";
echo $etudiant3."<br>";
echo $etudiant4."<br>";
echo $etudiant5."<br><br>";

/*Enregistrement des professeurs*/
$professeur1= new Professeur("Anselme", "Serge", "10 place du marché", "35", "2000 euros", "UFR de langues et cultures étrangères", "NTE");
$professeur2= new Professeur("Legrand", "Robert", "20 rue des citrons", "37", "1800euros", "UFR de langues et cultures étrangères", "NTE");
$professeur3= new Professeur("Meunier", "Claire", "30 impasse du verger", "29", "1950 euros", "UFR d’histoire", "SNZ");
$professeur4= new Professeur("Royer", "Alice", "40 allée de la plage", "40", "2100 euros", "UFR de médecine et techniques médicales", "SNZ");
$professeur5= new Professeur("Sanchez", "Sophie", "50 voie des cocotiers", "45", "2200 euros", "UFR de droit et de sciences politiques", "REN");

/*Affichage des professeurs*/
echo "<h3>Liste des professeurs:</h3><br>";
echo $professeur1."<br>";
echo $professeur1."<br>";
echo $professeur1."<br>";
echo $professeur1."<br>";
echo $professeur1."<br><br>";

/*On met la liste des étudiants et des professeurs dans des tableaux*/
$TabEtudiants=[$etudiant1, $etudiant2, $etudiant3, $etudiant4, $etudiant5];
$TabProfesseurs=[$professeur1, $professeur2, $professeur3, $professeur4, $professeur5];

/*Enregistrement des cours*/
$cours1= new Cours("Traduction-thème", "UFR lettres et langue", "$TabProfesseurs[0]", "$TabEtudiants[0]<br>$TabEtudiants[1]");
$cours2= new Cours("Traduction-version", "UFR lettres et langue", "$TabProfesseurs[1]", "$TabEtudiants[0]<br>$TabEtudiants[1]");
$cours3= new Cours("Histoire Médiévale", "UFR d’histoire", "$TabProfesseurs[2]", "$TabEtudiants[2]");
$cours4= new Cours("Cardiologie", "UFR de médecine et techniques médicales", "$TabProfesseurs[3]", "$TabEtudiants[3]");
$cours5= new Cours("Droit des affaires", "UFR de droit et de sciences politiques", "$TabProfesseurs[4]", "$TabEtudiants[4]");

/*Affichage des cours*/
echo "<h3>Liste des cours et leur participants:</h3><br>";
echo $cours1."<br><br>";
echo $cours2."<br><br>";
echo $cours3."<br><br>";
echo $cours4."<br><br>";
echo $cours5."<br><br>";
?>
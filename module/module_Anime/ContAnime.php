<?php

require_once('ModeleAnime.php');
require_once('VueAnime.php');

class ContAnime{

	private $modele;
	private $vue;

	public function __construct(){
		$this->modele = new ModeleAnime();
		$this->vue = new VueAnime();
	}

	public function detailAnime($id){
		$this->modele->updateNoteG($id,$this->modele->noteGenerale($id));

		$this->vue->afficheAnime($this->modele->getAnime($id),$this->modele->getGenre($id),$this->modele->getCommentaire($id),$this->modele->getListe($id),$this->modele->VerifAnimeDansListe($id));
	}
    
    public function insererCommentaire($idAnime){
	    if(!isset($_SESSION['idUtilisateur'])){
	        echo "vous devez être connecter pour inserer un commentaire.";
	    }
	    else {
	    	$this->modele->insertionCommentaire($idAnime);
	    	$this->detailAnime($idAnime);
	    }
    }

    public function supprimerCommentaire($idCo,$idAnime){
    	$this->modele->suppressionCommentaire($idCo,$idAnime);
    }

    public function InsertionAnime(){
    	$this->vue->result($this->modele->insertAnime());
	}

	public function AjoutAnime(){
		$this->vue->formulaireAnime();
	}

	public function SuppresionAnime($idAnime){
		$this->vue->result($this->modele->suppressionAnime($idAnime));
	}
	public function modifLaNote($id){
		$this->modele->modifNote($id);
		$this->detailAnime($id);


	}

	public function modifEtat($id){
		$this->modele->modifLEtat($id);
		$this->detailAnime($id);

	}

	public function modifAnime($id){
		$this->vue->formulaireUpdateAnime($id);
	}

	public function modifAnimeEnCours($id){
		$this->modele->updateAnime($id);
	}
}

?>
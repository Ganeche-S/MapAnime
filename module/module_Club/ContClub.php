<?php
require_once('ModeleClub.php');
require_once('VueClub.php');

class ContClub{

	private $modele;
	private $vue;

	public function __construct(){
		$this->modele = new ModeleClub();
		$this->vue = new VueClub();
	}

	public function addClub($id) {
/*		if(isset($_SESSION['idUtilisateur'])){
			if($this->modele->adherentDansUnAutreClub() == FALSE) {*/
		        $this->vue->result($this->modele->rejoindreClub($id));
		        $this->modele->incrementNbUtilisateur($id);
/*	    	}
	    	else {
	    		echo 'Vous êtes deja adherent dans un autre Club';
	    	}
	    }
	    else {
	    	echo "Vous devez être connecter pour rejoindre ce club.";
	    }*/
	}

		public function removeClub($id) {
/*		if(!isset($_SESSION['idUtilisateur'])){
			echo 'Vous devez être connecter pour quitter ce club';
	    }
	    else {
	    	if($this->modele->dejaAdherentDuClub($id) == TRUE) {*/
		    	$this->vue->result($this->modele->quitterClub($id));
		        $this->modele->decrementNbUtilisateur($id);
/*	    	}
	    	else {
	    		echo 'Vous devez être adherent pour quitter ce club';
	    	}
	    }*/
	}
    
    public function insererCommentaire($id){
/*	    if(isset($_SESSION['idUtilisateur'])){
	    	if($this->modele->dejaAdherentDuClub($id) == TRUE) {*/
	        	$this->vue->result($this->modele->posterCommentaire($id));
/*	   		}
	    }
	    else {
	    	echo "Vous devez être adherent pour poster un message.";
	    }*/
    }

    public function supprimerCommentaire($id){
    	$this->vue->result($this->modele->retirerCommentaire($id));
    }

    public function detailClub($id) {
		$this->vue->afficheCommentaire($this->modele->getCommentaire($id));
		$this->vue->afficheButtonRejoindre();
		$this->vue->afficheButtonQuitter();
		$this->vue->afficheNbAdherent($this->modele->getNbAdherent($id));

	}
}

?>
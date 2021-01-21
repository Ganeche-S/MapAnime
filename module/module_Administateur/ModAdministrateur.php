<?php
if(!defined('CONST_INCLUDE'))die('Accès direct interdit');
require_once('ContAdministrateur.php');

class ModAdministrateur{

	private $controleur;

	public function __construct(){
		$this->controleur = new ContAdministrateur();
		if(isset($_SESSION['idUtilisateur']) && $_SESSION['Admin']==1){
			if( isset($_GET['action']) ){
				$choix=htmlspecialchars($_GET['action']);
				switch($choix){
					case "":
						$idAmi=htmlspecialchars($_GET['id']);
                        $this->controleur->supprimerListeAmi($idAmi);
					break;
					default:
					?>
						<script type="text/javascript"> 
        					alert("Action Inexistante"); 
 		 				</script>
 		 			<?php
					break;
				}
			}
		}
		else{
		?>
			<script type="text/javascript"> 
       			alert("Non Connecter"); 
 		 	</script>
 		<?php
		}
	}
}

$modAdministrateur = new ModAdministrateur();

?>
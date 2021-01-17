<?php
if(!defined('CONST_INCLUDE'))die('Accès direct interdit');
include_once('./VueIndex.php');

class VueAmi extends VueIndex{

	public function __construct(){
        echo '<link rel="stylesheet" type="text/css" href="module/module_Ami/VueAmi.css"/>';
    }

    public function affichageDuProfilAmi($arrayAnime, $infoProfil){
    	echo "<h1>profil de ".$infoProfil['0']['pseudo']." : </h1>";
        echo '<h2>Liste d\'anime</h2>';
        if ($arrayAnime){
            echo "<div>";
    			foreach ($arrayAnime as $anime) {
    				echo "<a href=\"index.php?module=Anime&action=Anime&id=".$anime['idAnime']."\">".$anime['nom']."</a>";
				    echo '</br>';
    			}
    		echo "</div>";
        }
        else{
			echo "La liste de votre ami est vide.";
		}
    }
}
?>
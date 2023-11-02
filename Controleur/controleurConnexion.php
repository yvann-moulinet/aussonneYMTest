<?php
switch ($action)
			{
				case "Verification":
					$_SESSION['role'] = $_POST['role'];
					$_SESSION['login'] = $_POST['login'];
					$_SESSION['pwd']= $_POST['pwd'];
					$vue = new vueCentraleConnexion();
					$liste = $this->maBD->afficheListeSelect();
					$existe=$this->maBD->verifExistance($_SESSION['role'],$_SESSION['login'],$_SESSION['pwd']);
					$vue->AfficherMenuContextuel($_SESSION['role'],$existe,$liste);				
					break;
				case "Deconnexion" :
					session_destroy();
					$vue=new vueCentraleConnexion();
					$vue->afficheMenuInternaute();
					break;
				
			}
?>
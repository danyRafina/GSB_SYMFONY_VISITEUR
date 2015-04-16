<?php

namespace Ahe\gsbBundle\Controller;

require_once("include/fct.inc.php");
//require_once("include/class.pdogsb.inc.php");

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Component\HttpFoundation\Request ;

class FraisVisiteursController extends Controller {

    public function consulterFraisAction() {
        $session = $this->getRequest()->getSession();
        $idVisiteur = $session->get('id');
        // Récupérer l'entité avec Doctrine - 
        // $repository contiendra tous les enregistrements de la table FicheFrais
        $repository = $this->getDoctrine()->getManager()
                ->getRepository('AheGsbBundle:FicheFrais');

        // Fonction définie dans VisiteurRepository.php
        $listeMois = $repository->getLesMoisDisponibles($idVisiteur);
        if ($listeMois === null) { // Il n'y a aucun enregistrement 
            $this->get('session')->getFlashBag()
                    ->add('Warning', 'Aucune fiche de frais à consulter');
            return render('AheGsbBundle:Visiteurs:accueilVisiteur.html.twig');
        } else {  // Il y a au moins une fiche de frais
            if ($this->getRequest()->getMethod() == 'POST') {
                // Traitement du formulaire 
                //$pdo = PdoGsb::getPdoGsb();
                $request = $this->get('request');
                $session = $request->getSession();
                $idVisiteur = $session->get('id');
                $leMois = $request->get('lastMois');
                $lesFraisForfait = $this->getLesFraisForfait($idVisiteur, $leMois);
                /* $req = "select FraisForfait.id as idFrais, FraisForfait.libelle as libelle, 
                  LigneFraisForfait.quantite as quantite from LigneFraisForfait inner join FraisForfait
                  on FraisForfait.id = LigneFraisForfait.idFraisForfait
                  where LigneFraisForfait.idVisiteur = ? and LigneFraisForfait.mois= ?
                  order by LigneFraisForfait.idFraisForfait";
                  //$rsm = new ResultSetMapping($this->getDoctrine()->getManager());
                  /*$repository = $this->getDoctrine()->getManager()
                  ->getRepository('AheGsbBundle:LigneFraisForfait') ; */
                /* $co = $this->getDoctrine()->getConnection();
                  $stmt = $co->prepare($req);
                  $stmt->execute(array($idVisiteur,$leMois));
                  $result = $stmt->fetchAll(); */
                //$query = $this->getDoctrine()->getManager()->createNativeQuery("select FraisForfait.id as idFrais, FraisForfait.libelle as libelle, LigneFraisForfait.quantite as quantite from LigneFraisForfait inner join FraisForfait on FraisForfait.id = LigneFraisForfait.idFraisForfait where LigneFraisForfait.idVisiteur = 'a131' and LigneFraisForfait.mois = 201408 order by LigneFraisForfait.idFraisForfait",$rsm);
                //$query = $this->getDoctrine()->getManager()->createNativeQuery("select FraisForfait.id as idFrais from FraisForfait",$rsm);
                //$result = $repository->findBy(array('idVisiteur'=>$idVisiteur),array('mois'=>$leMois));
                ////$query->setParameter('vis', $idVisiteur);
                //$query->setParameter('mois',$leMois);
                $c = $this->getDoctrine()->getConnection();
                $query = "SELECT * FROM LigneFraisHorsForfait where mois = ?";
                $stmt = $c->prepare($query);
                $stmt->execute(array($leMois));
                $result = $stmt->fetchAll();
                $numAnnee = substr($leMois, 0, 4);
                $numMois = substr($leMois, 4, 2);
                $session->set('leMois', $numMois);
                return $this->render('AheGsbBundle:Visiteurs:consultationFraisForfait.html.twig', array('leMois' => $leMois, 'lesFraisForfait' => $lesFraisForfait,
                            'numAnnee' => $numAnnee, 'numMois' => $numMois,'fhf'=>$result
                ));
            }
            return $this->render('AheGsbBundle:Visiteurs:selectFraisMois.html.twig', array('listeMois' => $listeMois));
        }
    }

    public function saisirFicheFraisAction() {
        $session = $this->get('request')->getSession();
        $idVisiteur = $session->get('id');
        $mois = getMois(date("d/m/Y"));
        $numAnnee = substr($mois, 0, 4);
        $numMois = substr($mois, 4, 2);
        if ($this->estPremierFraisMois($idVisiteur, $mois)) {
            $this->creerNouvellesLignesFrais($idVisiteur, $mois);
        }
         $form = $this->createFormBuilder()
                ->add('libelle','text',array('label'=>'Libellé : '))
                ->add('date','date' ,array('label'=>'Date : '))
                 ->add('montant','number',array('label'=>'Montant :'))
                ->getForm();
         $request1 = Request::createFromGlobals();
        $request = $this->get('request');
        $lesErreursForfait = array();
        if ($this->get('request')->getMethod() == 'POST' && $form->handleRequest($request1)->isValid()) {
            $lesFrais = $request->request->get('lesFrais');
            $libelle = $form['libelle']->getData();
            $date = $form['date']->getData();
            $montant = $form['montant']->getData();
            $this->creerNouveauFraisHorsForfait($idVisiteur,$mois,$libelle, $date, $montant);
            if (lesQteFraisValides($lesFrais)) {
                $this->majFraisForfait($idVisiteur, $mois, $lesFrais);
            } else {
                $lesErreursForfait[] = "Les valeurs des frais doivent être 
                    numériques";
            }
            return $this->redirect($this->generateUrl('gsb_saisie_frais_type'));
        }
        $lesFraisForfait = $this->getLesFraisForfait($idVisiteur, $mois);
         $c = $this->getDoctrine()->getConnection();
         $query = "SELECT * FROM LigneFraisHorsForfait where idVisiteur = ?";
         $stmt = $c->prepare($query);
         $stmt->execute(array($idVisiteur));
         $result = $stmt->fetchAll();
        return $this->render('AheGsbBundle:Visiteurs:saisieFicheFrais.html.twig', array('lesFraisForfait' => $lesFraisForfait,
                    'nom' => $session->get('nom'), 'prenom' => $session->get('prenom'),
                    'numMois' => $numMois,
                    'numAnnee' => $numAnnee, 'lesErreursForfait' => $lesErreursForfait,'form'=>$form->createView(),'fhf'=>$result));
    }

    public function supFHFAction($id) {
        return new \Symfony\Component\HttpFoundation\Response('ada');
    }
    public function modFHFAction($id) {
        return new \Symfony\Component\HttpFoundation\Response('ada');
    }
    public function accueilVisiteursAction() {
        return $this->render('AheGsbBundle:Visiteurs:accueilVisiteur.html.twig');
    }

    public function consulterFraisTypeAction() {
        return $this->render('AheGsbBundle:Visiteurs:typeFrais.html.twig');
    }

    public function saisirFraisTypeAction() {
        return $this->render('AheGsbBundle:Visiteurs:typeFraisSaisie.html.twig');
    }

    public function majFraisForfait($idVisiteur, $mois, $lesFrais) {
        $lesCles = array_keys($lesFrais);
        $co = $this->getDoctrine()->getConnection();
        foreach ($lesCles as $unIdFrais) {
            $qte = $lesFrais[$unIdFrais];
            $req = "update LigneFraisForfait set LigneFraisForfait.quantite = ?
			where LigneFraisForfait.idVisiteur = ? and LigneFraisForfait.mois = ?
			and LigneFraisForfait.idFraisForfait = ? ";
            $stmt = $co->prepare($req);
            $stmt->execute(array($qte, $idVisiteur, $mois, $unIdFrais));
        }
    }

    /**
     * Teste si un visiteur possède une fiche de frais pour le mois passé en argument

     * @param $idVisiteur 
     * @param $mois sous la forme aaaamm
     * @return vrai ou faux 
     */
    public function estPremierFraisMois($idVisiteur, $mois) {
        $co = $this->getDoctrine()->getConnection();
        $ok = false;
        $req = "select count(*) as nbLignesFrais from FicheFrais 
		where FicheFrais.mois = ? and FicheFrais.idVisiteur = ? ";
        $stmt = $co->prepare($req);
        $stmt->execute(array($mois, $idVisiteur));
        $laLigne = $stmt->fetch();
        if ($laLigne['nbLignesFrais'] == 0) {
            $ok = true;
        }
        return $ok;
    }

    /**
     * Retourne les informations d'une fiche de frais d'un visiteur pour un mois donné

     * @param $idVisiteur 
     * @param $mois sous la forme aaaamm
     * @return un tableau avec des champs de jointure entre une fiche de frais et la ligne d'état 
     */
    public function getLesInfosFicheFrais($idVisiteur, $mois) {
        $repo = $this->getDoctrine()->getManager()->getRepository('AheGsbBundle:FicheFrais');
        $result = $repo->findOneBy(array('idvisiteur' => $idVisiteur, 'mois' => $mois));
       
        /* $req = "select FicheFrais.idEtat as idEtat, FicheFrais.dateModif as dateModif, FicheFrais.nbJustificatifs as nbJustificatifs, 
          FicheFrais.montantValide as montantValide, Etat.libelle as libEtat from  FicheFrais inner join Etat on FicheFrais.idEtat = Etat.id
          where FicheFrais.idVisiteur ='$idVisiteur' and FicheFrais.mois = '$mois'";
          $res = PdoGsb::$monPdo->query($req);
          $laLigne = $res->fetch(); */
        return $result;
    }

    
    	
/**
 * Crée un nouveau frais hors forfait pour un visiteur un mois donné
 * à partir des informations fournies en paramètre
 
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 * @param $libelle : le libelle du frais
 * @param $date : la date du frais au format français jj//mm/aaaa
 * @param $montant : le montant
*/
	public function creerNouveauFraisHorsForfait($idVisiteur,$mois,$libelle,$date,$montant){
		//$dateFr = dateFrancaisVersAnglais($date);
             $repository = $this->getDoctrine()->getManager()
                ->getRepository('AheGsbBundle:FicheFrais');
             $idVisiteurFicheFrais = $repository->findOneBy(array('idvisiteur'=>$this->getVisiteur($idVisiteur),'mois'=>$mois));
            echo count($idVisiteurFicheFrais)." ".$idVisiteurFicheFrais->getMontantvalide();
                $em = $this->getDoctrine()->getManager();
                $object = new \Ahe\gsbBundle\Entity\LigneFraisHorsForfait();
                $object->setIdVisiteur($idVisiteurFicheFrais);
                       $object->setLibelle($libelle)
                        ->setMontant($montant)
                        ->setDate($date);
                $em->persist($object);
                $em->flush();
	}
    /**
     * Crée une nouvelle fiche de frais et les lignes de frais au forfait pour un 
     * visiteur et un mois donnés
     * récupère le dernier mois en cours de traitement, met à 'CL' son champs idEtat, crée une nouvelle fiche de frais
     * avec un idEtat à 'CR' et crée les lignes de frais forfait de quantités nulles 
     * @param $idVisiteur 
     * @param $mois sous la forme aaaamm
     */
    public function creerNouvellesLignesFrais($idVisiteur, $mois) {
        $dernierMois = $this->dernierMoisSaisi($idVisiteur);
        $object = $this->getLesInfosFicheFrais($idVisiteur,$dernierMois);
        if ($object->getIdetat() == 'CR') {
            $this->majEtatFicheFrais($object, 'CL');
        }
        $ficheFrais = new \Ahe\gsbBundle\Entity\FicheFrais();
        $ficheFrais->setIdvisiteur($this->getVisiteur($idVisiteur))
                ->setIdetat($this->getEtat('CR'))
                ->setDatemodif(new \DateTime())
                ->setMois($mois)
                ->setMontantvalide(0)
                ->setNbjustificatifs(0);
        $em = $this->getDoctrine()->getManager();
        $em->persist($ficheFrais);
        $em->flush();


        /* $req = "insert into FicheFrais(idVisiteur,mois,nbJustificatifs,montantValide,dateModif,idEtat) 
          values('$idVisiteur','$mois',0,0,now(),'CR')";
          PdoGsb::$monPdo->exec($req); */
        $lesIdFrais = $this->getLesIdFrais();
        foreach ($lesIdFrais as $uneLigneIdFrais) {
            $unIdFrais = $uneLigneIdFrais->getId();

            $req = "insert into LigneFraisForfait(idVisiteur,mois,
                                            idFraisForfait,quantite) 
                                values(?,?,?,0)";
            $co = $this->getDoctrine()->getConnection();
            $stmt = $co->prepare($req);
            $stmt->execute(array($idVisiteur, $mois, $unIdFrais));
        }
    }

    /**
     * Retourne tous les id de la table FraisForfait

     * @return un tableau associatif 
     */
    public function getLesIdFrais() {
        $repo = $this->getDoctrine()->getManager()->getRepository('AheGsbBundle:FraisForfait');
        $result = $repo->findAll();
        return $result;
        /* $req = "select FraisForfait.id as idFrais from FraisForfait order by FraisForfait.id";
          $res = PdoGsb::$monPdo->query($req);
          $lesLignes = $res->fetchAll();
          return $lesLignes; */
    }

    private function getVisiteur($idVisiteur) {
        $repo = $this->getDoctrine()->getManager()->getRepository('AheGsbBundle:Visiteur');
        $result = $repo->findOneBy(array('id' => $idVisiteur));
        return $result;
    }
    
      private function getEtat($idEtat) {
        $repo = $this->getDoctrine()->getManager()->getRepository('AheGsbBundle:Etat');
        $result = $repo->findOneBy(array('id' => $idEtat));
        return $result;
    }

    /**
     * Modifie l'état et la date de modification d'une fiche de frais
     * Modifie le champ idEtat et met la date de modif à aujourd'hui
     * @param $object 
     * @param $etat
     */
    public function majEtatFicheFrais($object, $etat) {
        $object->setIdEtat($etat);
        $object->setDateModif(now());
        $em = $this->getDoctrine()->getManager();
        $em->persist($object);
        $em->flush();
    }

    /**
     * Retourne le dernier mois en cours d'un visiteur

     * @param $idVisiteur 
     * @return le mois sous la forme aaaamm
     */
    public function dernierMoisSaisi($idVisiteur) {
        $co = $this->getDoctrine()->getConnection();
        $req = "select max(mois) as dernierMois from FicheFrais where FicheFrais.idVisiteur = ? ";
        $res = $co->prepare($req);
        $res->execute(array($idVisiteur));
        $laLigne = $res->fetch();
        $dernierMois = $laLigne['dernierMois'];
        return $dernierMois;
    }

    
    public function getLesFraisForfait($idVisiteur, $leMois) {
        $req = "select FraisForfait.id as idFrais, FraisForfait.libelle as libelle, 
		LigneFraisForfait.quantite as quantite from LigneFraisForfait inner join FraisForfait 
		on FraisForfait.id = LigneFraisForfait.idFraisForfait
		where LigneFraisForfait.idVisiteur = ? and LigneFraisForfait.mois= ?
		order by LigneFraisForfait.idFraisForfait";
        $co = $this->getDoctrine()->getConnection();
        $stmt = $co->prepare($req);
        $stmt->execute(array($idVisiteur,$leMois));
        $result = $stmt->fetchAll();
       
        return $result;
    }

}

?>
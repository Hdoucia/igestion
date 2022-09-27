<?php

class Database 
{
    private $host = "mysql:dbname=croisette";
    private $user = "hdoucia";
    private $pswd = "";

    private function getconnexion()
    {
        try{
            return new PDO($this->host, $this->user, $this->pswd);
        }catch(PDOException $e) {
            die('Erreur:' . $e->getMessage());
        }
    }
    /**
     *Commande
     */
    public function create(string $N_Commande, string $Date_Commande, int $Montant, string $Fournisseur, string $Statut, string $Utilisateur )
    {
        
        $q = $this->getconnexion()->prepare("INSERT INTO commande (N_Commande, Date_Commande, Montant, Fournisseur, Statut, Utilisateur) VALUES (:N_Commande, :Date_Commande, :Montant, :Fournisseur, :Statut, :Utilisateur)");
        return $q->execute([
            'N_Commande' => $N_Commande,
            'Date_Commande' => $Date_Commande,
            'Montant' => $Montant,
            'Fournisseur' => $Fournisseur,
            'Statut' => $Statut,
            'Utilisateur' => $Utilisateur

        ]);
    }

    public function createdc(string $N_Commande, $Désignation,$Quantité)
    {
        

        $q = $this->getconnexion()->prepare("INSERT INTO detailles_commande (DCM, RCM, QCM) VALUES (:N_Commande, :Désignation, :Quantité)");
        return $q->execute([
            'N_Commande' => $N_Commande,
            'Désignation' => $Désignation,
            'Quantité' => $Quantité,
        ]);
    }
    

    public function readCommande()
    {

        return $this->getconnexion()->query("SELECT * FROM commande ORDER BY id ")->fetchAll(PDO::FETCH_OBJ);
        
    }
    public function readCommandeEA()
    {

        return $this->getconnexion()->query("SELECT * FROM commande WHERE Statut = 'Attente de validation' ORDER BY id ")->fetchAll(PDO::FETCH_OBJ);
        
    }
    public function readCommandeV()
    {

        return $this->getconnexion()->query("SELECT * FROM commande WHERE Statut = 'Validée' ORDER BY id ")->fetchAll(PDO::FETCH_OBJ);
        
    }
    public function readCommandeR()
    {

        return $this->getconnexion()->query("SELECT * FROM commande WHERE Statut = 'Rejetée' ORDER BY id ")->fetchAll(PDO::FETCH_OBJ);
        
    }

    public function countBills(): int 
    {
        return (int)$this->getconnexion()->query( "SELECT COUNT(id) as count FROM commande")->fetch()[0];
    }
    public function countBillsEA(): int 
    {
        return (int)$this->getconnexion()->query( "SELECT COUNT(id) as count FROM commande WHERE Statut = 'Attente de validation' ")->fetch()[0];
    }
    public function countBillsR(): int 
    {
        return (int)$this->getconnexion()->query( "SELECT COUNT(id) as count FROM commande WHERE Statut = 'Rejetée'")->fetch()[0];
    }
    public function countBillsV(): int 
    {
        return (int)$this->getconnexion()->query( "SELECT COUNT(id) as count FROM commande WHERE Statut = 'Validée' ")->fetch()[0];
    }

    public function getSingleBill(int $id) 
    {
        $q = $this->getconnexion()->prepare("SELECT * FROM commande WHERE id = :id");
        $q->execute(['id' =>  $id]);
        return $q->fetch(PDO::FETCH_OBJ);
    }
    public function getSingleBillCommande(int $id) 
    {
        $q = $this->getconnexion()->prepare("SELECT * FROM etat_entrer WHERE id = :id");
        $q->execute(['id' =>  $id]);
        return $q->fetchAll(PDO::FETCH_OBJ);
    }
    public function ValidationCommande(int $id) 
    {
        $q = $this->getconnexion()->prepare("UPDATE  commande SET Statut = 'Validée' WHERE id = :id");
        $q->execute(['id' =>  $id]);
        return $q->fetch(PDO::FETCH_OBJ);
    }
    public function RejetéeCommande(int $id) 
    {
        $q = $this->getconnexion()->prepare("UPDATE  commande SET Statut = 'Rejetée' WHERE id = :id");
        $q->execute(['id' =>  $id]);
        return $q->fetch(PDO::FETCH_OBJ);
    }
    public function Update(int $id,string $N_Commande, string $Date_Commande, int $Montant, string $Fournisseur, string $Statut, string $Utilisateur ) 
    
    {

         $q = $this->getconnexion()->prepare("UPDATE commande SET N_Commande = :N_Commande, Date_Commande = :Date_Commande, Montant = :Montant, Fournisseur = :Fournisseur, Statut = :Statut, Utilisateur = :Utilisateur WHERE id = :id");
       return $q->execute ([
        'N_Commande' => $N_Commande,
        'Date_Commande' => $Date_Commande,
        'Montant' => $Montant,
        'Fournisseur' => $Fournisseur,
        'Statut' => $Statut,
        'Utilisateur' => $Utilisateur,
        'id' => $id,
       ]); 
       
    }

   public function delete(int $id): bool

   {
        $q =  $this->getconnexion()->prepare("DELETE FROM commande WHERE id = :id");
        return $q->execute(['id' => $id]);

   }
    /**
     * Commande Fin 
    */

    /**
     * Client
     */
   public function createCC( int $Matricule , string $Nom_Prénom, string $Statut, string $Téléphone, string $Commentaire , string $Utilisateur )
   {
       
       $q = $this->getconnexion()->prepare("INSERT INTO client (Matricule, Nom_Prénom, Statut, Téléphone, Commentaire, Utilisateur) VALUES (:Matricule, :Nom_Prénom, :Statut, :Téléphone, :Commentaire, :Utilisateur)");
       return $q->execute([
           'Matricule' => $Matricule,
           'Nom_Prénom' => $Nom_Prénom,
           'Statut' => $Statut,
           'Téléphone' => $Téléphone,
           'Commentaire' => $Commentaire,
           'Utilisateur' => $Utilisateur,
       ]);
   }


   public function readClient()
   {

       return $this->getconnexion()->query("SELECT * FROM client ORDER BY id")->fetchAll(PDO::FETCH_OBJ);
       
   }

   public function countBillsClient(): int 
   {
       return (int)$this->getconnexion()->query( "SELECT COUNT(id) as count FROM client")->fetch()[0];
       
   }

   public function getSingleBillClient(int $id) 
   {
       $q = $this->getconnexion()->prepare("SELECT * FROM client WHERE id = :id");
       $q->execute(['id' =>  $id]);
       return $q->fetch(PDO::FETCH_OBJ);
   }
   public function UpdateCC( int $id,int $Matricule , string $Nom_Prénom, string $Statut, string $Téléphone, string $Commentaire , string $Utilisateur  ) 
    
   {

        $q = $this->getconnexion()->prepare("UPDATE client SET Matricule = :Matricule, Nom_Prénom = :Nom_Prénom, Statut = :Statut, Téléphone = :Téléphone, Commentaire = :Commentaire, Utilisateur = :Utilisateur WHERE id = :id");
      return $q->execute ([
       'Matricule' => $Matricule,
       'Nom_Prénom' => $Nom_Prénom,
       'Statut' => $Statut,
       'Téléphone' => $Téléphone,
       'Commentaire' => $Commentaire,
       'Utilisateur' => $Utilisateur,
       'id' => $id,
      ]); 
      
   }

   public function deleteCC(int $id): bool

   {
        $q =  $this->getconnexion()->prepare("DELETE FROM client WHERE id = :id");
        return $q->execute(['id' => $id]);

   }
    /**
     * Client Fin
    */



   /**
    * Fournisseur
    */
   public function FournisseurCreate(string $Raison_Sociale , string $Adresse, int $Boite_Postale, string $Email, string $Téléphone , string $Téléphone_fixe, string $Commentaire, string $Utilisateur )
   {
       
       $q = $this->getconnexion()->prepare("INSERT INTO fournisseur (Raison_Sociale, Adresse, Boite_Postale, Ville, Email, Téléphone, Téléphone_fixe, Commentaire, Utilisateur) VALUES (:Raison_Sociale, :Adresse, :Boite_Postale, :Ville, :Email, :Téléphone, :Téléphone_fixe, :Commentaire, :Utilisateur)");
       return $q->execute([
           'Raison_Sociale' => $Raison_Sociale,
           'Adresse' => $Adresse,
           'Boite_Postale' => $Boite_Postale,
           'Email' => $Email,
           'Téléphone' => $Téléphone,
           'Téléphone_fixe' => $Téléphone_fixe,
           'Commentaire' => $Commentaire,
           'Utilisateur' => $Utilisateur,
       ]);
   }


   public function readFournisseur()
   {

       return $this->getconnexion()->query("SELECT * FROM fournisseur ORDER BY id")->fetchAll(PDO::FETCH_OBJ);
       
   }

   public function countBillsFournisseur(): int 
   {
       return (int)$this->getconnexion()->query( "SELECT COUNT(Raison_Sociale) as count FROM fournisseur")->fetch()[0];
       
   }

   public function getSingleBillFournisseur(int $id) 
   {
       $q = $this->getconnexion()->prepare("SELECT * FROM fournisseur WHERE id = :id");
       $q->execute(['id' =>  $id]);
       return $q->fetch(PDO::FETCH_OBJ);
   }
   public function UpdateFournisseur( string $Raison_Sociale , string $Adresse, string $Boite_Postale, string $Emaill, string $Téléphone , string $Téléphone_fixe, string $Commentaire, string $Utilisateur )
    
   {

        $q = $this->getconnexion()->prepare("UPDATE fournisseur SET Raison_Sociale = :Raison_Sociale, Adresse = :Adresse, Boite_Postale = :Boite_Postale, Ville = :Ville, Email = :Email, Téléphone = :Téléphone, Téléphone_fixe = :Téléphone_fixe, Commentaire = :Commentaire, Utilisateur = :Utilisateur WHERE id = :id");
      return $q->execute ([
        'Raison_Sociale' => $Raison_Sociale,
        'Adresse' => $Adresse,
        'Boite_Postale' => $Boite_Postale,
        'Email' => $Emaill,
        'Téléphone' => $Téléphone,
        'Téléphone_fixe' => $Téléphone_fixe,
        'Commentaire' => $Commentaire,
        'Utilisateur' => $Utilisateur,
      ]); 
      
   }

   public function deleteFournisseur(int $id): bool

   {
        $q =  $this->getconnexion()->prepare("DELETE FROM fournisseur WHERE id = :id");
        return $q->execute(['id' => $id]);

   }
   /**
    * Fournisseur Fin
    */



   /**
    * Vente
    */
       public function VenteCreate(string $Raison_Sociale , string $Adresse, int $Boite_Postale, string $Email, string $Téléphone , string $Téléphone_fixe, string $Commentaire, string $Utilisateur )
{
    
    $q = $this->getconnexion()->prepare("INSERT INTO Vente (Raison_Sociale, Adresse, Boite_Postale, Ville, Email, Téléphone, Téléphone_fixe, Commentaire, Utilisateur) VALUES (:Raison_Sociale, :Adresse, :Boite_Postale, :Ville, :Email, :Téléphone, :Téléphone_fixe, :Commentaire, :Utilisateur)");
    return $q->execute([
        'Raison_Sociale' => $Raison_Sociale,
        'Adresse' => $Adresse,
        'Boite_Postale' => $Boite_Postale,
        'Email' => $Email,
        'Téléphone' => $Téléphone,
        'Téléphone_fixe' => $Téléphone_fixe,
        'Commentaire' => $Commentaire,
        'Utilisateur' => $Utilisateur,
    ]);
        }


        public function readVente()
        {

            return $this->getconnexion()->query("SELECT * FROM vente ORDER BY id")->fetchAll(PDO::FETCH_OBJ);
            
        }

        public function countBillsVente(): int 
        {
            return (int)$this->getconnexion()->query( "SELECT COUNT(id) as count FROM vente")->fetch()[0];
            
        }

        public function getSingleBillVente(int $id) 
        {
            $q = $this->getconnexion()->prepare("SELECT * FROM vente WHERE id = :id");
            $q->execute(['id' =>  $id]);
            return $q->fetch(PDO::FETCH_OBJ);
        }

        
        public function deleteVente(int $id): bool

        {
            $q =  $this->getconnexion()->prepare("DELETE FROM Vente WHERE id = :id");
            return $q->execute(['id' => $id]);

        }
        /**
         * Vente Fin*
         */


        /**
         * Article
         */
        public function ArticleCrea(string $Référence_Produit, string $Désignation, string $Descri, string $Famille, string $Conditionnement , int $Stock_Alerte, int $Prix_d_Achat, int $Prix_Vente, string $Statut, string $Utilisateur )
       {
        
        $q = $this->getconnexion()->prepare("INSERT INTO articles (Référence_Produit, Désignation, Descri, Famille, Conditionnement, Stock_Alerte, Prix_d_Achat, Prix_Vente, Statut, Utilisateur) VALUES (:Référence_Produit, :Désignation, :Descri, :Famille, :Conditionnement, :Stock_Alerte, :Prix_d_Achat, :Prix_Vente, :Statut, :Utilisateur)");
        return $q->execute([
            'Référence_Produit' => $Référence_Produit,
            'Désignation' => $Désignation,
            'Descri' => $Descri,
            'Famille' => $Famille,
            'Conditionnement' => $Conditionnement,
            'Stock_Alerte' => $Stock_Alerte,
            'Prix_d_Achat' => $Prix_d_Achat,
            'Prix_Vente' => $Prix_Vente,
            'Statut' => $Statut,
            'Utilisateur' => $Utilisateur

         ]);
       }
        public function readArticle()
        {

            return $this->getconnexion()->query("SELECT * FROM articles ORDER BY id")->fetchAll(PDO::FETCH_OBJ);
            
        }

        public function countBillsArticle(): int 
        {
            return (int)$this->getconnexion()->query( "SELECT COUNT(id) as count FROM articles")->fetch()[0];
            
        }

        public function getSingleBillArticle(int $id) 
        {
            $q = $this->getconnexion()->prepare("SELECT * FROM articles WHERE id = :id");
            $q->execute(['id' =>  $id]);
            return $q->fetch(PDO::FETCH_OBJ);
        }
        public function UpdateArticle( string $Raison_Sociale , string $Adresse, string $Boite_Postale, string $Emaill, string $Téléphone , string $Téléphone_fixe, string $Commentaire, string $Utilisateur )
        
        {

            $q = $this->getconnexion()->prepare("UPDATE articles SET Raison_Sociale = :Raison_Sociale, Adresse = :Adresse, Boite_Postale = :Boite_Postale, Ville = :Ville, Email = :Email, Téléphone = :Téléphone, Téléphone_fixe = :Téléphone_fixe, Commentaire = :Commentaire, Utilisateur = :Utilisateur WHERE id = :id");
        return $q->execute ([
            'Raison_Sociale' => $Raison_Sociale,
            'Adresse' => $Adresse,
            'Boite_Postale' => $Boite_Postale,
            'Email' => $Emaill,
            'Téléphone' => $Téléphone,
            'Téléphone_fixe' => $Téléphone_fixe,
            'Commentaire' => $Commentaire,
            'Utilisateur' => $Utilisateur
        ]); 
        
        }

        public function deleteArticle(int $id): bool

        {
            $q =  $this->getconnexion()->prepare("DELETE FROM articles WHERE id = :id");
            return $q->execute(['id' => $id]);

        }
        public function Critique()
        {
            return $this->getconnexion()->query("SELECT * FROM article_critique")->fetchAll(PDO::FETCH_OBJ);    
        }
        public function countBillsCritique(): int 
        {
            return (int)$this->getconnexion()->query("SELECT COUNT(Référence_Produit) as count FROM article_critique")->fetch()[0];
            
        }
        public function ArticleCommande()
        {
            return $this->getconnexion()->query("SELECT * FROM article_en_commande")->fetchAll(PDO::FETCH_OBJ);    
        }
        public function countBillsArticleCommande(): int 
        {
            return (int)$this->getconnexion()->query("SELECT COUNT(Référence_Produit) as count FROM article_en_commande")->fetch()[0];
            
        }
        /**
         * Article Fin
         */

        /**
         * entrer_view
         */

    public function readetat_entrer()
    {

        return $this->getconnexion()->query("SELECT * FROM `ent` WHERE En_Commande > 0 ORDER BY N_Commande")->fetchAll(PDO::FETCH_OBJ);
        
    }

    public function countBillsetat_entrer(): int 
    {
        return (int)$this->getconnexion()->query( "SELECT COUNT(N_Commande) as count FROM etat_entrer")->fetch()[0];
    }

    public function getSingleBilletat_entrer(string $id)
    {
         $q =  $this->getconnexion()->query("SELECT * FROM `etat_entrer` WHERE id = :id");
         $q->execute([
            'id' =>  $id
        ]);
         return $q->fetch(PDO::FETCH_OBJ);
    }

   /**
    * entrer_view Fin
    */
    /**
     * Caisee
     */

        public function readCaisse()
        {
    
            return $this->getconnexion()->query("SELECT * FROM caisse_etat ")->fetchAll(PDO::FETCH_OBJ);
            
        }
    
        public function countBillsCaisse(): int 
        {
            return (int)$this->getconnexion()->query( "SELECT COUNT(*) as count FROM caisse_etat")->fetch()[0];
        }

        public function readOperations()
        {
    
            return $this->getconnexion()->query("SELECT id, Date ,Motifs, if(Nature_Mouvement = 'Encaissement',Montant,0) as 'Encaissement',if(Nature_Mouvement = 'Décaissement',Montant,0) as 'Décaissement', Commentaire FROM mouvement_caisse")->fetchAll(PDO::FETCH_OBJ);
            
        }
    
        public function countBillsOperations(): int 
        {
            return (int)$this->getconnexion()->query( "SELECT COUNT(*) as count FROM mouvement_caisse")->fetch()[0];
        }
        public function createOpération(string $Opérations, string $Date, string $Motifs, string $Montant, string $Nature_Mouvement, string $Commentaire, string $user )
        {
        
        $q = $this->getconnexion()->prepare("INSERT INTO mouvement_caisse (Opérations, Date, Motifs, Montant, Nature_Mouvement, Commentaire, Utilisateur) VALUES (:Opérations, :Date, :Motifs, :Montant, :Commentaire, :Commentaire, :Utilisateur)");
        return $q->execute([
            'Opérations' => $Opérations,
            'Date' => $Date,
            'Motifs' => $Motifs,
            'Montant' => $Montant,
            'Nature_Mouvement' => $Nature_Mouvement,
            'Commentaire' => $Commentaire,
            'Utilisateur' => $user

        ]);
        }
        public function UpdateNOP( int $Opération)
    
        {
     
             $q = $this->getconnexion()->prepare("UPDATE numero SET Num = :Num WHERE id_Num = '4'");
           return $q->execute ([
             'Num' => $Opération
           ]); 
           
        }

       /**
        * Caisse Fin
        */
    
}
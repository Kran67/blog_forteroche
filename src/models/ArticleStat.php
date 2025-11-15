<?php
namespace App\src\models;

use DateTime;

/**
 * Entité Article, un article est défini par les champs
 * id, id_user, title, content, date_creation, date_update
 */
 class ArticleStat extends AbstractEntity 
 {
    private string $title = "";
    private int $viewsCount = 0;
    private ?DateTime $dateCreation = null;
    private int $commentsCount = 0;

    /**
     * Setter pour le titre.
     * @param string $title
     */
    public function setTitle(string $title) : void 
    {
        $this->title = $title;
    }

    /**
     * Getter pour le titre.
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

     /**
      * Setter pour le nombre de vues.
      * @param int $viewsCount
      * @return void
      */
    public function setViewsCount(int $viewsCount) : void
    {
        $this->viewsCount = $viewsCount;
    }

    /**
     * Getter pour le nombre de vues.
     * @return int
     */
    public function getViewsCount() : int
    {
        return $this->viewsCount;
    }

    /**
     * Setter pour la date de création. Si la date est une chaine, on la convertit en DateTime.
     * @param string|DateTime $dateCreation
     * @param string $format : le format pour la conversion de la date si elle est une chaine.
     * Par défaut, c'est le format de date mysql qui est utilisé. 
     */
    public function setDateCreation(string|DateTime $dateCreation, string $format = 'Y-m-d H:i:s') : void 
    {
        if (is_string($dateCreation)) {
            $dateCreation = DateTime::createFromFormat($format, $dateCreation);
        }
        $this->dateCreation = $dateCreation;
    }

    /**
     * Getter pour la date de création.
     * Grâce au setter, on a la garantie de récupérer un objet DateTime.
     * @return DateTime
     */
    public function getDateCreation() : DateTime 
    {
        return $this->dateCreation;
    }

     /**
      * Setter pour le nombre de vues.
      * @param int $commentsCount
      * @return void
      */
    public function setCommentsCount(int $commentsCount) : void
    {
        $this->commentsCount = $commentsCount;
    }

    /**
     * Getter pour le nombre de commentaires.
     * @return int
     */
    public function getCommentsCount() : int
    {
        return $this->commentsCount;
    }
}
<?php

/**
 * Classe qui gère les statistiques des articles.
 */
class ArticleStatManager extends AbstractEntityManager 
{
    /**
     * Récupère toutes les statistique des articles.
     * @return array : un tableau d'objets ArticleStat.
     */
    public function getAllArticleStats() : array
    {
        $sql = "SELECT 
                    a.id,
                    a.title,
                    a.views_count,
                    a.date_creation,
                    COUNT(DISTINCT c.id) as comments_count
                FROM article a
                LEFT JOIN comment c ON a.id = c.id_article
                GROUP BY a.id, a.title, a.views_count, a.date_creation
                ORDER BY a.date_creation DESC";
        
        $result = $this->db->query($sql);
        $articleStats = [];
        while ($articleStat = $result->fetch()) {
            $articleStats[] = new ArticleStat($articleStat);
        }
        return $articleStats;
    }
}
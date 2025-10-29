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
    public function getAllArticleStats(string $sortBy, string $order) : array
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
                ORDER BY {$sortBy} {$order}";
        
        $result = $this->db->query($sql);
        $articleStats = [];
        while ($articleStat = $result->fetch()) {
            $articleStats[] = new ArticleStat($articleStat);
        }
        return $articleStats;
    }

    /**
     * Fonction pour générer les URLs de tri
     * @param 
     * @param 
     * @param 
     * @return string
    */
    public static function getSortUrl(string $column, string $currentSort, string $currentOrder): string
    {
        if ($column === $currentSort) {
            // Si on clique sur la même colonne, inverser l'ordre
            $newOrder = $currentOrder === 'asc' ? 'desc' : 'asc';
        } else {
            // Sinon, ordre par défaut selon la colonne
            $newOrder = ($column === 'title') ? 'asc' : 'desc';
        }
        return 'index.php?action=articleStat&sortBy=' . $column . '&order=' . $newOrder;
    }

    /**
     * Fonction pour afficher l'indicateur de tri
     * @param 
     * @param 
     * @param 
     * @return string
    */ 
    public static function getSortIndicator(string $column, string $currentSort, string $currentOrder): string
    {
        if ($column === $currentSort) {
            return $currentOrder === 'asc' ? ' ↑' : ' ↓';
        }
        return ' ↕';
    }
}
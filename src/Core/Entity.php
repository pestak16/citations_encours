<?php namespace Core;
/**
 * Classe abstraite Entity.
 * Représente une entité de base avec des méthodes abstraites pour la gestion des nouvelles entités et l'hydratation des données.
 */
abstract class Entity
{
    /**
     * Vérifie si l'entité est nouvelle.
     *
     * @return bool Retourne true si l'entité est nouvelle, sinon false.
     */
    public abstract function est_nouveau();

    /**
     * Hydrate l'entité avec les données fournies.
     *
     * @param array $data Les données à utiliser pour l'hydratation de l'entité.
     * @return self Retourne l'instance de l'entité hydratée.
     */
    public abstract function hydrate(array $data): self;
}

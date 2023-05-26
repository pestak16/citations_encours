<?php namespace Core;


abstract class Entity
{
    public abstract function est_nouveau();
    public abstract function hydrate(array $data): self;

}

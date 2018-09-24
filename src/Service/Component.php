<?php

namespace App\Service;

use Entity\Component;

class Component
{
    /**
     *
     * @var EntityManager 
     */
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    
    public function create($data) {
        
        $component = new Component;
        $component->setName($data['name']);
        $component->setPositionX($data['positionX']);
        $component->setPositionY($data['positionY']);
        $component->setPositionZ($data['positionZ']);
        $component->setWidth($data['width']);
        $component->setHeight($data['height']);
        $component->setType($data['type']);
        if($data['type'] == 'text'){
           $component->setText($data['text']); 
        } else {
            
        }
        $component->setCreatedAt();
        $this->em->persist($component);
        $this->em->flush();
        
        return $component;
        
    }

}

<?php

namespace App\Service;

use Entity\Ad;
use Entity\Component;

class Ad
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
    
    public function listAds() {
        $ads = $this->em->getRepository("Entity\Ad")->findAll();
        return $ads;
    }
    
    public function create() {
        
        $ad = new Ad();
        $ad->setStatus('stopped');
        $ad->setCreatedAt();
        $this->em->persist($ad);
        $this->em->flush();
        
        return $ad;
        
    }
    public function publish(Ad $ad) {
        $ad->setStatus('published');
        $this->em->persist($ad);
        $this->em->flush();
        
        return $ad;
    }
    
    public function addComponent(Ad $ad, Component $component) {
        $ad->addComponent($component);
        $this->em->persist($ad);
        $this->em->flush();
        
        return $ad;
    }
    
    public function removeComponent(Ad $ad, Component $component)
    {
        $ad->removeComponent($component);
        $this->em->persist($ad);
        $this->em->flush();
        
        return $ad;
    }
}

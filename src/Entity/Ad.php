<?php
/**
 * Description of Ad
 *
 * @author aritz
 */

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ad")
 */
class Ad {
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     * @ORM\OneToMany(targetEntity="Entity\Component", mappedBy="ad")
     */
    protected $components;
    
    /** @ORM\Column(type="string") **/
    protected $status;
    
    /**
    * @ORM\Column(type="datetime")
    */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;
    
    function getId() {
        return $this->id;
    }

    function getComponents() {
        return $this->components;
    }

    function getStatus() {
        return $this->status;
    }
    
    function getCreatedAt() {
        return $this->createdAt;
    }

    function getUpdatedAt() {
        return $this->updatedAt;
    }

    function addComponent($component) {
        $this->component->add($component);
        return $this;
    }
    
    function removeComponent($component) {
        $this->component->remove($component);
        return $this;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setCreatedAt() {
        $this->createdAt = new \DateTime("now");
    }

    function setUpdatedAt() {
        $this->updatedAt = new \DateTime("now");
    }


}

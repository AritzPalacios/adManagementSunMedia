<?php
/**
 * Description of Component
 *
 * @author aritz
 */

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="component")
 */
class Component
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /** @ORM\Column(type="string") **/
    protected $name;
    
    /** @ORM\Column(type="float") **/
    protected $positonX;
    
    /** @ORM\Column(type="float") **/
    protected $positonY;
    
    /** @ORM\Column(type="float") **/
    protected $positonZ;
    
    /** @ORM\Column(type="float") **/
    protected $width;
    
    /** @ORM\Column(type="float") **/
    protected $height;
    
    /** @ORM\Column(type="string") **/
    protected $type;
    
    /** @ORM\Column(type="string") **/
    protected $link;
    
    /** @ORM\Column(type="string") **/
    protected $format;
    
    /** @ORM\Column(type="float") **/
    protected $size;

    /** @ORM\Column(type="string", length=140) **/
    protected $text;
    
    /**
     * @ORM\ManyToOne(targetEntity="Entity\Ad", inversedBy="components")
     */
    protected $ad;
    
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
    
    function getName() {
        return $this->name;
    }

    function getPositonX() {
        return $this->positonX;
    }

    function getPositonY() {
        return $this->positonY;
    }

    function getPositonZ() {
        return $this->positonZ;
    }

    function getWidth() {
        return $this->width;
    }

    function getHeight() {
        return $this->height;
    }

    function getType() {
        return $this->type;
    }

    function getLink() {
        return $this->link;
    }

    function getFormat() {
        return $this->format;
    }

    function getSize() {
        return $this->size;
    }

    function getText() {
        return $this->text;
    }

    function getAd() {
        return $this->ad;
    }
    
    function setName($name) {
        $this->name = $name;
    }

    function setPositonX($positonX) {
        $this->positonX = $positonX;
    }

    function setPositonY($positonY) {
        $this->positonY = $positonY;
    }

    function setPositonZ($positonZ) {
        $this->positonZ = $positonZ;
    }

    function setWidth($width) {
        $this->width = $width;
    }

    function setHeight($height) {
        $this->height = $height;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setFormat($format) {
        $this->format = $format;
    }

    function setSize($size) {
        $this->size = $size;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setAd($ad) {
        $this->ad = $ad;
    }

    function setCreatedAt() {
        $this->createdAt = new \DateTime("now");
    }

    function setUpdatedAt() {
        $this->updatedAt = new \DateTime("now");
    }

}
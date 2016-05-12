<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="staff")
 */
class Staff
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $fio;

    /**
     * @ORM\Column(type="string")
     */
    protected $post;

    /**
     * @ORM\Column(name="image_src", type="string", nullable=true)
     */
    protected $image;

    /**
     * @ORM\Column(name="image_alt_tag", type="string", nullable=true)
     */
    protected $imageAltTag;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fio
     *
     * @param string $fio
     * @return Staff
     */
    public function setFio($fio)
    {
        $this->fio = $fio;

        return $this;
    }

    /**
     * Get fio
     *
     * @return string 
     */
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * Set post
     *
     * @param string $post
     * @return Staff
     */
    public function setPost($post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return string 
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Staff
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set imageAltTag
     *
     * @param string $imageAltTag
     * @return Staff
     */
    public function setImageAltTag($imageAltTag)
    {
        $this->imageAltTag = $imageAltTag;

        return $this;
    }

    /**
     * Get imageAltTag
     *
     * @return string 
     */
    public function getImageAltTag()
    {
        return $this->imageAltTag;
    }
}

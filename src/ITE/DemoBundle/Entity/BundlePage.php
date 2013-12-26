<?php

namespace ITE\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\RstBundle\Model\File;

/**
 * BundlePage
 *
 * @ORM\Table(name="bundle_page", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="bundle_page", columns={"bundle_id", "path"})
 * })
 * @ORM\Entity(repositoryClass="ITE\DemoBundle\Entity\BundlePageRepository")
 */
class BundlePage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Bundle
     *
     * @ORM\ManyToOne(targetEntity="ITE\DemoBundle\Entity\Bundle", inversedBy="bundlePages")
     * @ORM\JoinColumn(name="bundle_id", referencedColumnName="id", nullable=false)
     */
    private $bundle;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var string
     *
     * @ORM\Column(name="toc", type="text")
     */
    private $toc;

    /**
     * @var boolean
     *
     * @ORM\Column(name="display_toc", type="boolean")
     */
    private $displayToc;

    /**
     * @var array
     *
     * @ORM\Column(name="parents", type="json_array")
     */
    private $parents;

    /**
     * @var array
     *
     * @ORM\Column(name="prev", type="json_array", nullable=true)
     */
    private $prev;

    /**
     * @var array
     *
     * @ORM\Column(name="next", type="json_array", nullable=true)
     */
    private $next;

    /**
     * @param File $file
     */
    public function __construct(File $file)
    {
        $this->path = trim($file->getVisiblePathname(), '/');
        $this->title = $file->getTitle();
        $this->body = $file->getBody();
        $this->toc = $file->getToc();
        $this->displayToc = $file->isDisplayToc();
        $this->parents = $file->getParents();
        $this->prev = $file->getPrev();
        $this->next = $file->getNext();
    }

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
     * Set bundle
     *
     * @param Bundle $bundle
     * @return BundlePage
     */
    public function setBundle(Bundle $bundle)
    {
        $this->bundle = $bundle;

        return $this;
    }

    /**
     * Get bundle
     *
     * @return Bundle
     */
    public function getBundle()
    {
        return $this->bundle;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return BundlePage
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return BundlePage
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return BundlePage
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set toc
     *
     * @param string $toc
     * @return BundlePage
     */
    public function setToc($toc)
    {
        $this->toc = $toc;

        return $this;
    }

    /**
     * Get toc
     *
     * @return string 
     */
    public function getToc()
    {
        return $this->toc;
    }

    /**
     * Set displayToc
     *
     * @param boolean $displayToc
     * @return BundlePage
     */
    public function setDisplayToc($displayToc)
    {
        $this->displayToc = $displayToc;

        return $this;
    }

    /**
     * Is displayToc
     *
     * @return boolean 
     */
    public function isDisplayToc()
    {
        return $this->displayToc;
    }

    /**
     * Set parents
     *
     * @param array $parents
     * @return BundlePage
     */
    public function setParents($parents)
    {
        $this->parents = $parents;

        return $this;
    }

    /**
     * Get parents
     *
     * @return array 
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     * Set prev
     *
     * @param array $prev
     * @return BundlePage
     */
    public function setPrev($prev)
    {
        $this->prev = $prev;

        return $this;
    }

    /**
     * Get prev
     *
     * @return array 
     */
    public function getPrev()
    {
        return $this->prev;
    }

    /**
     * Has prev
     *
     * @return bool
     */
    public function hasPrev()
    {
        return !empty($this->prev);
    }

    /**
     * Set next
     *
     * @param array $next
     * @return BundlePage
     */
    public function setNext($next)
    {
        $this->next = $next;

        return $this;
    }

    /**
     * Get next
     *
     * @return array 
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * Has next
     *
     * @return bool
     */
    public function hasNext()
    {
        return !empty($this->next);
    }
}

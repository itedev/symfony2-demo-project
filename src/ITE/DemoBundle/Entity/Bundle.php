<?php

namespace ITE\DemoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Bundle
 *
 * @ORM\Table(name="bundle")
 * @ORM\Entity(repositoryClass="ITE\DemoBundle\Entity\BundleRepository")
 */
class Bundle
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="ITE\DemoBundle\Entity\BundlePage", mappedBy="bundle", cascade={"all"}, orphanRemoval=true)
     */
    private $bundlePages;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bundlePages = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Bundle
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Bundle
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Clear bundlePages
     *
     * @return Bundle
     */
    public function clearBundlePages()
    {
        $this->bundlePages->clear();

        return $this;
    }

    /**
     * @param BundlePage $bundlePage
     */
    public function addBundlePage(BundlePage $bundlePage)
    {
        if (!$this->bundlePages->contains($bundlePage)) {
            $bundlePage->setBundle($this);

            $this->bundlePages->add($bundlePage);
        }
    }

    /**
     * @param BundlePage $bundlePage
     */
    public function removeBundlePage(BundlePage $bundlePage)
    {
        $this->bundlePages->removeElement($bundlePage);
    }

    /**
     * Set bundlePages
     *
     * @param ArrayCollection $bundlePages
     * @return Bundle
     */
    public function setBundlePages(ArrayCollection $bundlePages)
    {
        $this->bundlePages = $bundlePages;

        return $this;
    }

    /**
     * Get bundlePages
     *
     * @return ArrayCollection
     */
    public function getBundlePages()
    {
        return $this->bundlePages;
    }

}

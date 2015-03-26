<?php

namespace TheCommons\SermonBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SermonSeries
 */
class SermonSeries
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var string
     */
    private $backgroundImg;

    /**
     * @var string
     */
    private $foregroundImg;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $videoURL;

    /**
     * @var Sermon[]
     */
    private $sermons;

    public function __construct()
    {
        $this->sermons = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return SermonSeries
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
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return SermonSeries
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return SermonSeries
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
     * Set videoLink
     *
     * @param string $videoURL
     * @return SermonSeries
     */
    public function setVideoURL($videoURL)
    {
        $this->videoURL = $videoURL;

        return $this;
    }

    /**
     * Get videoURL
     *
     * @return string 
     */
    public function getVideoURL()
    {
        return $this->videoURL;
    }

    /**
     * Set sermons
     *
     * @param Sermon[] $sermons
     * @return SermonSeries
     */
    public function setSermons($sermons)
    {
        $this->sermons = $sermons;

        return $this;
    }

    /**
     * Get sermons
     *
     * @return Sermon[]
     */
    public function getSermons()
    {
        return $this->sermons;
    }

    /**
     * Add sermons
     *
     * @param Sermon $sermons
     * @return SermonSeries
     */
    public function addSermon(Sermon $sermons)
    {
        $this->sermons[] = $sermons;

        return $this;
    }

    /**
     * Remove sermons
     *
     * @param Sermon $sermons
     */
    public function removeSermon(Sermon $sermons)
    {
        $this->sermons->removeElement($sermons);
    }

    /**
     * Set backgroundImg
     *
     * @param string $backgroundImg
     * @return SermonSeries
     */
    public function setBackgroundImg($backgroundImg)
    {
        $this->backgroundImg = $backgroundImg;

        return $this;
    }

    /**
     * Get backgroundImg
     *
     * @return string 
     */
    public function getBackgroundImg()
    {
        return $this->backgroundImg;
    }

    /**
     * Set foregroundImg
     *
     * @param string $foregroundImg
     * @return SermonSeries
     */
    public function setForegroundImg($foregroundImg)
    {
        $this->foregroundImg = $foregroundImg;

        return $this;
    }

    /**
     * Get foregroundImg
     *
     * @return string 
     */
    public function getForegroundImg()
    {
        return $this->foregroundImg;
    }
}

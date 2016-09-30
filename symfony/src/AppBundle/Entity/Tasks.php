<?php
// src/AppBundle/Entity

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="Tasks")
 */
class Tasks{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetimeCreate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetimeTask;

    /**
     * @ORM\Column(type="boolean")
     */
    private $taskCheck;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="tasks")
     */
    private $users;

    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();

        parent::__construct();
        // your own logic
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
     *
     * @return Tasks
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
     * Set description
     *
     * @param string $description
     *
     * @return Tasks
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
     * Set datetimeCreate
     *
     * @param \DateTime $datetimeCreate
     *
     * @return Tasks
     */
    public function setDatetimeCreate($datetimeCreate)
    {
        $this->datetimeCreate = $datetimeCreate;

        return $this;
    }

    /**
     * Get datetimeCreate
     *
     * @return \DateTime
     */
    public function getDatetimeCreate()
    {
        return $this->datetimeCreate;
    }

    /**
     * Set datetimeTask
     *
     * @param \DateTime $datetimeTask
     *
     * @return Tasks
     */
    public function setDatetimeTask($datetimeTask)
    {
        $this->datetimeTask = $datetimeTask;

        return $this;
    }

    /**
     * Get datetimeTask
     *
     * @return \DateTime
     */
    public function getDatetimeTask()
    {
        return $this->datetimeTask;
    }

    /**
     * Set taskCheck
     *
     * @param boolean $taskCheck
     *
     * @return Tasks
     */
    public function setTaskCheck($taskCheck)
    {
        $this->taskCheck = $taskCheck;

        return $this;
    }

    /**
     * Get taskCheck
     *
     * @return boolean
     */
    public function getTaskCheck()
    {
        return $this->taskCheck;
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Tasks
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}

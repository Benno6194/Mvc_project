<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Tasks", mappedBy="users")
     */
    private $tasks;

    /**
     * @ORM\OneToMany(targetEntity="Comments", mappedBy="user")
     */
    private $comments;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->roles = array('ROLE_ADMIN');

    }

    /**
     * Add task
     *
     * @param \AppBundle\Entity\Tasks $task
     *
     * @return User
     */
    public function addTask(\AppBundle\Entity\Tasks $task)
    {
        $this->tasks[] = $task;

        return $this;
    }

    /**
     * Remove task
     *
     * @param \AppBundle\Entity\Tasks $task
     */
    public function removeTask(\AppBundle\Entity\Tasks $task)
    {
        $this->tasks->removeElement($task);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Add comment
     *
     * @param \AppBundle\Entity\Comments $comment
     *
     * @return User
     */
    public function addComment(\AppBundle\Entity\Comments $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \AppBundle\Entity\Comments $comment
     */
    public function removeComment(\AppBundle\Entity\Comments $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set tasks
     *
     * @param \AppBundle\Entity\Tasks $tasks
     *
     * @return User
     */
    public function setTasks(\AppBundle\Entity\Tasks $tasks = null)
    {
        $this->tasks = $tasks;

        return $this;
    }
}

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $content;

    /**
     * @var integer
     *
     * @ORM\Column(name="creator_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $creatorId;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_active", type="smallint", precision=0, scale=0, nullable=false, unique=false)
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $created;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_updated", type="smallint", precision=0, scale=0, nullable=false, unique=false)
     */
    private $isUpdated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $updated;

    /**
     * @var integer
     *
     * @ORM\Column(name="reply_to_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $replyToId;



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
     * Set content
     *
     * @param string $content
     *
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set creatorId
     *
     * @param integer $creatorId
     *
     * @return Comment
     */
    public function setCreatorId($creatorId)
    {
        $this->creatorId = $creatorId;

        return $this;
    }

    /**
     * Get creatorId
     *
     * @return integer
     */
    public function getCreatorId()
    {
        return $this->creatorId;
    }

    /**
     * Set isActive
     *
     * @param integer $isActive
     *
     * @return Comment
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return integer
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Comment
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set isUpdated
     *
     * @param integer $isUpdated
     *
     * @return Comment
     */
    public function setIsUpdated($isUpdated)
    {
        $this->isUpdated = $isUpdated;

        return $this;
    }

    /**
     * Get isUpdated
     *
     * @return integer
     */
    public function getIsUpdated()
    {
        return $this->isUpdated;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Comment
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set replyToId
     *
     * @param integer $replyToId
     *
     * @return Comment
     */
    public function setReplyToId($replyToId)
    {
        $this->replyToId = $replyToId;

        return $this;
    }

    /**
     * Get replyToId
     *
     * @return integer
     */
    public function getReplyToId()
    {
        return $this->replyToId;
    }
}

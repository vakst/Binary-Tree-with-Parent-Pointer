<?php

/**
 * Class BinaryNode
 */
class BinaryNode
{
    /**
     * @var integer
     */
    protected $value;

    /**
     * @var BinaryNode
     */
    protected $left;

    /**
     * @var BinaryNode
     */
    protected $right;

    /**
     * @var BinaryNode
     */
    protected $parent;

    /**
     * BinaryNode constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return BinaryNode
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @param BinaryNode $left
     * @return $this
     */
    public function setLeft(BinaryNode $left)
    {
        $this->left = $left;
        return $this;
    }

    /**
     * @return BinaryNode
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * @param BinaryNode $right
     * @return $this
     */
    public function setRight(BinaryNode $right)
    {
        $this->right = $right;
        return $this;
    }

    /**
     * @return BinaryNode
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param BinaryNode $parent
     * @return $this
     */
    public function setParent(BinaryNode $parent)
    {
        $this->parent = $parent;
        return $this;
    }
}
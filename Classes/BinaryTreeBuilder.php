<?php

/**
 * Class BinaryTreeBuilder
 */
class BinaryTreeBuilder
{
    protected $reader;
    /**
     * @var BinaryNode
     */
    protected $root;

    protected $list = array();
    protected $currentIndex = 0;

    public function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function build()
    {
        while ($data = $this->reader->next()) {
            $input = explode(' ', $data);
            if (!is_array($input) || count($input) !== 3) {
                echo "wrong input\n";
                exit;
            }

            /**
             * Create or update node
             */
            if (!($node = $this->getNodeByIndex($this->currentIndex))) {
                $node = new BinaryNode($input[0]);
            } else {
                $node->setValue($input[0]);
            }


            /**
             * Remember root
             */
            if (!$this->root) {
                $this->root = $node;
            }

            /**
             * Left side
             */
            if ($input[1] != '-1') {
                if (!($lNode = $this->getNodeByIndex($input[1]))) {
                    $lNode = new BinaryNode(null);
                    $lNode->setParent($node);
                    $this->list[$input[1]] = $lNode;
                }
                $node->setLeft($lNode);
            }

            /**
             * Right side
             */
            if ($input[2] != '-1') {
                if (!($rNode = $this->getNodeByIndex($input[2]))) {
                    $rNode = new BinaryNode(null);
                    $rNode->setParent($node);
                    $this->list[$input[2]] = $rNode;
                }
                $node->setRight($rNode);
            }

            /**
             * We have to know index of each node. Hash tables have O(1) complexity only.
             * It's much better then linked lists O(N) or binary trees O(logN)
             */
            $this->list[$this->currentIndex] = $node;

            $this->currentIndex++;
        }
    }


    /**
     * @return BinaryNode
     */
    public function getTree()
    {
        return $this->root;
    }

    /**
     * @param $index
     * @return BinaryNode
     */
    public function getNodeByIndex($index)
    {
        if (array_key_exists($index, $this->list)) {
            return $this->list[$index];
        } else {
            return null;
        }
    }
}
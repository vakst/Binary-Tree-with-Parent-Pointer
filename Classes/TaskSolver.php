<?php

/**
 * Class TaskSolver
 */
class TaskSolver
{
    /**
     * @param BinaryNode $root
     * @param BinaryNode $node
     * @return string
     */
    public static function solve(BinaryNode $node)
    {
        $maxValue = $node->getValue();
        $minValue = $node->getValue();
        $currentNode = $node;

        while ($currentNode) {
            if ($currentNode->getValue() < $minValue) {
                $minValue = $currentNode->getValue();
            }

            if ($currentNode->getValue() > $maxValue) {
                $maxValue = $currentNode->getValue();
            }

            $currentNode = $currentNode->getParent();
        }

        return $maxValue - $minValue;

    }
}
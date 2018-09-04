<?php
spl_autoload_register(function ($className) {
    include 'Classes/'.$className . '.php';
});

$binaryTreeBuilder = new BinaryTreeBuilder(new CliReader());
$binaryTreeBuilder->build();

while ($input = trim(fgets(STDIN))) {
    echo TaskSolver::solve($binaryTreeBuilder->getNodeByIndex($input))."\n";
}
<?php

$descriptorSpec = array(
    0 => array("pipe", "r"),
    1 => array("pipe", "w")
);

$process = proc_open('php run.php', $descriptorSpec, $pipes);

if (is_resource($process)) {
    fwrite($pipes[0], '14'.PHP_EOL);

    fwrite($pipes[0], '10 1 2'.PHP_EOL); // 0
    fwrite($pipes[0], '12 3 4'.PHP_EOL); // 1
    fwrite($pipes[0], '15 5 6'.PHP_EOL); // 2
    fwrite($pipes[0], '3 -1 7'.PHP_EOL); // 3
    fwrite($pipes[0], '8 8 -1'.PHP_EOL); // 4
    fwrite($pipes[0], '11 9 10'.PHP_EOL); // 5
    fwrite($pipes[0], '44 -1 11'.PHP_EOL); // 6
    fwrite($pipes[0], '4 -1 -1'.PHP_EOL); // 7
    fwrite($pipes[0], '7 12 -1'.PHP_EOL); // 8
    fwrite($pipes[0], '99 -1 -1'.PHP_EOL); // 9
    fwrite($pipes[0], '14 -1 -1'.PHP_EOL); // 10
    fwrite($pipes[0], '100 13 -1'.PHP_EOL); // 11
    fwrite($pipes[0], '6 -1 -1'.PHP_EOL); // 12
    fwrite($pipes[0], '113 -1 -1'.PHP_EOL); // 13

    /**
     * Start solving
     */
    fwrite($pipes[0], '1'.PHP_EOL);
    fwrite($pipes[0], '2'.PHP_EOL);
    fwrite($pipes[0], '3'.PHP_EOL);
    fwrite($pipes[0], '4'.PHP_EOL);
    fwrite($pipes[0], '5'.PHP_EOL);
    fwrite($pipes[0], '6'.PHP_EOL);
    fwrite($pipes[0], '7'.PHP_EOL);
    fwrite($pipes[0], '8'.PHP_EOL);
    fwrite($pipes[0], '9'.PHP_EOL);
    fwrite($pipes[0], '10'.PHP_EOL);
    fwrite($pipes[0], '11'.PHP_EOL);
    fwrite($pipes[0], '12'.PHP_EOL);
    fwrite($pipes[0], '13'.PHP_EOL);


    fclose($pipes[0]);

    $result = stream_get_contents($pipes[1]);
    $result = preg_replace( "/\r|\n/", "", $result);
    fclose($pipes[1]);
    proc_close($process);

    if ($result == '259453495895906103') {
        echo 'Test passed'.PHP_EOL;
    } else {
        echo 'Test failed'.PHP_EOL;
    }
}
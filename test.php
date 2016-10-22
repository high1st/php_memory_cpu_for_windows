<?php

exec('wmic OS get FreePhysicalMemory /Value 2>&1', $output, $return);
$free_memory = substr($output[2],19);
$free_memory = round($free_memory/1024/1024, 1);
exec('wmic OS get TotalVisibleMemorySize /Value 2>&1', $output2, $return);
$total_memory = substr($output2[2],23);
$total_memory= round($total_memory/1024/1024, 1);

exec('wmic cpu get LoadPercentage', $p);

$use_memory = $total_memory-$free_memory;

$per = round($use_memory/$total_memory * 100,0);

echo "메모리 : {$use_memory}/{$total_memory}GB ({$per}%) <br> CPU : {$p[1]}%";


?>
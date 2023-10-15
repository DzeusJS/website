<?php
function splitmasyvasIntoGroups($masyvas, $grupiuKiekis) {
    //surikiuoja turima masyva
    rsort($masyvas);
    echo"Surikiuotas masyvas  <br>";
    print_r($masyvas);
    echo"<br>";

    // uzpildo tuscia masyva tiek masyvu kiek nurodyta $grupiuKiekis
    $groups = array_fill(0, $grupiuKiekis, []);

    foreach ($masyvas as $value) {
       
        $minSum = PHP_INT_MAX;
        $minGroup = 0;
        
        foreach ($groups as $groupIndex => $group) {
            $sum = array_sum($group);
            if ($sum < $minSum) {
                $minSum = $sum;
                $minGroup = $groupIndex;
            }
        }
        //turimi duomenys 8,7,6,4,2,2,1,1
        // pirma lyginamos grupiu vertes is pradziu tuscia todel uzsipildo 3 grupes
        // [8] [7] [6] - maziausias [6]
        // [8] [7] [6,4] - maziausias [7]
        // [8] [7,2] [6,4] - maziausias [8]
        // [8,2] [7,2] [6,4] - maziausias [7,2]
         // [8,2] [7,2,1] [6,4] - maziausi [8,2] [6,4], tai prie [8,2] prisideda nes pirmesnis
         // [8,2,1] [7,2,1] [6,4]
        

        
        $groups[$minGroup][] = $value;
    }

    return $groups;
}

// Starting masyvas
$inputmasyvas = [1, 2, 4, 7, 1, 6, 2, 8];
$grupiuKiekis = 3;
$groups = splitmasyvasIntoGroups($inputmasyvas, $grupiuKiekis);
foreach ($groups as $group) {
    echo implode(', ', $group) . ' = ' . array_sum($group) . "\n";
}
?>
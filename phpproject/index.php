
<?php
use Region as AllRegions;
echo "<table border='100'style='width:100%'>
<tr> <th> Number</th> <th>Oblast</th> <th>Population</th>  
<th>University </th> <th>Number University 100</th> </tr>";
    class Region{
        public $id;
        public $name;
        public $people;
        public $unversity;
        function __construct($id,$name,$population,$university)
        {
            $this->id = $id;
            $this->name = $name;
            $this->people = $population;
            $this->unversity = $university;
        }
    }
    $filePath = "oblinfo.txt";
    $handle = fopen($filePath, "r");

    $line = fgets($handle);
    $len = intval($line);
    $regionList = array();

    for($i = 1; $i <= $len; $i++){
        $name = fgets($handle);
        $population =  fgets($handle);
        $university = fgets($handle);
        array_push($regionList, new AllRegions($i,$name,$population,$university));
    } 
     for($i = 0; $i < $len; $i++){
        echo "<tr>";
        echo "<td>" . $regionList[$i]->id ."</td>";
        echo "<td>" . $regionList[$i]->name ."</td>";
        echo "<td>" . $regionList[$i]->people ."</td>";
        echo "<td>" . $regionList[$i]->unversity ."</td>";
        echo "<td>" . round(($regionList[$i]->unversity / $regionList[$i]->people) * 100, 2) . "</td>";
        echo "</tr>";
    }
    ?>
</body>
</html>
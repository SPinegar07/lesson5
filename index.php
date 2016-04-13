<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sample Zoo App</title>
    <link rel="stylesheet" type="text/css" href="dependencies/skeleton.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
    <?php 

$animals = array(
array(“Ella”, “elephant”, “10”, “0012”, “02/07/2006”),
array(“Gary”, “gorilla”, “7”, “0001”, “03/08/2005”),
array(“Mickey”, “mouse”, “2”, “0008”, “04/09/2004”),
array(“Karen”, “cougar”, “5”, “0004”, “05/11/2003”),
array(“Felix”, “frog”, “2”, “0007”, “06/21/2002”),
array(“Perry”, “parrot”, “3”, “0009”, “07/31/2001”)
);
?>
<?php
$animalName = "";
$animalType = "";
$animalSize = "";
$animalLocation = "";
$animalDoa = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $animalName = animalValidation($_POST["name"]);
  $animalType = animalValidation($_POST["type"]);
  $animalSize = animalValidation($_POST["size"]);
  $animalLocation = animalValidation($_POST["location"]);
  $animalDoa = animalValidation($_POST["doa"]);
}
function animalValidation($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
    
<?php
  array_push($animals,
    array($animalName, $animalType, $animalSize, $animalLocation, $animalDoa)
  );
?>
    
<div class="row">
    <div class="twelve columns">
<h1>Sample Zoo Application</h1>
        <h2>PHP Lesson 5</h2>
    </div>
    <div  class="four columns">
<h3>Add an Animal</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" value="<?php echo $animalName;?>"><br />
  Type: <input type="text" name="type" value="<?php echo $animalType;?>"><br />
  Size: <input type="text" name="size" value="<?php echo $animalSize;?>"><br />
  Location: <input type="text" name="location" value="<?php echo $animalLocation;?>"><br />
  Date of Acquisition: <input type="text" name="doa" value="<?php echo $animalDoa;?>"><br />
  <input type="submit" name="submit" value="Submit">
</form>
    </div>
    <div class="eight columns">
<h2>Animal List</h2>
<table>
    <thead>
        <tr>
            <td>Name</td>
            <td>Type</td>
            <td>Size</td>
            <td>Location</td>
            <td>Date of Acquisition</td>
        </tr>
    </thead>
    <tbody>
    <?php
    if ( $animals ) { 
        $animalsVal = 0; 
        $animalsCount = count($animals) - 1; 
            while ( $animalsVal <=  $animalsCount ) { ?>
                <tr>
                    <td>
                    <?php echo $animals[$animalsVal][0]; ?>
                    </td>
                    <td>
                    <?php echo $animals[$animalsVal][1]; ?>
                    </td>
                    <td>
                    <?php echo $animals[$animalsVal][2]; ?>
                    </td>
                    <td>
                    <?php echo $animals[$animalsVal][3]; ?>
                    </td>
                    <td>
                    <?php echo $animals[$animalsVal][4]; ?>
                    </td>
                </tr>
              <?php 
              $animalsVal++; 
          }
          unset($animalsVal);
        } 
        ?>
    </tbody>
</table>
</div>

</body>
</html>

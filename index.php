<?php
    // Copy-Right: Sobhan Haerizadeh
    // Contact => @SobiDev

$api = "https://www.breakingbadapi.com/api/characters"; // Send Request for get informations

$readApi = file_get_contents($api); // Read Informations

$jsonDecode = json_decode($readApi , true); // Json Decode

?>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<title>Breaking Bad Characters</title>
<style>
    *{
        font-family:'Comic Sans MS ';
        font-size:24px;
    }
</style>
</head>
<body>
<table class="table table-striped table-dark">
<tr style="color:lightpink;">
<th>ID </th>
<th>Picture </th>
<th>Name </th>
<th>Nickname </th>
<th>Birthday </th>
<th>Job </th>
</tr>
<?php
$getCount = count($jsonDecode); // Get The Total Number Of All Characters 
$id = 0; 
for($i=0;$i<$getCount;$i++){
    $character = $jsonDecode[$i];
    $getImg = $character['img'];
    $getOccupationCount = count($character['occupation']); // Get The Total Number Of Jobs About Character
    $id++;
?>
<tr>
<td style="background-color:darkseagreen"> <?php echo $id ; ?> </td>
<td><img src="<?php echo $getImg; ?>" style="width:120px;height:120px;border-radius:100%;"/></td>
<td><?php echo $character['name']; ?> </td>
<td><?php echo $character['nickname']; ?> </td>
<td><?php echo $character['birthday']; ?> </td>
<td> <?php for($a=0;$a<$getOccupationCount;$a++) { echo $character['occupation'][$a]."<br/>"; ++$a; } ?> </td>
</tr>
<?php
    $i++;
    }
?>
</table>
</body>
</html>
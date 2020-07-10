<?php
if($_POST['submit1']){
		
$link = mysqli_connect('localhost', 'u1096922_default', '5vYFd_jf', 'u1096922_default') 
    or die("Ошибка " . mysqli_error($link)); 
     
$query ="SELECT * FROM cript";
 
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); 
 echo "
    <table>
	            <tr>                
                <th>Наименование</th>
                <th>Цена</th>
				</tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {$y=$i+'1';
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
} 
mysqli_close($link);	
}
if($_POST['submit']){
	$link = mysqli_connect('localhost', 'u1096922_default', '5vYFd_jf', 'u1096922_default') 
    or die("Ошибка " . mysqli_error($link)); 
	
$query ="TRUNCATE TABLE cript";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

$link = mysqli_connect('localhost', 'u1096922_default', '5vYFd_jf', 'u1096922_default') 
    or die("Ошибка " . mysqli_error($link)); 
	
$json = file_get_contents("https://api.coingecko.com/api/v3/global");
$dcode = json_decode($json, true);
$data = $dcode["data"]["market_cap_percentage"];
foreach ($data as $id => &$cost) {
	$query ="INSERT INTO cript VALUES('$id', '$cost')";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));   

}
//---------------------	
}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Test</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>	
<form method="post">
    <div class="body">
		<input type="submit" name="submit" value="Parse" class="button" />
		<br>
		<input type="submit" name="submit1" value="Show" class="button" />
    </div>
</form>
</body>
</html>

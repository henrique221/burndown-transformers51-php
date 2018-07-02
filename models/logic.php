<?php 
require_once "dbcon.php";

$sql = "select * from sprint";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);



function inserirNovaSprint($conn, $nome, $startDate, $endDate, $totalTasks)
{
    $queryInsertDatasInSprint = "insert into sprint (nome, start_date, end_date, total_tasks) values ('{$nome}', '{$startDate}' , '{$endDate}', {$totalTasks});";
    $resultInsert = mysqli_query($conn, $queryInsertDatasInSprint);
}

function listSprints($conn, $nome)
{
    $querySelectDatasFromSprint = "select * from sprint where nome = '{$nome}'";
    $result = mysqli_query($conn, $querySelectDatasFromSprint);
    $row = mysqli_fetch_assoc($result);
    var_dump($row); die;
}


function removeSprints($conn, $id)
{
    $queryDelete = "delete from sprint where id = {$id}";
    return mysqli_query($conn, $queryDelete);
}

function updateSprint($conn, $id, $nome, $startDate, $endDate, $totalTasks){
    $querySprint = "update sprint set nome = '{$nome}',start_date = '{$startDate}', end_date = '{$endDate}', total_tasks = {$totalTasks} where id = {$id};";
    return mysqli_query($conn, $querySprint);
}

//removeSprints($conn, 13);
//inserirNovaSprint($conn, "Sprint2", "2018-05-06", "2018-06-11", 12);
//listSprints($conn, "Sprint1");
updateSprint($conn, 14, 'Sprint2', '2018-06-06', '2018-07-06', 15);

?>

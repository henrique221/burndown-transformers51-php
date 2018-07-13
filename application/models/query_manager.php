<?php

class Device extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inner($progressoId)
    {
        $query = "SELECT * from progresso INNER JOIN sprint ON sprint.id = progresso.id_sprint WHERE progresso.id_progresso = '" . $progressoId . "'";
        $devices = $this->db->executeReader($query);
        return $devices;
    }

    public function updateProgresso($dataProgresso)
    {
        $query = "UPDATE progresso SET data = '" . $dataProgresso['data'] . "', 
        remaining_tasks = '" . $dataProgresso['remainingTasks'] . "', 
        bugs = '" . $dataProgresso['bugs'] . "', improvements = '" . $dataProgresso['improvements'] . "', 
        extra_tasks = '" . $dataProgresso['extraTasks'] . "' where id_progresso = '" . $dataProgresso['idProgresso'] . "'";

        $this->db->executeNonQuery($query);
    }

    public function updateSprint($dataSprint)
    {
        $query = "UPDATE progresso SET nome = '" . $dataSprint['nome'] . "', 
                         start_date = '" . $dataSprint['startDate'] . "', 
                         end_date = '" . $dataSprint['endDate'] . "', 
                         total_tasks = '" . $dataSprint['totalTasks'] . "' 
                         where id = '" . $dataSprint['idSprint'] . "'";

        $this->db->executeNonQuery($query);
    }

    public function insertProgresso($dataProgresso)
    {
        $query = "INSERT INTO progresso(id_sprint, data, remaining_tasks, bugs, improvements, extra_tasks)
                  VALUES('" . $dataProgresso['idSprint'] . "',
                         '" . $dataProgresso['data'] . "', 
                         '" . $dataProgresso['remainingTasks'] . "',
                         '" . $dataProgresso['bugs'] . "',
                         '" . $dataProgresso['improvements'] . "',
                         '" . $dataProgresso['extraTasks'] . "'
                         )";
    }

    public function insertSprint($dataSprint)
    {
        $query = "INSERT INTO sprint(id_sprint, data, remaining_tasks, bugs, improvements, extra_tasks)
                  VALUES('" . $dataSprint['nome'] . "',
                         '" . $dataSprint['startDate'] . "', 
                         '" . $dataSprint['endDate'] . "',
                         '" . $dataSprint['totalTasks'] . "',
                         )";
    }

    public function deleteProgresso()
    {
        
    }
}
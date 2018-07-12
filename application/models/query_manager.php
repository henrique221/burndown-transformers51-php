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

    public function updateProgresso($progressoId, $sprintId, $data, $remainingTasks, $bugs, $improvements, $extraTasks)
    {
        $query = "UPDATE progresso SET data = '" . $data . "', remaining_tasks = '" . $remainingTasks . "', bugs = '" . $bugs . "', improvements = '" . $improvements . "', extra_tasks = '" . $extraTasks . "'";
    }
}
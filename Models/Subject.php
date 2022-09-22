<?php

namespace App;
use \PDO;

class Subject
{
	protected $id;
	protected $name;
	protected $description;
	protected $code;
    protected $teacher_id;

	// Database Connection Object
	protected $connection;

	public function __construct(
		$name = null,
		$description = null,
		$code = null,
		$teacher_id = null )
	{
		$this->name = $name;
		$this->description = $description;
        $this->code = $code;
        $this->teacher_id = $teacher_id;

	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getDescription()
	{
		return $this->description;
	}

    public function getCode()
	{
		return $this->code;
	}

    public function getTeacher()
	{
		return $this->teacher_id;
	}


	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function save()
	{
		try {
			$sql = "INSERT INTO classes SET name=:name, description=:description, code=:code, teacher_id=:teacher_id";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':name' => $this->getName(),
				':description' => $this->getDescription(),
				':code' => $this->getCode(),
				':teacher_id' => $this->getTeacher(),
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getById($id)
	{
		try {
			$sql = 'SELECT * FROM classes WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();

			$this->id = $row['id'];
			$this->name = $row['name'];
			$this->name = $row['description'];
			$this->name = $row['code'];
			$this->name = $row['teacher_id'];

			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($name, $description, $code, $teacher_id)
	{
		try {
			$sql = 'UPDATE classes SET name=?, description=?, code=?, teacher_id=? WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$task,
				$is_completed,
				$this->getId()
			]);
		$this->name = $name;
		$this->description = $description;
        $this->code = $code;
        $this->teacher_id = $teacher_id;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function delete($extract_id)
	{
		try {
			$sql = "DELETE FROM classes WHERE id IN ($extract_id)";
			$statement = $this->connection->query($sql);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getAll()
	{
		try {
			$sql = 'SELECT * FROM classes';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getTeachers()
	{
		try {
			$sql = 'SELECT name, employee_number FROM teachers';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}
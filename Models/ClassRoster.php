<?php

namespace App;
use \PDO;

class Student
{
	protected $class_code;
    protected $student_number;
    protected $enrolled_at;

	// Database Connection Object
	protected $connection;

	public function __construct()
	{
		$this->class_code = $class_code;
        $this->student_number = $student_number;

	}

    public function getStudentNumber()
	{
		return $this->student_number;
	}

    public function getClassCode()
	{
		return $this->class_code;
	}


	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function save()
	{
		try {
			$sql = "INSERT INTO class_rosters SET class_code=:class_code, student_number=:student_number";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':class_code' => $this->getClassCode(),
				':student_number' => $this->getStudentNumber(),
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getById($id)
	{
		try {
			$sql = 'SELECT * FROM class_rosters WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();
			$this->id = $row['class_code'];
			$this->student_number = $row['student_number'];

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($class_code, $student_number)
	{
		try {
			$sql = 'UPDATE class_rosters SET class_code=?,student_number=? WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$class_code,
				$student_number,
				$this->getId()
			]);
			$this->class_code = $class_code;
            $this->student_number = $student_number;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function delete()
	{
		try {
			$sql = 'DELETE FROM class_rosters WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$this->getId()
			]);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getAll()
	{
		try {
			$sql = 'SELECT * FROM class_rosters';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}
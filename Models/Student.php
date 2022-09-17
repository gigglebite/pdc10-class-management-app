<?php

namespace App;
use \PDO;

class Classes
{
	protected $id;
	protected $name;
	protected $email;
	protected $phone;
    protected $student_number;
    protected $address;
    protected $program;

	// Database Connection Object
	protected $connection;

	public function __construct()
	{
		$this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
		$this->student_number = $student_number;
        $this->address = $address;
        $this->program = $program;

	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getEmail()
	{
		return $this->email;
	}

    public function getPhone()
	{
		return $this->phone;
	}

    public function getStudentNumber()
	{
		return $this->student_number;
	}

    public function getAddress()
	{
		return $this->address;
	}

    public function getProgram()
	{
		return $this->program;
	}


	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function save()
	{
		try {
			$sql = "INSERT INTO classes SET name=:name, email=:email, code=:code, teacher_id=:teacher_id";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':name' => $this->getName(),
				':email' => $this->getEmail(),
				':phone' => $this->getPhone(),
				':student_number' => $this->getStudentNumber(),
                ':address' => $this->getAddress(),
                ':program' => $this->getProgram()
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

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($name, $description, $code, $teacher_id)
	{
		try {
			$sql = 'UPDATE todos SET name=?, description=?, code=?, teacher_id=? WHERE id=?';
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

	public function delete()
	{
		try {
			$sql = 'DELETE FROM classes WHERE id=?';
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
			$sql = 'SELECT * FROM classes';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}
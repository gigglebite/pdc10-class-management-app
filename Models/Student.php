<?php

namespace App;
use \PDO;

class Student
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

	public function __construct(
		$name = null,
		$email = null,
		$phone = null,
		$student_number = null, 
		$address = null, 
		$program = null )
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
			$sql = "INSERT INTO students SET name=:name, email=:email, phone=:phone, student_number=:student_number, address=:address, program=:program";
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
			$sql = 'SELECT * FROM students WHERE id=:id' ;
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();

			$this->id = $row['id'];
			$this->name = $row['name'];
			$this->email = $row['email'];
			$this->phone = $row['phone'];
			$this->student_number = $row['student_number'];
			$this->address = $row['address'];
			$this->program = $row['program'];

			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($id, $name, $email, $phone, $student_number, $address, $program)
	{
		try {
			$sql = 'UPDATE students SET name=:name, email=:email, phone=:phone, student_number=:student_number, address=:address, program=:program WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id,
				':name' => $name,
				':email' => $email,
				':phone' => $phone,
				':student_number' => $student_number,
				':address' => $address,
				':program' => $program
			]);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function delete($extract_id)
	{
		try {
			$sql = "DELETE FROM students WHERE id IN ($extract_id)";
			$statement = $this->connection->query($sql);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getTotalStudent(){
		try {
			$sql = 'SELECT COUNT(id) AS total_students FROM students';
			$data = $this->connection->query($sql)->fetch();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getAll()
	{
		try {
			$sql = 'SELECT * FROM students';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}
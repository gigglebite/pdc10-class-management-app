<?php

namespace App;
use \PDO;

class Teacher
{
	protected $id;
	protected $name;
	protected $email;
	protected $phone;
    protected $employee_number;
    protected $address;

	// Database Connection Object
	protected $connection;

	public function __construct(
		$name = null,
		$email = null,
		$phone = null,
		$employee_number = null, 
		$address = null )
	{
		$this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
		$this->employee_number = $employee_number;
        $this->address = $address;

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

    public function getEmployeeNumber()
	{
		return $this->employee_number;
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
			$sql = "INSERT INTO teachers SET name=:name, email=:email, phone=:phone, employee_number=:employee_number, address=:address";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':name' => $this->getName(),
				':email' => $this->getEmail(),
				':phone' => $this->getPhone(),
				':employee_number' => $this->getEmployeeNumber(),
                ':address' => $this->getAddress()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function viewClasses($teacher_id){
		try {
			$sql = 'SELECT classes.id as id , classes.name as name, classes.description as description, classes.code as code, classes.teacher_id,
			 teachers.name as teacher_name
			 FROM classes
			 INNER JOIN teachers
			 ON classes.teacher_id = teachers.employee_number
			WHERE teacher_id=:id' ;
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $teacher_id
			]);

			$data = $statement->fetchAll();
			return $data;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getById($id)
	{
		try {
			$sql = 'SELECT * FROM teachers WHERE id=:id' ;
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetchAll();

			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getByTeacher($teacher_id)
	{
		try {
			$sql = 'SELECT * FROM teachers WHERE employee_number=:id' ;
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $teacher_id
			]);

			$row = $statement->fetchAll();

			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($id, $name, $email, $phone, $employee_number, $address)
	{
		try {
			$sql = 'UPDATE teachers SET name=:name, email=:email, phone=:phone, employee_number=:employee_number, address=:address WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id,
				':name' => $name,
				':email' => $email,
				':phone' => $phone,
				':employee_number' => $employee_number,
				':address' => $address
			]);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function delete($extract_id)
	{
		try {
			$sql = "DELETE FROM teachers WHERE id IN ($extract_id)";
			$statement = $this->connection->query($sql);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getTotalTeacher(){
		try {
			$sql = 'SELECT COUNT(id) AS total_teachers FROM teachers';
			$data = $this->connection->query($sql)->fetch();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getAll()
	{
		try {
			$sql = 'SELECT * FROM teachers';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}
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

	public function __construct()
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
				':employee_number' => $this->getemployeeNumber(),
                ':address' => $this->getAddress()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getById($id)
	{
		try {
			$sql = 'SELECT * FROM teachers WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();

			$this->id = $row['id'];
			$this->name = $row['name'];
			$this->email = $row['email'];
			$this->phone = $row['phone'];
			$this->employee_number = $row['employee_number'];
			$this->address = $row['address'];

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($name, $email, $phone, $employee_number, $address, $program)
	{
		try {
			$sql = 'UPDATE teachers SET name=?, email=?, phone=?, employee_number=?, address=? WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$name,
				$email,
                $phone,
                $employee_number,
                $address,
				$this->getId()
			]);
			$this->name = $name;
			$this->email = $email;
			$this->phone = $phone;
			$this->employee_number = $employee_number;
			$this->address = $address;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function delete()
	{
		try {
			$sql = 'DELETE FROM teachers WHERE id=?';
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
			$sql = 'SELECT * FROM teachers';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}
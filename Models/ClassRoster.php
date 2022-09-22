<?php

namespace App;
use \PDO;

class ClassRoster
{
	protected $id;
	protected $class_code;
    protected $student_number;
    protected $enrolled_at;

	// Database Connection Object
	protected $connection;

	public function __construct(
		$class_code = null,
		$student_number = null
	)
	{
		$this->class_code = $class_code;
        $this->student_number = $student_number;

	}

	public function getId()
	{
		return $this->id;
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
				':student_number' => $this->getStudentNumber()
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
			$this->id = $row['id'];
			$this->class_code = $row['class_code'];
			$this->student_number = $row['student_number'];

			return $row;

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

	public function delete($extract_id)
	{
		try {
			$sql = "DELETE FROM class_rosters WHERE id IN ($extract_id)";
			$statement = $this->connection->query($sql);
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

	public function getRoster($class_code)
	{
		try {
			$sql = 'SELECT * FROM class_rosters WHERE class_code=:class_code';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':class_code' => $class_code
			]);
			$data = $statement->fetchAll();
			return $data;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}


	public function listClasses(){
		try {
			$sql = 'SELECT class_code, classes.name AS course_name, teachers.name AS teacher_name, COUNT(class_code) AS students_enrolled
			FROM class_rosters
			INNER JOIN classes
			ON class_rosters.class_code = classes.code
			INNER JOIN teachers
			ON classes.teacher_id = teachers.employee_number
			GROUP BY class_code';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getStudents(){
		try {
			$sql = 'SELECT name, student_number FROM students';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getCourses(){
		try {
			$sql = 'SELECT code FROM classes';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}
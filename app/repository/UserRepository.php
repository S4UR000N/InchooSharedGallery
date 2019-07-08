<?php

// namespace
namespace app\repository;

// class
class UserRepository extends BaseRepository {
	public function selectOneByName($user_name) { return $this->con->query("SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1")->fetch(); }
	public function selectOneByEmail($user_email) { return $this->con->query("SELECT * FROM users WHERE user_email = '$user_email' LIMIT 1")->fetch(); }
	public function selectOneByEmailAndPassword($user_email, $user_password) {
		return $this->con->query("SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password' LIMIT 1");
	}
	public function changePassword($user_id, $user_change_password) {
		$user_change_password = md5($user_change_password);
		$original_pass = $this->con->query("SELECT users.user_password FROM users WHERE user_id='$user_id'");
		$this->con->query("UPDATE users SET user_password='$user_change_password' WHERE user_id = '$user_id'");
		$changed_pass = $this->con->query("SELECT users.user_password FROM users WHERE user_id='$user_id'");
		if($original_pass == $changed_pass) { return false; }
		return true;
	}
	public function saveUser(app\model\UserModel $user) {
		$statement = $this->con->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (:user_name, :user_email, :user_password)");

		$user_name = $user->getUserName();
		$user_email = $user->getUserEmail();
		$user_password = $user->getUserPassword();

		$statement->bindParam(':user_name', $user_name);
		$statement->bindParam(':user_email', $user_email);
		$statement->bindParam(':user_password', $user_password);

		$statement->execute();
	}
	public function removeAccount($user_id) {
		$files = $this->con->query("SELECT * FROM files WHERE user_id = '$user_id'");
		$this->con->query("DELETE FROM files WHERE user_id = '$user_id'; DELETE FROM users WHERE user_id = '$user_id';");
		$result = $this->con->query("SELECT * FROM users WHERE user_id = '$user_id'")->fetch();
		if(!$result) {
			// Remove Files from File System
			foreach ($files as $file) { unlink("uploads/" . $_SESSION['user_id'] . $file['file_name']); }
			return true;
		}
		return false;


	}
}

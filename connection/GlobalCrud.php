<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/database.php";
include_once ($path);

$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/SqlConstants.php";

include_once ($path);
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/emailconstants.php";
include_once ($path);

$operation = $_POST ['operation'];

$sql = $_POST ['sql'];
$sqlValues = $_POST ['sqlValues'];
$method = $_POST ['method'];
$body = $_POST ['body'];

if ($operation == "delete") {
	GlobalCrud::delete ( $sql, $sqlValues );
}

if ($operation == "duplicate") {
	GlobalCrud::duplicate ( $sql );
}

if ($operation == "email") {
	
	GlobalCrud::getEmail ( $sql );
}
if ($operation == "emailsend") {
	
	GlobalCrud::sendEmail($sql, $sqlValues, $body);
}
if ($operation == "emailcon") {
	// console.log("sda");
	GlobalCrud::$method ( $sql, $sqlValues );
}

if ($operation == "supportTracking") {
	// console.log("sda");
	GlobalCrud::setData ( $sql, $sqlValues );
}
class GlobalCrud {
	public static function getData($value) {
		$pdo = Database::connect ();
		$sql = SqlConstants::$allSelect [$value];
		$data = $pdo->query ( $sql );
		return $data;
		Database::disconnect ();
	}
	public static function duplicate($sql) {
		$pdo = Database::connect ();
		$sql = $sql;
		$data = $pdo->query ( $sql );
		foreach ( $data as $row ) {
			echo $row ['name'];
			echo ',';
		}
		return $data;
		Database::disconnect ();
	}
	public static function delete($value, $id) {
		$pdo = Database::connect ();
		$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sql = SqlConstants::$allSelect [$value];
		$q = $pdo->prepare ( $sql );
		$q->execute ( array (
				$id 
		) );
		Database::disconnect ();
	}
	
	public static function add($value, $id) {
		$pdo = Database::connect ();
		$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sql = SqlConstants::$allSelect [$value];
		$q = $pdo->prepare ( $sql );
		$q->execute ( array (
				$id
		) );
		Database::disconnect ();
	}
	
	public static function setData($value, $sqlValues) {
		$pdo = Database::connect ();
		$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sql = SqlConstants::$allSelect [$value];
		$q = $pdo->prepare ( $sql );
		$q->execute ( $sqlValues );
		$id = $pdo->lastInsertId ();
		return $id;
		Database::disconnect ();
	}
	public static function update($value, $sqlValues) {
		$pdo = Database::connect ();
		$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sql = SqlConstants::$allSelect [$value];
		$q = $pdo->prepare ( $sql );
		$q->execute ( $sqlValues );
		Database::disconnect ();
	}
	public static function selectById($value, $sqlValues) {
		$pdo = Database::connect ();
		$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sql = SqlConstants::$allSelect [$value];
		$q = $pdo->prepare ( $sql );
		$q->execute ( $sqlValues );
		$data = $q->fetch ( PDO::FETCH_ASSOC );
		return $data;
		Database::disconnect ();
	}
	public static function getConstants($value) {
		$constants = SqlConstants::$totalConstants [$value];
		return $constants;
	}
	public static function getAllRecordsBasedOnId($value, $sqlValues) {
		$pdo = Database::connect ();
		$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sql = SqlConstants::$allSelect [$value];
		
		$q = $pdo->prepare ( $sql );
		$q->execute ( $sqlValues );
		$data = $q->fetchAll ( PDO::FETCH_ASSOC );
		//print_r($data);
		return $data;
		
		Database::disconnect ();
	}
	public static function getEmail($sql) {
		$pdo = Database::connect ();
		$sql = $sql;
		$data = $pdo->query ( $sql );
		foreach ( $data as $row ) {
			echo $row ['email'];
			echo ',';
		}
		return $data;
		Database::disconnect ();
	}
	public static function sendEmail($toEmail, $subject, $body) {
		console.log("zdfsdfsss");
		$headers = 'From: gangonekiran@gmail.com' . "\r\n" . 
		// 'Reply-To: kiran.uskcorp@gmail.com' . "\r\n" .
		"CC: tsreenath1985@gmail.com" . "\r\n" . 'X-Mailer: PHP/' . phpversion ();
		 $toEmail = "prasad.uskcorp@gmail.com";
		 $subject = "Subject Line Here";
		 $body = "Body of email goes here";
		print_r($toEmail. "," . $subject. "," .$body );
		if (mail ( $toEmail, $subject, $body, $headers ))
			echo "email sent";
		else
			echo "email *not* sent";
	}
	public static function getEmailResponse($value, $sqlValues) {
		$pdo = Database::connect ();
		$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sql = SqlConstants::$allSelectConstants [$value];
		$q = $pdo->prepare ( $sql );
		$q->execute ( $sqlValues );
		$data = $q->fetchAll ( PDO::FETCH_ASSOC );
		return $data;
		Database::disconnect ();
	}
	public static function getEmailcon($sql, $sqlValues) {
		$from = $sql . "fromConstants";
		$cc = $sql . "cc";
		$bcc = $sql . "bcc";
		$subject = $sql . "Subject";
		$body = $sql . "Body";
		print_r ( emailconstants::$allSubjects [$from] . "," . emailconstants::$allSubjects [$cc] . "," . emailconstants::$allSubjects [$bcc] . "," . emailconstants::$allSubjects [$subject] . "," . emailconstants::$allSubjects [$body] );
		
		
	}
}
?>
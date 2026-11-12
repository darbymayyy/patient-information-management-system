<?php
/**
 * PIMS — prepared statement helpers.
 *
 * Included automatically by include/config.php so every page gets these.
 * All queries that touch user input should go through db_query().
 */

/**
 * Run a query with bound parameters.
 *
 *   $result = db_query($con, "SELECT * FROM admin WHERE email = ?", "s", [$email]);
 *
 * Returns a mysqli_result for SELECT-style statements, true for successful
 * writes, or false on failure (failures are logged to the PHP error log).
 */
function db_query($con, $sql, $types = '', $params = array())
{
	$stmt = mysqli_prepare($con, $sql);
	if ($stmt === false) {
		error_log('db_query: prepare failed (' . mysqli_error($con) . ') :: ' . $sql);
		return false;
	}
	if ($types !== '' && count($params) > 0) {
		if (!mysqli_stmt_bind_param($stmt, $types, ...$params)) {
			error_log('db_query: bind failed :: ' . $sql);
			mysqli_stmt_close($stmt);
			return false;
		}
	}
	if (!mysqli_stmt_execute($stmt)) {
		error_log('db_query: execute failed (' . mysqli_stmt_error($stmt) . ') :: ' . $sql);
		mysqli_stmt_close($stmt);
		return false;
	}
	if (mysqli_stmt_field_count($stmt) > 0) {
		$result = mysqli_stmt_get_result($stmt);
		mysqli_stmt_close($stmt);
		return $result;
	}
	mysqli_stmt_close($stmt);
	return true;
}

/**
 * Fetch the first row of a query (or null).
 *
 *   $row = db_row($con, "SELECT * FROM admin WHERE email = ?", "s", [$email]);
 */
function db_row($con, $sql, $types = '', $params = array())
{
	$result = db_query($con, $sql, $types, $params);
	if ($result === false) {
		return null;
	}
	$row = mysqli_fetch_array($result);
	mysqli_free_result($result);
	return $row;
}

/**
 * Verify a password against a stored hash.
 *
 * Supports password_hash() values and legacy MD5 hashes (32 hex chars).
 * Login flows transparently rehash legacy MD5 hashes on success — see
 * password_needs_upgrade().
 */
function verify_password($password, $stored)
{
	if ($stored === null || $stored === '') {
		return false;
	}
	if (preg_match('/^\$2y\$|^\$argon2/i', $stored)) {
		return password_verify($password, $stored);
	}
	// Legacy MD5 hash
	return hash_equals($stored, md5($password));
}

/**
 * Whether a stored password hash is still legacy MD5 and should be
 * upgraded to password_hash() at the next successful login.
 */
function password_needs_upgrade($stored)
{
	return !preg_match('/^\$2y\$|^\$argon2/i', $stored);
}

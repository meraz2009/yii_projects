<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and 
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

	public function authenticate()
	{
		$username = $this->username;
	/*	print($username);
		die();*/
		$password = $this->password;
	;
		//print($password);
		//die();

		//die("aut");

	//	$user = Users::model()->find(array('condition' => "username='$username' "));
		//print $username;die;
		$user = Users::model()->findByAttributes(array('username'=>$username));
		/*print_r($user);
		die('hi');*/


		if (!empty($user)) {

			$hashedPassword = md5($password);
			//print($hashedPassword);die;
			/*print($hashedPassword);
			die();*/
			//print $hashedPassword."-".$user->pwd_hash;
			//die;
			if (trim($hashedPassword) == trim($user->pwd_hash)) {
				//print($user->pwd_hash);
				//die("you are log in");
				//returnUrl('/opt/lampp/htdocs/sample/protected/views/users/create');
				$this->errorCode = self::ERROR_NONE;
			} else {
				$this->errorCode = self::ERROR_PASSWORD_INVALID;
			}
		}
		else{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}

		/*	if(!isset($users[$this->username]))
                $this->errorCode=self::ERROR_USERNAME_INVALID;
            elseif($users[$this->username]!==$this->password)
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            else
                $this->errorCode=self::ERROR_NONE;*/
		return !$this->errorCode;

	}


/*	public function authenticate()

	{
		$users = Users::model()->findByAttributes(array('username'=>$this->username));
		if($users === null)
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else
		{
			if($users->check($this->))
			{
				$this->errorCode=self::ERROR_NONE;
			}
			else
			{
				$this->errorCode=self::ERROR__INVALID;
			}
		}
		return !$this->errorCode;
	}*/


}
<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $email;
    private $_id;
    public $userType = 'Front';

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        //$users=array(
        // username => password
        //'demo'=>'demo',
        //'admin'=>'admin',
        //);
        if ($this->userType == 'Back') { // This is front login
            $user = Proprietario::model()->findByAttributes(array('email' => $this->username, 'activo' => 1));
            if ($user === null) { // No user was found!
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }
            // $user->Password refers to the "password" column name from the database
            else if ($user->senha !== $user->encrypt($this->password)) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else { // User/pass match
                $this->errorCode = self::ERROR_NONE;
                $this->_id = $user->propid;
                $this->setState('isAdmin', 'Back');
                $this->setState('fbid', $user->fb_id);
            }
            return !$this->errorCode;
        }
        if ($this->userType == 'Front') { // This is front login
            $user = Cliente::model()->findByAttributes(array('email' => $this->username, 'activo' => 1));
            if ($user === null) { // No user was found!
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }
            // $user->Password refers to the "password" column name from the database
            else if ($user->senha !== $user->encrypt($this->password)) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else { // User/pass match
                $this->errorCode = self::ERROR_NONE;
                $this->_id = $user->clienteid;
                $this->setState('isAdmin', 'Front');
                $this->setState('fbid', $user->fb_id);
            }
            return !$this->errorCode;
        }
    }

    public function getId() {
        return $this->_id;
    }

    public function facebookAuthenticate() {
        $user = Cliente::prepareUserForAuthorisation($this->username);

        if ($user === NULL) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if (!$user->ValidatePassword($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id = $user->clienteid;
            $this->username = $user->email;
            $this->setState('isAdmin', 'Front');
            $this->errorCode = self::ERROR_NONE;
            $this->setState('fbid', $user->fb_id);
        }

        return $this->errorCode;
    }

    public function facebookAuthenticateOwner() {
        $user = Proprietario::prepareUserForAuthorisation($this->username);

        if ($user === NULL) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if (!$user->ValidatePassword($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id = $user->propid;
            $this->username = $user->email;
            $this->setState('isAdmin', 'Back');
            $this->errorCode = self::ERROR_NONE;
            $this->setState('fbid', $user->fb_id);
        }

        return $this->errorCode;
    }

}

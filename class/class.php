<?php
//*************************
//課題No.
//作成日:2019//
//作成者:峯松康二
//クラス:IH-12A-905
//*************************

class member {
  private $name;
  private $email;
  private $login_id;
  private $password;

  function __construct($name, $email, $login_id, $password) {
    $this->setName($name);
    $this->setEmail($email);
    $this->setLogin_id($login_id);
    $this->setPassword($password);
  }

  public function setName($name) {
    $this->name = (string)filter_var($name);
  }
  public function setEmail($email) {
    $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
    //ドコモとauの救済
    if($this->email === NULL && (strpos($email, '@docomo.ne.jp') !== false || strpos($email, '@ezweb.ne.jp') !== false)) {
      $pattern = '/^([a-zA-Z])+([a-zA-Z0-9\._-])*@(docomo\.ne\.jp|ezweb\.ne\.jp)$/';
      if(preg_match($pattern, $email) === 1) {
        $this->email = $email;
      }
    }
  }
  public function setLogin_id($login_id) {
    $this->login_id = (string)filter_var($login_id);
  }
  public function setPassword($password) {
    $this->password = (string)filter_var($password);
  }

  public function getName() {
    return $this->name;
  }
  public function getEmail() {
    return $this->email;
  }
  public function getLogin_id() {
    return $this->login_id;
  }
  public function getPassword() {
    return $this->password;
  }

  public function regist_info() {

  }

  public function regist_mail() {

  }

  public function edit_info() {

  }

  public function resend_password() {

  }

  public function delete() {

  }
}


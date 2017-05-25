<?php

/**
 * @file
 * Contains \Eloqua\HttpClient\Listener\AuthListener.
 */

namespace Eloqua\HttpClient\Listener;

use Eloqua\Exception\RuntimeException;
use Guzzle\Common\Event;

class AuthListener {

  private $site;
  private $login;
  private $password;

  public function __construct($site, $login, $password) {
    $this->site = $site;
    $this->login = $login;
    $this->password = $password;
  }

  public function onRequestBeforeSend(Event $event) {
    if (empty($this->site) || empty($this->login) || empty($this->password)) {
      throw new RuntimeException('You must specify authentication details.');
    }

    // ///////////////////////////////////////////////////////////////////////////////////     
    // CHECK ADDED BY MICHAEL PORTER TO ALLOW USE OF THIS LIB WITH 'access_token' (from OAuth)
    // INSTEAD OF 'site' 'login' and 'password'
    if( $this->login == 'access_token' &&  $this->password == 'access_token' ){
      $credentials = $this->site;
      $event['request']->setHeader(
        'Authorization',
        sprintf('Bearer %s', $this->site)
      );
    } else {
      $credentials = $this->site . '\\' . $this->login . ':' . $this->password;
      $event['request']->setHeader(
        'Authorization',
        sprintf('Basic %s', base64_encode($credentials))
      );
    }
    // ///////////////////////////////////////////////////////////////////////////////////   

      
  }

}

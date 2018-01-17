<?php

  # Example to use the SSH2Class library and execute commands remotely and process the results

  include "SSH2Class.php";


  $options = array(
    'user' => array(
      'username' => 'root',
      'key_pub' => '/home/depruebas/.ssh/Alex.pub',
      'key_pri' => '/home/depruebas/.ssh/Alex',
    ),

    'server' => array(
      'ip' => '192.168.82.209',
      'port' => '23277',
    ),

    'command' => array(
      'space' => 'df -h --total --exclude-type=tmpfs',
      'du'  => 'du -sh /root/',
    ),
  );


  $ssh2 = new SSH2Class();
  $data = $ssh2->execute_command( $options); 

  print_r( $data);
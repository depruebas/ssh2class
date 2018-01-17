<?php

/*
    Get a array with this format:

    $options = array( 

      'user' => array(
        'username' => 'root',
        'key_pub' => '/home/depruebas/.ssh/Alex.pub',
        'key_pri' => '/home/depruebas/.ssh/Alex',
      ),

      'command' => 'ls -l',

      'server' => array(
        'ip' => '192.168.82.209',
        'port' => '22',
      ),

    )

*/

class SSH2Class
{

   public function execute_command( $options)
   {  
      $user = $options['user'];
      $command = $options['command'];


      $connection = ssh2_connect( $options['server']['ip'], $options['server']['port'], array( 'hostkey'=>'ssh-rsa'));


      if ( ssh2_auth_pubkey_file( $connection, $user['username'],
                          $user['key_pub'],
                          $user['key_pri'], '')) 
      {

        foreach ( $command as $key => $value) 
        {

          $stream = ssh2_exec( $connection, $value);

          $errorStream = ssh2_fetch_stream( $stream, SSH2_STREAM_STDERR);

          stream_set_blocking($errorStream, true);
          $error = stream_get_contents( $errorStream);
          stream_set_blocking($stream, true);
          $return = stream_get_contents( $stream);

          $data_ssh[ $key] = array_filter ( explode ( "\n", $return));

        }

        
        if ( empty( $error))
        {
          $r = array(
            'success' => 1,
            'data' => $data_ssh,
          );
        }
        else
        {
          $r = array(
            'success' => 0,
            'data' => $error
          );
        }

      } 
      else 
      {  

        $r = array(
          'success' => 0,
          'data' => "Public Key Authentication Failed'"
        );

      }

      return ( $r);
   }

}


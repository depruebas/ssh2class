# ssh2class
ibrary to execute commands on remote console or web servers through ssh

The library receives an array with the connection data and commands to execute, an array like this

```
   $options = array(
    'user' => array(
      'username' => 'root',
      'key_pub' => '/home/depruebas/.ssh/Alex.pub',
      'key_pri' => '/home/depruebas/.ssh/Alex',
    ),
    'server' => array(
      'ip' => '192.168.82.209',
      'port' => '22',
    ),
    'command' => array(
      'space' => 'df -h --total --exclude-type=tmpfs',
      'du'  => 'du -sh /root/',
    ),
  );
```
  And returns the results same this:
 ```
  Array
(
    [success] => 1
    [data] => Array
        (
            [space] => Array
                (
                    [0] => Filesystem             Size  Used Avail Use% Mounted on
                    [1] => udev                   3.8G     0  3.8G   0% /dev
                    [2] => /dev/mapper/VG00-root   18G   13G  4.5G  74% /
                    [3] => /dev/mapper/VG02-data  197G   22G  166G  12% /data
                    [4] => /dev/mapper/VG01-data   68G   97M   64G   1% /inpr3mium
                    [5] => total                  286G   34G  238G  13% -
                )

            [du] => Array
                (
                    [0] => 690M	/root/
                )

        )

)
```

This library needs php-ssh2.

sudo apt install php-ssh2

https://www.netveloper.com/error-call-to-undefined-function-ssh2_connect

Regards
Alex

https://www.cambiatealinux.com


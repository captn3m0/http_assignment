<?php
		$weburl=argz[1];
		$service_port = getservbyname('www', 'tcp');
		$webaddress = gethostbyname($weburl);
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket === false) {
		    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";		         
		}
		else{
			$result = socket_connect($socket, $address, $service_port);
			$in = "HEAD / HTTP/1.1\r\nHost: " . $string . "\r\nConnection: Close\r\n\r\n";
			$out = '';
			socket_write($socket, $in, strlen($in));
			socket_recv($socket, $outstr, 12000, MSG_WAITALL);
			socket_close($socket);
			for($i=0;$i<strlen($outstr);$i++)
			{	
				if($outstr[$i]=="\r"&&$outstr[($i++)+1]=="\n")
					echo '<br />';
				else
					echo $outstr[$i];				
			}
	}
	?>
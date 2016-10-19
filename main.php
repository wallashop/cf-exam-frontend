<?php

if( isset($_GET['get']) && !empty($_GET['get']) ) {
	$get = trim($_GET["get"]);
	if ($get == "backend") {
		$ip = $_GET["ip"];
		$port = $_GET["port"];
		$cmd = "curl $ip:$port";
		exec("$cmd 2> /dev/null 2>&1 ", $r);
		echo $r[3];
	}

	if ($get == "consul") {
		$cmd = "curl http://consul:8500/v1/catalog/services";
		exec("$cmd 2> /dev/null 2>&1 ", $r);
                echo $r[3];
	}

	if ($get == "service") {
		$name = $_GET["name"];
                $cmd = "curl http://consul:8500/v1/catalog/service/$name";
                exec("$cmd 2> /dev/null 2>&1 ", $r);
                echo $r[3];
        }
}

?>

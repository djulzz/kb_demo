<!-- // Database Structure 
create database kb_demo;
use kb_demo;
CREATE TABLE paragraph_table ( id MEDIUMINT NOT NULL AUTO_INCREMENT, paragraph text NOT NULL, PRIMARY KEY (id) ); -->

<!--  ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 -->

<?php
	 // phpinfo();
	if(isset($_POST['submit_row']))
	{
		$host			=	"localhost";
		$username		=	"root";
		$password		=	"";
		$databasename	=	"kb_demo";
		// Connect to server and select databse.

		$connection 	=	mysqli_connect( $host, $username, $password );
		if( !$connection ) {
			echo "Error: Unable to connect to MySQL." . PHP_EOL;
    		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    		exit;
		} else {
			echo "Connection established." . PHP_EOL;
		}

		$db 			=	mysqli_select_db( $connection, $databasename ) or die( "cannot select db" );	 
		if (!$db)	{
			echo "Debugging error: " . mysql_error() . PHP_EOL;
			exit;
		} else {
			echo "DB selected." . PHP_EOL;
		}
	 
		$step			=	$_POST[ 'step'];


		for( $i = 0; $i < count( $step ); $i++ )
		{
			if( $step[ $i ] != "" )
			{
				$res = mysqli_query( $connection, "insert into paragraph_table( paragraph ) values( '$step[$i]' )" );
				if( !$res ) {
					echo "Debugging error: " . mysqli_error( $connection ) . PHP_EOL;
				} else {
					echo "Query successful." . PHP_EOL;
				}
			}
		}
	}
?>

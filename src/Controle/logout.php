<?php
	session_start();
	session_destroy();
	echo '<SCRIPT type="text/javascript"> //not showing me this
                            alert("Volte sempre!");
                            window.location.replace("../Visualizacao/index.php");
              </SCRIPT>';
?>

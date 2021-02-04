<?php 
$str = <<<'EOD'
   ' ' < > "
EOD;

$str = htmlspecialchars($str,ENT_QUOTES );
echo $str;
?>
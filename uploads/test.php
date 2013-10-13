<?php

exec("curl -F 'f=@/home/hack/uploads/18.jpg' http://zxing.org/w/decode | grep 'Raw text' | awk -F 'Raw' '{print $2}' | awk -F 'margin:0\">' '{print $2}' | awk -F '</pre>' '{print $1}'", $out);

print_r($out);
?>

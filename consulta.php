<?php

        $sent = "execute procedure PRCVOBTENERCONTACTO ('$rfc', '$empresa')";
        $result = ibase_query($conectar, $sent) or die(ibase_errmsg());
        
?>

<?php
$sql="select m.*,h.* from t_menu as m,t_hakakses as h where m.kd_domain=h.kd_domain and h.kd_domain="$dmd";
?>
<?php

define("UPLOAD_DIR", __DIR__ . "/../uploads/");
define("ALLOWED_FILE_TYPES", [
    "image/jpeg",
    "image/png",
    "image/gif",
    "image/jpg"   
]);
define("MAX_FILE_SIZE", 1024*1024*5);

define("BASE_UPLOAD_URL", "http://localhost/ProjetoPHPDashboard/uploads/")


?>
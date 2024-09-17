<?php
    session_start();
    session_destroy();
    echo"<script>alert('Good byee');
    location.href='../../../';</script>";
?>
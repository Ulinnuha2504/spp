<?php

session_start(); // Mulai session
session_unset(); // Hapus semua session
session_destroy(); // Hancurkan session

// Redirect ke halaman login dengan pesan logout sukses
header("Location: login.php?pesan=1");
exit();
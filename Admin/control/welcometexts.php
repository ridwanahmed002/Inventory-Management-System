<?php
$welcomeTexts = [
    "Hello",
    "Hola",      // Spanish
    "नमस्ते",    // Hindi
    "স্বাগতম",   // Bengali
    "Bonjour",   // French
    "Ciao",      // Italian
    "こんにちは",  // Japanese
    "안녕하세요",  // Korean
    "你好",       // Chinese
    "Здравствуйте" // Russian
];

header('Content-Type: application/json');
echo json_encode($welcomeTexts);
?>

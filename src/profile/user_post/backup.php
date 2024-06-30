<?php

function getCallingFile() {
  $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2); // Get 2 levels of backtrace
  return isset($backtrace[1]['file']) ? $backtrace[1]['file'] : null; // Extract calling file if available
}

$callingFile = getCallingFile();

if ($callingFile === "a.php") {
  // Logic for when called from a.php
  echo "Called from a.php";
} else if ($callingFile === "b.php") {
  // Logic for when called from b.php
  echo "Called from b.php";
} else {
  // Logic for other files (optional)
  echo "Called from an unknown file";
}

?>

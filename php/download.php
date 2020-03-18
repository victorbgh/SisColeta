<?php

$GerParam - filter_input(INPUT_GET, "file", FILTER_DEFAULT);

function InputHeader($FILENAME, $FILEPATH) {
    header("Content-Disposition: attachment; filename={$FILENAME}");
    header("Content-type: application/pdf");
    readfile($FILEPATH);
}

switch ($GerParam) {
  case '1':
    $FILENAME = "v-card.pdf";
    $FILEPATH = "cards/{$FILENAME}";
    InputHeader($FILENAME, $FILEPATH);
    break;
  
  default:
    # code...
    break;
}

?>




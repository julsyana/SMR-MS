<?php

   include('../../phpqrcode/qrlib.php');

   
   function generateQR($tempDir, $codeContents){

      $fileName = $codeContents.'.png';

      $pngAbsoluteFilePath = $tempDir.$fileName;
      
      // generating
      if (!file_exists($pngAbsoluteFilePath)) {

          QRcode::png($codeContents, $pngAbsoluteFilePath);
   
      }

      return $fileName;

   }

?>
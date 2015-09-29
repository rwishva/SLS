<?php
    include("dbmc.php");
    // session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
   <title>jQuery UI Selectable - Display as grid</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <!-- <script src='jquery-1.4.2.js' type='text/javascript' /> -->
<script src='spritespin.js' type='text/javascript' />


</head>
<body>
<script type='text/javascript'>
$("#mySpriteSpin").spritespin({
  // path to the source images.
  source: [
  "map.jpg",
  "A.png",
  "R.png",
  "path/to/frame_004.jpg",
  "path/to/frame_005.jpg",
  "path/to/frame_006.jpg",
  "path/to/frame_007.jpg",
  "path/to/frame_008.jpg",
  "path/to/frame_009.jpg",
  "path/to/frame_010.jpg",
  ],
  width   : 480,  // width in pixels of the window/frame
  height  : 327,  // height in pixels of the window/frame
});
</script>
<div id='mySpriteSpin'/>
 
</body>
</html>
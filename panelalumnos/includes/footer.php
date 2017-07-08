<script type="text/javascript" src="../js/app.js"></script>

<?php
// show negative messages
if ($student->errors) {
  foreach ($student->errors as $error) { ?>
    <script type="text/javascript">
        $(document).ready(function(){
          $('.tooltipped').tooltip({delay: 50});
           Materialize.toast('<?php  echo $error;  ?>', 4000);
        });
    </script>
<?php }
}
// show positive messages
if ($student->messages) {
   foreach ($student->messages as $message) { ?>
     <script type="text/javascript">
      $(document).ready(function(){
        $('.tooltipped').tooltip({delay: 50});
        Materialize.toast('<?php  echo $message;  ?>', 4000);
      });
    </script>
<?php }
}
?>

<p>Here is a list of all ADDRESSes:</p>

<?php foreach($addresses as $address) { ?>
  <p>
    <?php echo $address->AddressLine1 ." ".$address->City  ?>
    <a href='?controller=addresses&action=show&id=<?php echo $address->AddressID; ?>'>Vidi detalje</a>
  </p>
<?php } ?>
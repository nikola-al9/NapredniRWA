<p>Here is a list of all CONTACTs:</p>

<?php foreach($contact as $contactsingle) { ?>
  <p>
    <?php echo $contactsingle->FirstName ." ".$contactsingle->LastName  ?>
    <a href='?controller=contact&action=deletecontact&id=<?php echo $contactsingle->FirstName; ?>'>BRISI CONTACT</a>
  </p>
<?php } ?>
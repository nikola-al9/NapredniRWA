<p>Here is a list of all customers:</p>

<?php foreach($customers as $customer) { ?>
  <p>
    <?php echo $customer->AccountNumber; ?>
    <a href='?controller=customers&action=find&id=<?php echo $customer->CustomerID; ?>'>See content</a>
  </p>
<?php } ?>
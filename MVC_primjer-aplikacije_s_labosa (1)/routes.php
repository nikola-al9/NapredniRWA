<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
	  case 'addresses':
        require_once('models/address.php');
		$controller = new AddressController();
      break;
	   case 'contact':
        require_once('models/contact.php');
		$controller = new contactController();
      break;
      case 'customers':
        // we need the model to query the database later in the controller
        require_once('models/customer.php');
        $controller = new CustomersController();
      break;
    }
    
    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' 		=> ['home', 'error'],
                       'customers' 		=> ['index', 'find'],
					   'addresses' => ['index', 'show'],
					   'contact' 	=> ['index', 'show','deletecontact']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>
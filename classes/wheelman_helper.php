<?

if(!function_exists('close_form')) {
  function close_form() {
    return "</form>";
  }
}

class Wheelman_Helper {
  public function __contruct() {
    
  }
  
  public function on_handleRequest() {
    $controller = Cms_Controller::create();

    $cms_update_elements = post('cms_update_elements');

    if(!$cms_update_elements) // let's get out of here!
      return;

    foreach($cms_update_elements as $element => $partial)
    {
      if($partial == 'ls_cms_page') {
        unset($_POST['cms_update_elements'][$element]);
        
        $params = array();
        
        $page = Cms_Page::findByUrl(Phpr::$request->getCurrentUri(), $params);
        
        ob_start();
        $controller->open($page, $params);
        ob_end_clean();
      
        echo ">>" . $element . "<<";
        
        $controller->render_page();
      }
      
      return; // we're done here
    }
  }
}

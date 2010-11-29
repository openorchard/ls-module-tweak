<?

class Wheelman_Actions extends Cms_ActionScope
{
  public $globalHandlers = array(
    'on_ajax'
  );
  
  public function on_ajax()
  {
    $controller = Cms_Controller::get_instance();

    foreach(post('cms_update_elements') as $element => $partial)
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
    }
  }
}

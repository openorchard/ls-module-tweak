<?

class Wheelman_Module extends Core_ModuleBase {

  protected function createModuleInfo()
  {
    $helper = new Wheelman_Helper();
    $helper->on_handleRequest();
    
    return new Core_ModuleInfo(
      "Wheelman",
      "Limewheel skinning helper",
      "Limewheel Creative Inc."
    );
  }
  
  public function subscribeEvents()
  {
    Backend::$events->addEvent('cms:onBeforeDisplay', $this, 'before_page_display');
  }

  public function before_page_display($page)
  {

  }
}

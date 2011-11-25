<?php
/**
 * favicon actions.
 *
 * @package    OpenPNE
 * @subpackage favicon
 * @author     Your name here
 */
class faviconActions extends sfActions
{
  public function preExecute()
  {
    if (is_callable(array($this->getRoute(), 'getObject')))
    {
      try
      {
        $object = $this->getRoute()->getObject();
      }
      catch (sfError404Exception $e)
      {
        $this->forwardUnless($this->getUser()->isSNSMember(),
            sfConfig::get('sf_login_module'), sfConfig::get('sf_login_action'));

        throw $e;
      }
      if ($object instanceof AdminUser)
      {
        $this->user = $object;
      }
    }
  }

/*  public function executeNew($request)
  {
    $diary = array ();
    $this->diary = $diary;
//    if(count($diary) == 0){
//      return sfView::ERROR;
//      }
    return sfView::NONE; // sfView::NONE はテンプレートを使用しません
// return sfView::SUCCESS; は省略できる
  }*/

  public function executeShow(sfWebRequest $request)
  {
//    $this->users = Doctrine::getTable('AdminUser')->retrievesAll();
//    $this->user = Doctrine::getTable('AdminUser')->getById(2);
    if (!$this->user)
    {
      $id = $request->getParameter('id');
      $this->user = Doctrine::getTable('AdminUser')->getById($id);
    }
  }
}

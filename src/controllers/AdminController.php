<?php
namespace Acme\Controllers;

use duncan3dc\Laravel\BladeInstance;
use Acme\Models\Page;
use Acme\Validation\Validator;

class AdminController extends BaseController
{
  public function postSavePage(){
    $page_id = $_REQUEST['page_id'];
    $page_content = $_REQUEST['thedata'];

    $page = Page::find($page_id);
    $page->page_content = $page_content;
    $page->save();
    echo "OK";
  }

  public function getAddPage()
  {
    $page_id = 0;
    $page_content = "Enter your content here";
    $browser_title = "New page";

    echo $this->blade->render('generic-page', [
        'page_id' => $page_id,
        'browser_title' => $browser_title,
        'page_content' => $page_content,
    ]);
  }
}

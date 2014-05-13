<?php

namespace Zf2Acl\Controller;

use Zf2Base\Controller\CrudController;
use Zend\View\Model\ViewModel;

class ResourceController extends CrudController
{
    public function __construct()
    {
        $this->entity = "Zf2Acl\Entity\Resource";
        $this->service = "Zf2Acl\Service\Resource";
        $this->form = "Zf2Acl\Form\Resource";
        $this->controller = "resource";
        $this->route = "acl-all/default";
    }
}

<?php

namespace Zf2Acl\Controller;

use Zf2Base\Controller\CrudController;
use Zend\View\Model\ViewModel;

class RoleController extends CrudController
{
    public function __construct()
    {
        $this->entity = "Zf2Acl\Entity\Role";
        $this->service = "Zf2Acl\Service\Role";
        $this->form = "Zf2Acl\Form\Role";
        $this->controller = "role";
        $this->route = "acl-all/default";
    }
}

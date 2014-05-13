<?php

namespace DftAcl\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use DftAcl\Entity\Role;

class LoadRole extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
    {
        $role = new Role;
        $role->setName("Visitante");
        $manager->persist($role);

        $visitante = $manager->getReference('DftAcl\Entity\Role',1);

        $role = new Role;
        $role->setName("Cliente")
              ->setParent($visitante);
        $manager->persist($role);

        $role = new Role;
        $role->setName("Funcionario")
              ->setParent($visitante)
              ->setLayout("layout/admin")
        	  ->setRedirect("home");
        $manager->persist($role);

        $role = new Role;
        $role->setName("Administrador")
        	  ->setParent($visitante)
              ->setLayout("layout/admin")
              ->setRedirect("home");
        $manager->persist($role);

        $role = new Role;
        $role->setName("Developer")
              ->setDeveloper(1)
              ->setLayout("layout/developer")
              ->setRedirect("home-dev");
        $manager->persist($role);

        $manager->flush();
    }

    public function getOrder() {
        return 3;
    }
}

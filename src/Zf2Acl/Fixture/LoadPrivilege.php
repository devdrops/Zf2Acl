<?php

namespace Zf2Acl\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Zf2Acl\Entity\Privilege;

class LoadPrivilege extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $visitante   = $manager->getReference('Zf2Acl\Entity\Role',1);
        $cliente     = $manager->getReference('Zf2Acl\Entity\Role',2);
        $funcionario = $manager->getReference('Zf2Acl\Entity\Role',3);
        $admin       = $manager->getReference('Zf2Acl\Entity\Role',4);
        $developer   = $manager->getReference('Zf2Acl\Entity\Role',5);

        $aclRole      = $manager->getReference('Zf2Acl\Entity\Resource',1);
        $aclResource  = $manager->getReference('Zf2Acl\Entity\Resource',2);
        $aclPrivi     = $manager->getReference('Zf2Acl\Entity\Resource',3);
        $application  = $manager->getReference('Zf2Acl\Entity\Resource',4);
        $auth         = $manager->getReference('Zf2Acl\Entity\Resource',5);
        $usuario      = $manager->getReference('Zf2Acl\Entity\Resource',6);
        $empresa      = $manager->getReference('Zf2Acl\Entity\Resource',7);

        // Visitante
        $privilege = new Privilege;
        $privilege->setName("All")
                  ->setRole($visitante)
                  ->setResource($auth);
        $manager->persist($privilege);
        // Visitante FIM

        // Funcionario
        $privilege = new Privilege;
        $privilege->setName("index")
                  ->setRole($funcionario)
                  ->setResource($application);
        $manager->persist($privilege);
        // Funcionario FIm

        // Admin
        $privilege = new Privilege;
        $privilege->setName("All")
                  ->setRole($admin)
                  ->setResource($usuario);
        $manager->persist($privilege);

        $privilege = new Privilege;
        $privilege->setName("index")
                  ->setRole($admin)
                  ->setResource($application);
        $manager->persist($privilege);
        // Admin fim

        $manager->flush();
    }

    public function getOrder() {
        return 5;
    }
}
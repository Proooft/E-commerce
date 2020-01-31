<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

	private $encoder;

	public function __construct(UserPasswordEncoderInterface $encoder)
	{
		$this->encoder = $encoder;
	}

	public function load(ObjectManager $manager)
	{

		$user = new User();
		$user->setUsername('user');
		$user->setEmail('user@localhost');
		// $password = $this->encoder->encodePassword($user, 'user');
		$password = "user";
		$user->setPassword($password);
		
		$manager->persist($user);

		$userAdmin = new User();
		$userAdmin->setUsername('admin');
		$userAdmin->setEmail('admin@localhost');
		// $password = $this->encoder->encodePassword($user, 'admin');
		$password = "admin";
		$userAdmin->setPassword($password);
		$userAdmin->setRoles(["ROLE_ADMIN"]);

		$manager->persist($userAdmin);
		$manager->flush();
	}
}
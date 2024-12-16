<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Comment;
use App\Entity\Conference;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;

class AppFixtures extends Fixture
{
    public function __construct(private PasswordHasherFactoryInterface $passwordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $amsterdam = new Conference();
        $amsterdam->setCity('Amsterdam')
            ->setYear('2019')
            ->setIsInternational(true);
        $manager->persist($amsterdam);

        $paris = new Conference();
        $paris->setCity('Paris')
            ->setYear('2020')
            ->setIsInternational(false);
        $manager->persist($paris);

        $comment1 = new Comment();
        $comment1->setConference($amsterdam)
            ->setEmail('fabien@example.com')
            ->setAuthor('Fabien')
            ->setText('This was a great conference')
            ->setState('published')
        ;
        $manager->persist($comment1);

        $comment2 = new Comment();
        $comment2->setConference($amsterdam)
            ->setEmail('lucas@example.com')
            ->setAuthor('Lucas')
            ->setText('I think this one is going to be moderated.')
        ;
        $manager->persist($comment2);

        $admin = new Admin();
        $admin
            ->setUsername('admin')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->passwordHasher->getPasswordHasher(Admin::class)->hash('azerty123'));
        $manager->persist($admin);

        $manager->flush();
    }
}

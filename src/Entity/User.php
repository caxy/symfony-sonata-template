<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Table(name="fos_user")
 * @ORM\Entity()
 */
class User extends BaseUser
{
    const ROLE_ADMIN = 'ROLE_ADMIN';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        if($this->roles) {
            return $this->roles[0];
        }

        return '';
    }

    /**
     * @param string $role
     * @return User
     */
    public function setRole(string $role): User
    {
        $isSuperAdmin = in_array(User::ROLE_SUPER_ADMIN, $this->roles);

        $this->roles = [$role];
        if($isSuperAdmin) {
            $this->roles[] = User::ROLE_SUPER_ADMIN;
        }

        return $this;
    }
}

<?php

namespace My\Entity;

/**
 * @Entity
 * @Table(name="users")
 */
class User
{
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer")
     */
    protected $id;

    /**
     * @Column(type="string", length=50)
     */
    protected $name;

    /**
     * @Column(type="string", length=50)
     */
    protected $email;

    // Getters and setters...
}

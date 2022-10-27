<?php

namespace Yveschiu\Experiments\Entities;

/**
 * Class Profile
 */
class Profile
{

    const NAMES = [
        "alex",
        "betty",
        "caleb",
        "johnnas",
        "eleonor",
    ];

    /**
     * @var string $userName
     */
    private string $userName;

    /**
     * @var int $userAge
     */
    private int $userAge;

    public function __construct()
    {
        $this->userName = static::NAMES[random_int(0, count(static::NAMES) - 1)];
        $this->userAge = random_int(15, 100);
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @return void
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getUserAge(): string
    {
        return $this->userAge;
    }

    /**
     * @return void
     */
    public function setUserAge(int $userAge): void
    {
        $this->userAge = $userAge;
    }
}

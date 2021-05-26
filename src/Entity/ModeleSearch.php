<?php

namespace App\Entity;

class ModeleSearch
{

    /**
     * @var string|null
     */
    private $firstname;

    /**
     * @var string|null
     */
    private $lastname;

    /**
     * @var string|null
     */
    private $dateOfBirth;

    /**
     * @var int|null
     */
    private $clothingSize;

    /**
     * @var int|null
     */
    private $size;

    /**
     * @var string|null
     */
    private $hairs;

    /**
     * @var string|null
     */
    private $eyes;


    /**
     * Get the value of firstname
     *
     * @return  string|null
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @param  string|null  $firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    

    /**
     * Get the value of lastname
     *
     * @return  string|null
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @param  string|null  $lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of date_of_birth
     *
     * @return  string|null
     */ 
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set the value of date_of_birth
     *
     * @param  string|null  $date_of_birth
     *
     * @return  self
     */ 
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get the value of clothing_size
     *
     * @return  int|null
     */ 
    public function getClothingSize()
    {
        return $this->clothingSize;
    }

    /**
     * Set the value of clothing_size
     *
     * @param  int|null  $clothing_size
     *
     * @return  self
     */ 
    public function setClothingSize($clothingSize)
    {
        $this->clothingSize = $clothingSize;

        return $this;
    }

    /**
     * Get the value of size
     *
     * @return  int|null
     */ 
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @param  int|null  $size
     *
     * @return  self
     */ 
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get the value of hairs
     *
     * @return  string|null
     */ 
    public function getHairs()
    {
        return $this->hairs;
    }

    /**
     * Set the value of hairs
     *
     * @param  string|null  $hairs
     *
     * @return  self
     */ 
    public function setHairs($hairs)
    {
        $this->hairs = $hairs;

        return $this;
    }

    /**
     * Get the value of eyes
     *
     * @return  string|null
     */ 
    public function getEyes()
    {
        return $this->eyes;
    }

    /**
     * Set the value of eyes
     *
     * @param  string|null  $eyes
     *
     * @return  self
     */ 
    public function setEyes($eyes)
    {
        $this->eyes = $eyes;

        return $this;
    }
}
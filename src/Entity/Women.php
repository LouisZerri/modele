<?php

namespace App\Entity;

use App\Repository\WomenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass=WomenRepository::class)
 * @Vich\Uploadable
 */
class Women
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le titre du modèle est obligatoire")
     * @Assert\Length(min=3, minMessage="Le titre doit faire entre 3 caractères et 255 caractères", max=255, maxMessage="Le titre doit faire entre 3 caractères et 255 caractères")
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Le titre ne doit pas contenir des nombres"
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le prénom du modèle est obligatoire")
     * @Assert\Length(min=3, minMessage="Le prénom doit faire entre 3 caractères et 255 caractères", max=255, maxMessage="Le prénom doit faire entre 3 caractères et 255 caractères")
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Le prénom ne doit pas contenir des nombres"
     * )
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le nom du modèle est obligatoire")
     * @Assert\Length(min=3, minMessage="Le nom doit faire entre 3 caractères et 255 caractères", max=255, maxMessage="Le nom doit faire entre 3 caractères et 255 caractères") 
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Le nom ne doit pas contenir des nombres"
     * )
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="La date de naissance du modèle est obligatoire")
     * @Assert\Regex(pattern="/^\d{1,2}-\d{1,2}-\d{4}$/", message="La date de naissance n'est pas au bon format")
     */
    private $date_of_birth;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le numéro de téléphone est obligatoire")
     * @Assert\Regex(pattern="/^0[1-78]([-. ]?[0-9]{2}){4}$/", message="Le numéro de téléphone n'est pas au bon format") 
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="L'email du modèle est obligatoire")
     * @Assert\Email(message="le format de l'adresse email doit être valide")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="L'adresse est obligatoire")
     */
    private $street;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le code postal est obligatoire")
     * @Assert\Regex(pattern="/^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}$/", message="Le code postal n'est pas au bon format")
     */
    private $zip_code;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="La ville est obligatoire")
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="La ville ne doit pas contenir des nombres"
     * )
     */
    private $city;

     /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="women")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="La langue maternelle est obligatoire")
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="La langue maternelle ne doit pas contenir des nombres"
     * )
     */
    private $native_language;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="La deuxième langue ne doit pas contenir des nombres"
     * )
     */
    private $second_language;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="La troisième langue ne doit pas contenir des nombres"
     * )
     */
    private $third_language;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="La quatrième langue ne doit pas contenir des nombres"
     * )
     */
    private $fourth_language;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="La cinquième langue ne doit pas contenir des nombres"
     * )
     */
    private $fifth_language;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type(type="integer", message="La taille doit être un entier")
     * @Assert\NotBlank(message="La taille est obligatoire")
     */
    private $size;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type(type="integer", message="Le tour de poitrine doit être un entier")
     * @Assert\NotBlank(message="Le tour de poitrine est obligatoire")
     */
    private $chest;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type(type="integer", message="Le tour de hanche doit être un entier")
     * @Assert\NotBlank(message="Le tour de hanche est obligatoire")
     */
    private $hips;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type(type="integer", message="Le tour de taille doit être un entier")
     * @Assert\NotBlank(message="Le tour de taille est obligatoire")
     */
    private $waist_size;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type(type="integer", message="La taille de confection doit être un entier")
     * @Assert\NotBlank(message="La taille de confection est obligatoire")
     */
    private $clothing_size;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type(type="integer", message="La pointure de chaussure doit être un entier")
     * @Assert\NotBlank(message="La pointure de chaussure est obligatoire")
     */
    private $shoes;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="La couleur des cheveux est obligatoire")
     */
    private $hairs;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="La couleur des yeux est obligatoire")
     */
    private $eyes;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="La forme du visage est obligatoire")
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="La forme du visage ne doit pas contenir des nombres"
     * )
     */
    private $face;

    /**
     * @ORM\Column(type="boolean")
     */
    private $tatoos;

    /**
     * @ORM\Column(type="boolean")
     */
    private $piercing;

    /**
     * @var File|null
     * @Assert\Image(
     *  mimeTypes={"image/jpg", "image/jpeg", "image/png"}
     * )
     * @Vich\UploadableField(mapping="modele_image", fileNameProperty="filename")
     */
    private $imageFile;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $filename;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity=PictureWomen::class, mappedBy="women", orphanRemoval=true, cascade={"persist"})
     */
    private $pictures;

    /**
     * @Assert\All({
     *   @Assert\Image(mimeTypes={"image/jpg", "image/jpeg", "image/png"})
     * })
     */
    private $pictureFiles;


    public function __construct()
    {
        $this->pictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getDateOfBirth(): ?string
    {
        return $this->date_of_birth;
    }

    public function setDateOfBirth(string $date_of_birth): self
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zip_code;
    }

    public function setZipCode(string $zip_code): self
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getNativeLanguage(): ?string
    {
        return $this->native_language;
    }

    public function setNativeLanguage(string $native_language): self
    {
        $this->native_language = $native_language;

        return $this;
    }

    public function getSecondLanguage(): ?string
    {
        return $this->second_language;
    }

    public function setSecondLanguage(?string $second_language): self
    {
        $this->second_language = $second_language;

        return $this;
    }

    public function getThirdLanguage(): ?string
    {
        return $this->third_language;
    }

    public function setThirdLanguage(?string $third_language): self
    {
        $this->third_language = $third_language;

        return $this;
    }

    public function getFourthLanguage(): ?string
    {
        return $this->fourth_language;
    }

    public function setFourthLanguage(?string $fourth_language): self
    {
        $this->fourth_language = $fourth_language;

        return $this;
    }

    public function getFifthLanguage(): ?string
    {
        return $this->fifth_language;
    }

    public function setFifthLanguage(?string $fifth_language): self
    {
        $this->fifth_language = $fifth_language;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getChest(): ?int
    {
        return $this->chest;
    }

    public function setChest(int $chest): self
    {
        $this->chest = $chest;

        return $this;
    }

    public function getHips(): ?int
    {
        return $this->hips;
    }

    public function setHips(int $hips): self
    {
        $this->hips = $hips;

        return $this;
    }

    public function getWaistSize(): ?int
    {
        return $this->waist_size;
    }

    public function setWaistSize(int $waist_size): self
    {
        $this->waist_size = $waist_size;

        return $this;
    }

    public function getClothingSize(): ?int
    {
        return $this->clothing_size;
    }

    public function setClothingSize(int $clothing_size): self
    {
        $this->clothing_size = $clothing_size;

        return $this;
    }

    public function getShoes(): ?int
    {
        return $this->shoes;
    }

    public function setShoes(int $shoes): self
    {
        $this->shoes = $shoes;

        return $this;
    }

    public function getHairs(): ?string
    {
        return $this->hairs;
    }

    public function setHairs(string $hairs): self
    {
        $this->hairs = $hairs;

        return $this;
    }

    public function getEyes(): ?string
    {
        return $this->eyes;
    }

    public function setEyes(string $eyes): self
    {
        $this->eyes = $eyes;

        return $this;
    }

    public function getFace(): ?string
    {
        return $this->face;
    }

    public function setFace(string $face): self
    {
        $this->face = $face;

        return $this;
    }

    public function getTatoos(): ?bool
    {
        return $this->tatoos;
    }

    public function setTatoos(bool $tatoos): self
    {
        $this->tatoos = $tatoos;

        return $this;
    }

    public function getPiercing(): ?bool
    {
        return $this->piercing;
    }

    public function setPiercing(bool $piercing): self
    {
        $this->piercing = $piercing;

        return $this;
    }


    /**
     * Get the value of imageFile
     *
     * @return  File|null
     */ 
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set the value of imageFile
     *
     * @param  File|null  $imageFile
     *
     * @return  self
     */ 
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;

        if ($this->imageFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }

        return $this;
    }

    /**
     * Get the value of filename
     *
     * @return  string|null
     */ 
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set the value of filename
     *
     * @param  string|null  $filename
     *
     * @return  self
     */ 
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection|PictureWomen[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(PictureWomen $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setWomen($this);
        }

        return $this;
    }

    public function removePicture(PictureWomen $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getWomen() === $this) {
                $picture->setWomen(null);
            }
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPictureFiles()
    {
        return $this->pictureFiles;
    }

    /**
     * @param mixed $pictureFiles
     * @return Property
     */
    public function setPictureFiles($pictureFiles): self
    {
        foreach($pictureFiles as $pictureFile) 
        {
            $picture = new PictureWomen();
            $picture->setImageFile($pictureFile);
            $this->addPicture($picture);
        }
        
        $this->pictureFiles = $pictureFiles;
        return $this;
    }

}

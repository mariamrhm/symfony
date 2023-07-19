<?php

namespace App\Entity;

use App\Repository\VideoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: VideoRepository::class)]
#[ORM\Table(name: "video")]
#[ORM\HasLifecycleCallbacks]
class Video
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

 #[Assert\Regex(
    pattern:"/\bmerde\b/i",
    match:false,
    message:"Le mot 'merde' n'est pas autorisé dans le titre.")]
    #[Assert\Regex(
        pattern:"/\bwech\b/i",
        match:false,
        message:"Le mot 'wech' n'est pas autorisé dans le titre.")]
 
 
    
    #[Assert\Length(min: 3, minMessage: "Vous devez avoir un email de minimum 5 caractères")]
   
    #[ORM\Column(length: 50)]
    private ?string $title = null;

    #[ORM\Column(length: 500, nullable: false)]
    private ?string $videoLink = null;
    #[Assert\Regex(
        pattern:"/\bmerde\b/i",
        match:false,
        message:"Le mot 'merde' n'est pas autorisé dans le titre.")]
        #[Assert\Regex(
            pattern:"/\bwech\b/i",
            match:false,
            message:"Le mot 'wech' n'est pas autorisé dans le titre.")]
     
    #[Assert\Length(min: 25, minMessage: "Vous devez avoir une description de minimum 25 caractères")]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;



#[ORM\ManyToOne(inversedBy: 'Videos')]
#[ORM\JoinColumn(nullable: false)]
private ?User $User = null;

#[ORM\Column]
private ?bool $premiumVideo = null;
/**
 * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
 */
private ?\DateTimeImmutable $createdAt = null;

/**
 * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
 */
private ?\DateTimeImmutable $updatedAt = null;



// #[ORM\Column(type: "datetime", options: ["default" => "CURRENT_TIMESTAMP"])]
// private ?\DateTimeImmutable $createdAt = null;

// #[ORM\Column(type: "datetime", options: ["default" => "CURRENT_TIMESTAMP"])]
// private ?\DateTimeImmutable $updatedAt = null;




// #[ORM\Column]
// private ?\DateTimeImmutable $CreatedAt = null;

// #[ORM\Column]
// private ?\DateTimeImmutable $UpdatedAt = null;



    public function getId(): ?int
    {
        return $this->id;
    }

   

    public function getTitle(): ?string
    {
        return $this->title;
    }
/**
 * @ORM\PrePersist 
 * @ORM\PreUpdate 
 */
public function updateTimestamps()
{
    if ($this->getCreatedAt() === null) {
        $this->setCreatedAt(new \DateTimeImmutable()); 
    }
    $this->setUpdatedAt(new \DateTimeImmutable());
}

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }


   

    public function getVideoLink(): ?string
    {
        return $this->videoLink;
    }

    public function setVideoLink(string $videoLink): static
    {
        $this->videoLink = $videoLink;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    

   

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }

    public function isPremiumVideo(): ?bool
    {
        return $this->premiumVideo;
    }

    public function setPremiumVideo(bool $premiumVideo): static
    {
        $this->premiumVideo = $premiumVideo;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }
    
    public function setCreatedAt(\DateTimeImmutable $createdAt): static
{
    $this->createdAt = $createdAt;

    return $this;
}

public function getUpdatedAt(): ?\DateTimeImmutable
{
    return $this->updatedAt;
}

public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
{
    $this->updatedAt = $updatedAt;

    return $this;
}

   

    }
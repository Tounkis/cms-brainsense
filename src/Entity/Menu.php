<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $menu = null;

    #[ORM\Column(nullable: true)]
    private ?int $menuOrder = null;

    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'subMenus')]
    private Collection $subMenus;

    #[ORM\Column]
    private ?bool $isViisible = null;

    #[ORM\ManyToOne]
    private ?Article $article = null;

    #[ORM\ManyToOne]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'links')]
    private ?Page $page = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $links = null;

    public function __construct()
    {
        $this->subMenus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMenu(): ?string
    {
        return $this->menu;
    }

    public function setMenu(string $menu): self
    {
        $this->menu = $menu;

        return $this;
    }

    public function getMenuOrder(): ?int
    {
        return $this->menuOrder;
    }

    public function setMenuOrder(?int $menuOrder): self
    {
        $this->menuOrder = $menuOrder;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getSubMenus(): Collection
    {
        return $this->subMenus;
    }

    public function addSubMenu(self $subMenu): self
    {
        if (!$this->subMenus->contains($subMenu)) {
            $this->subMenus->add($subMenu);
        }

        return $this;
    }

    public function removeSubMenu(self $subMenu): self
    {
        $this->subMenus->removeElement($subMenu);

        return $this;
    }

    public function isIsViisible(): ?bool
    {
        return $this->isViisible;
    }

    public function setIsViisible(bool $isViisible): self
    {
        $this->isViisible = $isViisible;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPage(): ?Page
    {
        return $this->page;
    }

    public function setPage(?Page $page): self
    {
        $this->page = $page;

        return $this;
    }

    public function getLinks(): ?string
    {
        return $this->links;
    }

    public function setLinks(?string $links): self
    {
        $this->links = $links;

        return $this;
    }
}

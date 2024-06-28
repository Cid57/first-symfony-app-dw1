<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class SearchFormDataDTO
{

    #[Assert\NotBlank(message: '')]
    private ?string $title = null;

    private $tag = null;

    /**
     * Get the value of title
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of tag
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set the value of tag
     */
    public function setTag($tag): self
    {
        $this->tag = $tag;

        return $this;
    }
}

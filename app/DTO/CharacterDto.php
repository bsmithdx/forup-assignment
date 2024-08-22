<?php

declare(strict_types=1);

namespace App\DTO;

class CharacterDto
{
    public function __construct(
        private string $url,
        private string $name,
        private string $gender,
        private string $culture,
        private string $alias,
        private ?\DateTimeImmutable $createdAt,
    )
    {}

    public function getUrl(): string
    {
        return $this->url;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getGender(): string
    {
        return $this->gender;
    }
    public function getCulture(): string
    {
        return $this->culture;
    }
    public function getAlias(): string
    {
        return $this->alias;
    }
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function toArray(): array
    {
        return [
            'url' => $this->url,
            'name' => $this->name,
            'gender' => $this->gender,
            'culture' => $this->culture,
            'alias' => $this->alias,
            'createdAt' => $this->createdAt,
        ];
    }

    public static function fromArray(array $data, ?\DateTimeImmutable $createdAt = null): self
    {
        return new self(
            url: $data['url'],
            name: $data['name'],
            gender: $data['gender'],
            culture: $data['culture'],
            alias: $data['aliases'] && $data['aliases'][0] ? $data['aliases'][0] : '',
            createdAt: $createdAt,
        );
    }
    public static function fromJson(string $json, ?\DateTimeImmutable $createdAt = null): self
    {
        $data = json_decode($json, true);
        return self::fromArray($data, $createdAt);
    }

}

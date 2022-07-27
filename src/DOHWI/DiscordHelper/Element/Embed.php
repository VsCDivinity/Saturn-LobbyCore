<?php

declare(strict_types=1);

namespace DOHWI\DiscordHelper\Element;

use function date;
use function time;
use function hexdec;

final class Embed implements \JsonSerializable
{
    private array $embedData = [];

    public function __construct()
    {
        $this->embedData['type'] = 'rich';
    }

    public function jsonSerialize() : array
    {
        return $this->embedData;
    }

    public function setTitle(string $title) : Embed
    {
        $this->embedData['title'] = $title;
        return $this;
    }

    public function setTimestamp() : Embed
    {
        $this->embedData['timestamp'] = date('c',time());
        return $this;
    }

    public function setColor(string $hex) : Embed
    {
        $this->embedData['color'] = hexdec($hex);
        return $this;
    }

    public function setDescription(string $description) : Embed
    {
        $this->embedData['description'] = $description;
        return $this;
    }

    public function setUrl(string $url) : Embed
    {
        $this->embedData['url'] = $url;
        return $this;
    }

    public function setFooter(string $text,string $icon_url = '') : Embed
    {
        $this->embedData['footer'] = ['text' => $text,'icon_url' => $icon_url];
        return $this;
    }

    public function setImage(string $image_url) : Embed
    {
        $this->embedData['image'] = ['url' => $image_url];
        return $this;
    }

    public function setAuthor(string $name,string $url) : Embed
    {
        $this->embedData['author'] = ['name' => $name,'url' => $url];
        return $this;
    }

    public function addField(string $name,string $value,bool $inline) : Embed
    {
        $this->embedData['fields'][] = ['name' => $name,'value' => $value,'inline' => $inline];
        return $this;
    }
}

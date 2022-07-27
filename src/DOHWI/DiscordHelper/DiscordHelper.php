<?php

declare(strict_types=1);

namespace DOHWI\DiscordHelper;

use DOHWI\DiscordHelper\Element\Embed;
use DOHWI\DiscordHelper\Element\WebhookData;
use DOHWI\DiscordHelper\AsyncTask\SendWebhookAsyncTsak;

use pocketmine\Server;

use function json_encode;

final class DiscordHelper
{
    public function __construct(private string $webhook) {}

    private array $datas = [];

    public function setUserName(string $userName) : void
    {
        $this->datas['username'] = $userName;
    }

    public function setContent(string $content) : void
    {
        $this->datas['content'] = $content;
    }

    public function addEmbed(Embed $embed) : void
    {
        $this->datas['embeds'][] = $embed;
    }

    public function send() : void
    {
        Server::getInstance()->getAsyncPool()->submitTask(new SendWebhookAsyncTsak($this->webhook,json_encode($this->datas)));
    }
}

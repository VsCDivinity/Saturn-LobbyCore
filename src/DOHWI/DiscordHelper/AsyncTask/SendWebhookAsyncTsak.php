<?php

declare(strict_types=1);

namespace DOHWI\DiscordHelper\AsyncTask;

use DOHWI\DiscordHelper\Element\WebhookData;

use pocketmine\utils\Internet;
use pocketmine\scheduler\AsyncTask;

use function json_encode;

final class SendWebhookAsyncTsak extends AsyncTask
{
    public function __construct(private string $webhook,private string $string_datas) {}

    public function onRun() : void
    {
        Internet::postURL($this->webhook,$this->string_datas,10,['Content-type: application/json']);
    }
}
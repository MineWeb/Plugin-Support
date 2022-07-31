<?php
class SupportAppController extends AppController 
{
    protected function sendDiscordMessage($msg = "", $embedData = []) 
    {
        $this->loadModel("Support.SettingsSupport");
        $discordWebhook = $this->SettingsSupport->find("first");
        if (empty($discordWebhook) || empty($discordWebhook["SettingsSupport"]["discord_webhook"]))
            return false;
        
        $discordWebhook = explode("/", $discordWebhook["SettingsSupport"]["discord_webhook"]);
        $webhookData = [
            "id" => $discordWebhook[5],
            "token" => $discordWebhook[6]
        ];

        $handle = curl_init("https://discord.com/api/webhooks/" . $webhookData["id"] . "/" . $webhookData["token"]);

        $data = json_encode([
            "content" => $msg,
            "embeds" => $embedData
        ]);

        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($handle, CURLOPT_POST, true);
        curl_setopt($handle, CURLOPT_HEADER, true);
        curl_setopt($handle, CURLOPT_HTTPHEADER,
            array(
                'Content-Type:application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($handle, CURLOPT_POSTFIELDS, $data);

        $res = curl_exec($handle);
        return true;
    }
}


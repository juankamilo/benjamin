<?php
namespace Tests\Helpers\Providers;

use Ebanx\Benjamin\Models\DebitCard as cardModel;

class DebitCard extends BaseProvider
{
    /**
     * @return \Ebanx\Benjamin\Models\DebitCard
     */
    public function cardModel()
    {
        $card = new cardModel();
        $card->autoCapture = true;
        return $card;
    }
}

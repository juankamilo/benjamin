<?php
namespace Tests\Helpers\Providers;

use Ebanx\Benjamin\Models\DebitCard as debitCardModel;

class DebitCard extends BaseProvider
{
    /**
     * @return \Ebanx\Benjamin\Models\DebitCard
     */
    public function debitCardModel()
    {
        $card = new debitCardModel();
        $card->type = 'debitCard';
        return $card;

    }
}

<?php

namespace Trello\Api\Card;

use Trello\Api\AbstractApi;

/**
 * Trello Card Actions API
 * @link https://trello.com/docs/api/card
 *
 * Fully implemented.
 */
class CustomFieldItems extends AbstractApi
{
    protected $path = 'cards/#id#/customFieldItems';

    /**
     * Get custom fields related to a given card
     * @link https://developer.atlassian.com/cloud/trello/rest/#api-cards-id-customFieldItems-get
     *
     * @param string $id     the card's id or short link
     * @param array  $params optional parameters
     *
     * @return array
     */
    public function all($id, array $params = array())
    {
        return $this->get($this->getPath($id), $params);
    }

    /**
     * Update a custom field item
     * @link https://developer.atlassian.com/cloud/trello/rest/#api-cards-idCard-customField-idCustomField-item-put
     *
     * @param string $id          the card's id or short link
     * @param string $fieldId     custom field item's id
     * @param array  $fieldValue  an array containing the key and value to set for the custom field's value.
     *                             
     *
     * @return array
     */
    public function update($id, $fieldId, $fieldValue)
    {
        $body = json_encode(['value' => $fieldValue]);
        return $this->putJson(
            $this->getPath() . '/' . rawurlencode($id) . '/customField/' . rawurlencode($fieldId) . '/item', 
            $body,
            [
                'Content-Type' => 'application/json' 
            ],
            false
        );
    }

    /**
     * Update a custom field item
     * @link https://developer.atlassian.com/cloud/trello/rest/#api-cards-idCard-customField-idCustomField-item-put
     *
     * @param string $id          the card's id or short link
     * @param string $fieldId     custom field item's id
     * @param array  $text        value for custom field item text type                         
     *
     * @return array
     */
    public function updateText($id, $fieldId, $text)
    {
        $this->update($id, $fieldId, [ 'text' => $text ]);
    }
}

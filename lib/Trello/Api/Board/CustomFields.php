<?php

namespace Trello\Api\Board;

use Trello\Api\AbstractApi;

/**
 * Trello Board Cards API
 * @link https://trello.com/docs/api/board
 *
 * Fully implemented.
 */
class CustomFields extends AbstractApi
{
    /**
     * Base path of board cards api
     * @var string
     */
    protected $path = 'boards/#id#/customFields';

    /**
     * Get custom fields related to a given board
     * @link https://trello.com/docs/api/board/#get-1-boards-board-id-cards
     *
     * @param string $id     the board's
     * @param array  $params optional parameters
     *
     * @return array
     */
    public function all($id, array $params = array())
    {
        return $this->get($this->getPath($id), $params);
    }
}
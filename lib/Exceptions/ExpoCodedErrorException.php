<?php

namespace ExponentPhpSDK\Exceptions;

class ExpoCodedErrorException extends \Exception
{
    /**
     * Error details returned from the Expo server.
     */

    protected $details;

    /**
     * Formats the exception for a completely failed request
     *
     * @param $response
     *
     * @return static
     */
    public function __construct($errorResponse)
    {
        parent::__construct();
        if (is_array($errorResponse) &&
            count($errorResponse) === 1)
        {
            foreach ($errorResponse[0] as $key => $item) {
                $this->{$key} = $item;
            }
        }
        else {
            $this->message = json_encode($errorResponse);
        }
    }

    public function getDetails()
    {
        return $this->details;
    }
}

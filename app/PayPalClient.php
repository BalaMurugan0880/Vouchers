<?php

namespace App;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PayPalClient 
{
    /**
     * Returns PayPal HTTP context instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public function context()
    {
        return new ApiContext($this->credentials());
    }
    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     *
     * Paste your client_id and client secret as below
     */
    protected function credentials()
    {
		$clientId     = 'AablyXbATm5EgG9bXjYHHPJvhXa9VBRv6uZqEOXQ2d6jNmzd3ofyL56lnOVxgN4AajblAYKTBKYzSPSK';
        $clientSecret = 'EFpAswMIU1IRjaj6s3Mi36NZ78JGT4-UKc4U_Wi6mGLK7MfGzvTGpDMrdtPcEzVM54PNy0n8JJgO1FS2';
        return new OAuthTokenCredential($clientId, $clientSecret);
    }

}



<?php 

namespace Pw\RateLimiter;

class RateLimiter
{
    /**
     * @param $rateLimiterFactory
     * @return boolean
     */
    public function rateLimiter($rateLimiterFactory)
    {
        $limiter = $rateLimiterFactory->create(
            $_SERVER['REMOTE_ADDR']
        );
        if (false === $limiter->consume()->isAccepted()) {
            //Trop de demandes;
            return true;
        }

        return false;
    }
}
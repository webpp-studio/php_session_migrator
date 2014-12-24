<?php

/**
 * Abstract class for management of the PHP user's sessions
 */
abstract class BaseSessionManager
{
    public function __construct(array $params)
    {
        $this->params = $params;
        $this->connect($params);
    }

    public function __destruct()
    {
        $this->disconnect();
    }

    /**
     * Connect to session storage
     * @param array $params connection params
     */
    abstract public function connect(array $params);

    /**
     * Disconnect form the storage
     */
    public function disconnect() {}

    /**
     * Get session contents by key
     * @param string $key session id
     * @return string raw contents of the session
     */
    abstract public function get($key);

    /**
     * Set session contents
     * @param string $key session id
     * @param string $value raw contents
     */
    abstract public function set($key, $value);

    /**
     * Get all session identifiers
     * @return array
     */
    abstract public function getAllKeys();
}


/**
 * helpers
*/

function starts_with($haystack, $needle)
{
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}